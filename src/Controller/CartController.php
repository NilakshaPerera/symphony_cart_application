<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;

use App\Entity\Book;
use App\Entity\Coupon;
use App\Entity\Category;
use App\Entity\Order;
use App\Entity\OrderItem;

class CartController extends AbstractController
{
    private $session;
    private $entityManagerInterface;

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : Initiates session
     *
     * @param SessionInterface $session
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(SessionInterface $session , EntityManagerInterface $entityManagerInterface )
    {
        $this->session = $session;
        $this->entityManagerInterface = $entityManagerInterface;
    }

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : Initiates the cart page
     *
     * @Route("/cart/show" , name="/cart/show", methods={"GET"})
     *  
     */
    public function index()
    {
        return $this->render('site/cart.html.twig', [
            'cart' => $this->getCartObject()
        ]);
    }

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : Adds items to the cart
     *
     * @Route("/cart/add" , name="/cart/add", methods={"POST"})
     *  
     */
    public function addToCart(Request $request)
    {

        $book = $this->entityManagerInterface
            ->getRepository(Book::class)
            ->findOneBy(['id' => $request->request->get('id')]);

        if ($book && ((int)$request->request->get('qty')) > 0) {
            $products = ($this->session->get('products')) ?  $this->session->get('products') : [];
            $foundIndex = false;
            $newProd = array(
                'id' => $request->request->get('id'),
                'category' => $book->getCategoryId(),
                'banner' => $book->getImage(),
                'author' => $book->getAuthor(),
                'price' => $book->getPrice(),
                'qty' => (int)$request->request->get('qty'),
            );
            for ($i = 0; $i < count($products); $i++) {
                if ($products[$i]["id"] == $request->request->get('id')) {
                    $foundIndex = true;
                    $products[$i]["qty"] =  $products[$i]["qty"] +  $request->request->get('qty');
                }
            }
            if (!$foundIndex) {
                array_push($products, $newProd);
            }
            $this->session->set('products', $products);

            return new JsonResponse(['success' => true, 'data' =>  $this->getCartObject()]);
        }
        return new JsonResponse(['success' => false, 'errors' =>  ["Invalid value."]]);
    }


    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : Removes items to the cart
     *
     * @Route("/cart/remove" , name="/cart/remove", methods={"POST"})
     *  
     */
    public function removeFromCart(Request $request)
    {
        $products = ($this->session->get('products')) ?  $this->session->get('products') : [];
        $newProducts = [];
        for ($i = (count($products) - 1); $i  >= 0; $i--) {
            if ($products[$i]["id"] != $request->request->get('id')) {
                array_push($newProducts, $products[$i]);
            }
        }

        $this->session->set('products',  $newProducts);
        return new JsonResponse(['success' => true, 'data' =>  $this->getCartObject()]);
    }

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : Applies coupon code and resets the totalnumbers
     *
     * @Route("/cart/addcoupon" , name="/cart/addcoupon", methods={"POST"})
     */
    public function applyCoupon(Request $request)
    {
        $coupon = $this->entityManagerInterface
            ->getRepository(Coupon::class)
            ->findOneBy(['name' => $request->request->get('coupon')]);
        if ($coupon) {

            $message =  $coupon->getDiscount() . "% Discount for the coupon code " . $coupon->getName() . " has been added";

            $this->session->set('coupon', $coupon->getName());
            $this->session->set('couponId', $coupon->getId());
            $this->session->set('couponDiscount', $coupon->getDiscount());
            $this->session->set('couponText', $message);

            return new JsonResponse(['success' => true, 'data' => $this->getCartObject(), 'message' => $message]);
        }
        return new JsonResponse(['success' => false, 'errors' =>  ["Invalid Coupon Code"]]);
    }


