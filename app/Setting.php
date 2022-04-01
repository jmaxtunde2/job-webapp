<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'website_title', 'website_url', 'facebook', 'instagram','linkedIn', 
        'vision', 'mission', 'principle','introduction', 'meta_tags', 'logo',
         'meta_description','status','twitter','conclusion','address','tel','email','whatsApp','breve_desc',

    ];
}
