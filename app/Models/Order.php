<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    use HasFactory;

    /*There is a Many to Many relationship between Product Model 
    and Order Model, generating the Model ProductOrder in 
    which the Order can belong to one or many products. */
    public function products(){
        /* Instantiating the path of the Product model that relates 
        to the Order Model and instantiating the product_orders 
        table which is the auxiliary table of the N to N relation: */
        return $this->belongsToMany('App\Models\Product', 'product_orders')->withPivot('quantity', 'id', 'created_at', 'updated_at');
        
    }
}
