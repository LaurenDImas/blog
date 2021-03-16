<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'judul', 'tanggal','isi','user_id'
    ];
}
