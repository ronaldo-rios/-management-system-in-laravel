<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    protected $fillable = [
        'product_id',
        'length',
        'width',
        'heigth',
        'unit_id'
    ];
    /* Indication that ProductDetail BELONGS TO Product. 
    Therefore, the primary key becomes FK in the ProductDetail 
    table to refer to the PK of Product. */
    public function product(){
        // $this make reference ProductDetail Model:
        return $this->belongsTo('App\Models\Product');
    }
}
