<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class CreateHeadlineTest extends TestCase
{
    public function testCreateHeadline()
    {
        $this->visit('/')
            ->see('Först trodde')
            ->type('Stefan', 'who')
            ->type('tjejen stötte på honom', 'what')
            ->select('och', 'and-but')
            ->type('http://meme.jpg', 'image-link')
            ->press('submit-headline')
            ->seePageIs('/din-rubrik')
            ->see('Först trodde Stefan att tjejen stötte på honom och du kan inte gissa vad som hände sen!');
    }
}