<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class YoutubeEmbedTest extends TestCase
{
    use DatabaseTransactions;

    public function testConvertsUrlToEmbed()
    {
        $youtubeUrl = 'https://www.youtube.com/watch?v=rDdKNt-CvXA&list=FLmgvpKJEyvjJ7-n6PNl6_aQ&index=6';

        $headline = new App\Headline();
        $headline->save();

        $attachment = new App\Attachment([
            'type' => 'youtube',
            'link' => $youtubeUrl
        ]);

        $headline->attachment()->save($attachment);

        $expected = '<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/rDdKNt-CvXA" allowfullscreen></iframe>';

        $this->assertEquals($expected, $attachment->embedCode());
    }
    public function testRoute()
    {
        $youtubeUrl = 'https://www.youtube.com/watch?v=rDdKNt-CvXA&list=FLmgvpKJEyvjJ7-n6PNl6_aQ&index=6';
        $expected = '<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/rDdKNt-CvXA" allowfullscreen></iframe>';
        $response = $this->call('GET', '/youtube-embed', ['url' => $youtubeUrl]);
        $this->assertEquals($expected, $response->original); 
    }
}
