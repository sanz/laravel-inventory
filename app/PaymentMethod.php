<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description'];
    public function transactions() {
        return $this->hasMany('App\Transaction', 'payment_method_id', 'id');
    }
}
