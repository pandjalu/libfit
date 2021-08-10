<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $table = "borrowing";

    protected $fillable = ['user_id', 'book_id', 'done', 'is_download'];
}
