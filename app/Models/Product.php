<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'provider_id',
        'name',
        'description',
        'weight',
        'unit_id'
    ];

    /* As Product and ProductoDetail the strongest and most important 
     table is Product a method is created to reference that there is a 1 to 1 relationship. 
     Product has one and only one ProductDetail and that ProductDetail 
    belongs to only that Product using FK product_id: */
    public function productDetail(){
        // This references the Model Product:
        return $this->hasOne('App\Models\ProductDetail');
    }


    /* Indication that Product BELONGS TO Provider. 
    Therefore, the primary key becomes FK in the Product 
    table to refer to the PK of Provider. */
    public function provider() {
        // This references the Model Product:
        return $this->belongsTo('App\Models\Provider');

    }
}
