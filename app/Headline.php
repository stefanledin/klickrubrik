<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    protected $fillable = ['who', 'what', 'punchline', 'attachment_link', 'attachment_type'];
}
