<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Headline extends Model
{
    protected $fillable = ['text'];

    public function attachment()
    {
        return $this->hasOne('App\Attachment');
    }
}
