<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
       public $timestamps = false;
      protected $fillable = ['topic_id','name','pun'];
}