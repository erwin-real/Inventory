<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleProduct extends Model
{
    // Table Name
    protected $table = 'single_products';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    protected $fillable = ['product_id', 'slug', 'quantity', 'expired_at'];
    protected $sortable = ['product_id', 'slug', 'quantity', 'expired_at'];

//    public function transaction() { return $this->belongsTo('App\Transaction'); }
    public function product() { return $this->belongsTo('App\Product'); }
}