    /**
     * Created At : 24-7-2020
     * Created By : Nilaksha
     * Summary : Process the checkout and completes the transaction
     *         : This is a dummy checkout function, this will only save the 
     *           required data in the databsase. No payment gateway is accessed.
     *
     * @Route("/cart/checkout" , name="/cart/checkout", methods={"POST"})
     */
    public function checkout(Request $request){

        $submittedToken = $request->request->get('token');
        $cartObject = $this->getCartObject();
        if ($this->isCsrfTokenValid('checkout', $submittedToken) && count($cartObject['products']) > 0 ) {

            $entityManager = $this->getDoctrine()->getManager();
            $order = new Order();
            $order->setEmail($request->request->get('email'));

            $order->setName($request->request->get('name'));

            $order->setCouponId( ( ($cartObject['couponId'] )? $cartObject['couponId'] : NULL) );
            $order->setTotal( (($cartObject['total'] )? $cartObject['total'] : NULL) );
            $order->setNet( (($cartObject['net'] )? $cartObject['net'] : NULL) );

            $order->setCreatedAt(new \DateTime('@'.strtotime('now')));
            $order->setUpdatedAt(new \DateTime('@'.strtotime('now')));

            $entityManager->persist($order);
            $entityManager->flush();

            foreach($cartObject['products'] as $product){
                
                $entityManager = $this->getDoctrine()->getManager();
                $orderItem = new OrderItem();

                $orderItem->setOrderId( $order->getId() );
                $orderItem->setBookId( $product['id']  );
                $orderItem->setQty($product['qty'] );

                $orderItem->setCreatedAt(new \DateTime('@'.strtotime('now')));
                $orderItem->setUpdatedAt(new \DateTime('@'.strtotime('now')));

                $entityManager->persist($orderItem);
                $entityManager->flush();
                
            }

            $cartObject = $this->clearCartObject();
            return new JsonResponse(['success' => true, 'message' => 'Success!' , 'data' =>  $cartObject]);
            
        }   

        return new JsonResponse(['success' => false, 'error' => 'Invalid transaction']);

    }   


    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : returns the complete cart object XHR Compatible
     *
     * @Route("/cart/get" , name="/cart/get", methods={"POST"})
     */
    public function getXhrCartObject()
    {
        return new JsonResponse(['success' => true, 'data' =>  $this->getCartObject()]);
    }

    /**
     * Created At : 23-7-2020
     * Created By : Nilaksha
     * Summary : returns the complete cart object
     *  
     */
    public function getCartObject()
    {
        // 5 or more Children books you get a 10% discount from the Children books total  -- category 1
        // If you buy 10 books from each category you get 5% additional discount from the total bill
        // If you have a coupon code you get a 15% discount for the total bill. In this case, all other discounts will be invalidated.

        $cartObject = [];
        $total = 0;
        $net = 0;
        $saved = 0;
        $prodArray = [];

        $coupon = $this->session->get('coupon');
        $couponDiscount = $this->session->get('couponDiscount');
        $products = $this->session->get('products');
        $categories = $this->entityManagerInterface->getRepository(Category::class)->findAll();

        foreach($categories as $cat){
            $catArray = [];
            $qty = 0;
            $sum = 0;
            foreach( $products as $product){
                if ($product['category'] == $cat->getId()) {
                    $sum += (float)$product['price'] * (int)$product['qty'];
                    $qty += (int)$product['qty'];
                }
            }
            if($qty > 0 && $sum > 0){
                $catArray = ['category' => $cat->getId() , 'qty' => $qty , 'sum' => $sum ];
                array_push($prodArray , $catArray );
            }
        } 

        if($coupon){
            $sum = 0;
            foreach($prodArray as $catArray){
                $sum += $catArray['sum'];
            }
            $total = round($sum , 2) ;
            $net =  round($total * ((100 - $couponDiscount) / 100) , 2);
        }else{
            $j = 0;
            foreach ($categories as $cat) {
                foreach($prodArray as $catArray){
                   
                    if( $catArray['category'] == $cat->getId() ){
                        $total += $catArray['sum'];
                        if ($catArray['category'] == 1 && $catArray['qty'] >= 5) {
                            $net +=  round(((float)$catArray['sum']) * ((100 - 10) / 100), 2);
                        } else {
                            $net +=  $catArray['sum'];
                        }
                        if ($catArray['qty'] >= 10) {
                            $j++;
                        }
                    }
                }
            }

            if(count($categories) == $j){
                $net =  round(((float)$net) * ((100 - 5) / 100) , 2);
            }
        }

        $saved =  number_format((float)(round(($total - $net), 2)), 2, '.', '');
        $total = number_format((float)$total , 2, '.', '');
        $net = number_format((float)$net, 2, '.', '');
      
        $this->session->set('total', $total);
        $this->session->set('net', $net);

        $cartObject['total'] = $total;
        $cartObject['net'] = $net;
        $cartObject['discount'] = $saved;

        $cartObject['coupon'] = $coupon;
        $cartObject['couponId'] = $this->session->get('couponId');
        $cartObject['couponDiscount'] = $couponDiscount;
        $cartObject['couponText'] = $this->session->get('couponText');

        $cartObject['products'] = $products;

        return $cartObject;
    }


    /**
     * Created At : 24-7-2020
     * Created By : Nilaksha
     * Summary : Clears the cart related session data
     *
     * @return void
     */
    function clearCartObject(){

        $this->session->set('products', []);
        $this->session->set('coupon', "");
        $this->session->set('couponId', "");
        $this->session->set('couponDiscount',"");
        $this->session->set('couponText', "");
        $this->session->set('total', 0);
        $this->session->set('net', 0);

    }
    
}