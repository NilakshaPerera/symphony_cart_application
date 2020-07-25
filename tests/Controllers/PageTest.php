<?php
namespace App\Tests\Util;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageTest extends WebTestCase 
{
    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Checks if the pages in the application show up
     * 
     * @dataProvider provideUrls
     */
    public function pages($url)
    {
        $client = static::createClient();
        $client->request('GET', '/books/show');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Created At : 25-7-2020
     * Created By : Nilaksha 
     * Summary : Provides the dataset for pages
     *
     * @return void
     */
    public function provideUrls()
    {
        return [
            ['/'],
            ['/books/show'],
            ['/cart/show'],
            ['/category/1'],
            ['/category/2'],
        ];
    }
}
