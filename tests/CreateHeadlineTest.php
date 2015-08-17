<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateHeadlineTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateHeadline()
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
            ->seeInDatabase('headlines', ['headline' => $headline]);
    }
}