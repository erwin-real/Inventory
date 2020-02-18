<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transaction extends Model
{
    // Table Name
    protected $table = 'transactions';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

//    use SoftDeletes;
    use Sortable;

//    protected $dates = ['deleted_at'];

    protected $fillable = ['total', 'money_received', 'change'];
    protected $sortable = ['total', 'money_received', 'change'];

    public function singleTransactions() {
        return $this->hasMany('App\SingleTransaction');
    }
}
