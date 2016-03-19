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
        return youtubeEmbed($this->link);
    }
}
