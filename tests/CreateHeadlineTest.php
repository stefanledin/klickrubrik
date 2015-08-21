<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateHeadlineTest extends TestCase
{
    use DatabaseTransactions;

    public function testHeadlineCanBeCreated()
    {
        $headline = 'Först trodde Stefan att tjejen stötte på honom och du kan inte gissa vad som hände sen!';
        $this->visit('/')
            ->see('Först trodde')
            ->type('Stefan', 'who')
            ->type('tjejen stötte på honom', 'what')
            ->select('0', 'punchline')
            ->type('http://meme.jpg', 'image-link')
            ->press('submit-headline')
            ->seePageIs('/din-rubrik')
            ->see($headline)
            ->seeInDatabase('headlines', ['headline' => $headline])
            ->seeInDatabase('headlines', ['attachment_type' => 'image'])
            ->seeInDatabase('headlines', ['attachment' => 'http://meme.jpg']);
    }

    public function testImageCanBeUploaded()
    {
        $this->visit('/')
            ->attach(base_path().'/tests/meme.jpg', 'uploaded-image')
            ->press('submit-headline')
            ->seeInDatabase('headlines', ['attachment_type' => 'image'])
            ->seeInDatabase('headlines', ['attachment' => 'meme.jpg']);
    }

    public function testHeadlineWithYoutubeMovie()
    {
        $youtubeMovie = 'http://youtube.com/movie';
        $this->visit('/')
            ->type($youtubeMovie, 'youtube-link')
            ->press('submit-headline')
            ->seeInDatabase('headlines', ['attachment_type' => 'youtube'])
            ->seeInDatabase('headlines', ['attachment' => $youtubeMovie]);
    }

}