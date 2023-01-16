<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'site',
        'UF',
        'email'
    ];

    /*If provider HAS MANY products. The Provider model receives hasMany 
    to perform the relationship with the Product model: */
    public function products(){
        // $this make reference Provider Model:
        return $this->hasMany('App\Models\Product');
    }
}
