<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicite extends Model
{
    use SoftDeletes;
    protected $table = "publicites";
    protected $guard = ['id'];

    protected $fillable = [
        'title', 'url', 'image', 'activate_date','end_date', 
        'status', 'user_id', 
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }
}
