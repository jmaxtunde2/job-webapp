<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ville extends Model
{
    use SoftDeletes;
    protected $table = "villes";
    protected $guard = ['id'];

    protected $fillable = [
        'user_id', 'name', 'pays_id'
    ];
    

    public function pays() {
        return $this->belongsTo(Pays::class,'pays_id')->withDefault();
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }
}
