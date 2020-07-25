<?php

namespace App\Tests\Util;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartTest extends WebTestCase
{

    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Add an item to the cart object
     * 
     * 
     */
    public function addToCart()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/cart/add',
            [
                'id' => 2,
                'qty' => 10,
            ]
        );

        $client->insulate();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Remove an item from the cart object
     * 
     * 
     */
    public function removeFromCart()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/cart/remove',
            [
                'id' => 2,
            ]
        );

        $client->insulate();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Adds a coupon code to the cart object
     * 
     * 
     */
    public function applyCoupon()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/cart/addcoupon',
            [
                'coupon' => "COUPON2",
            ]
        );

        $client->insulate();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }


    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Checkouts the cart
     * 
     * @test
     */
    public function checkout()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/cart/checkout',
            [
                'email' => "test@gmail.com",
                'name' => "Random Guy",
                'token' =>  $client->getContainer()->get('security.csrf.token_manager')->refreshToken('checkout')
            ]
        );

        $client->insulate();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
