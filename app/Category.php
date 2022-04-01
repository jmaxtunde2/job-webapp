<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "categories";
    protected $guard = ['id'];  

    protected $fillable = [
        'user_id', 'name'
    ];
    
    public function user() {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }

}
