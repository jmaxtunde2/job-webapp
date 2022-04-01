<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emploi extends Model
{
    use SoftDeletes;
    protected $table = "emplois";
    protected $guard = ['id'];
    protected $fillable = [
        'title', 'slug', 'location', 'description','qualification', 
        'type_application', 'apply_link', 'end_date','status', 'level', 'required_knowledge',
         'education_experience','company_name', 
        'company_id', 'category_id', 'type_id','pays',
    ];

    public function category() {
        return $this->belongsTo(Category::class,'category_id')->withDefault();
    }

    public function type() {
        return $this->belongsTo(Type::class,'type_id')->withDefault();
    }

    public function user() {
        return $this->belongsTo(User::class,'company_id')->withDefault();
    }

    

}
