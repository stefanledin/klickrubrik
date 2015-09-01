<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['type', 'link'];

    public function headline()
    {
        return $this->belongsTo('App\Headline');
    }

    public function embedCode()
    {
        parse_str($this->link, $output);
        $movieID = array_values($output)[0];
        return '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$movieID.'" frameborder="0" allowfullscreen></iframe>';
    }
}
