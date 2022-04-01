<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newletter extends Model
{
    use SoftDeletes;
    protected $table = "newletters";
    protected $guard = ['id'];
    protected $fillable = [
        'email', 'whatsapp', 'status'
    ];
}
