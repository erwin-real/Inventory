<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    // Table Name
    protected $table = 'products';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

//    use SoftDeletes;
    use Sortable;

//    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'type', 'price', 'warning_quantity'];
    protected $sortable = ['name', 'type', 'price', 'warning_quantity'];

    public function singleProducts() {
        return $this->hasMany('App\SingleProduct')->orderBy('expired_at', 'asc');
    }


}
