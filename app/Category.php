<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	// Primary Key
    public $primaryKey = 'category_id';
    // Timestamps
    public $timestamps = true;
    // Relate to Product modal
    public function products(){
    	return $this->belongsToMany('App\Product', 'category_product', 'category_id_fk', 'product_id_fk');
    }
}
