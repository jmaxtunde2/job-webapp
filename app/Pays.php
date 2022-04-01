<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pays extends Model
{
    protected $table = "pays";
    protected $guard = ['id'];

    protected $fillable = [
        'user_id', 'name'
    ];
    

    public function ville() {
        return $this->hasMany(Ville::class);
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }

}
