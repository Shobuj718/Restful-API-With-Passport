<?php

namespace App;

use App\Model\Seller;
use App\Model\Category;
use Stripe\Issuing\Transaction;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	const AVAILABLE_PRODUCT = 'available';
	const UNAVAILABLE_PRODUCT = 'unavailable';

    protected $fillable = [
    	'name',
    	'description',
    	'quantity',
    	'status',
    	'image',
    	'seller_id',
    ];

    public function isAvailable(){
    	return $this->statts == Product::AVAILABLE_PRODUCT;
    }

    public function seller()
    {
    	return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }
}
