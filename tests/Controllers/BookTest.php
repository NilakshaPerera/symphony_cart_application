<?php

namespace App\Tests\Util;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use PHPUnit\Framework\TestCase;

class BookTest extends WebTestCase 
{

    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Adds a book into the system
     * 
     * @test
     */
    public function addBook()
    {
        $photo = new UploadedFile(
            'C:\xampp\htdocs\training\project\tests\Controllers\resources\dummy.png',
            'photo.jpg',
            'image/jpeg',
            null
        );

        $client = static::createClient();
        $client->request(
            'POST',
            '/book/create',
            [
                'category' => 2,
                'name' => "Horror Story",
                'author' => 'Jane Doe',
                'isbn' => 849475,
                'price' => 13,
                'token' =>  $client->getContainer()->get('security.csrf.token_manager')->refreshToken('add-book')
            ],
            [
                'image-upload-logo' => $photo
            ]
        );

        $client->insulate();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    
    
}
