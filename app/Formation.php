<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use SoftDeletes;
    protected $table = "formations";
    protected $guard = ['id'];

    public function user() {
        return $this->belongsTo(User::class,'company_id')->withDefault();
    }
}
