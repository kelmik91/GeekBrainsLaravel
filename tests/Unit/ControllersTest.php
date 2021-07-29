<?php

namespace Tests\Unit;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use PHPUnit\Framework\TestCase;

class ControllersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function controllersTest()
    {
        $feed = new FeedbackController();
        $this->assertNotEmpty($feed);
    }

    public function newsTest()
    {
        $news = new NewsController();;
        $this->assertIsArray($news->newsCategory);
        $this->assertNotEmpty($news->index());
        $this->assertNotEmpty($news->newsCard());
    }
}
