<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'title', 'sended_amount', 'received_amount', 'sender_method_id', 'receiver_method_id', 'reference'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function sender_method()
    {
        return $this->belongsTo('App\PaymentMethod', 'sender_method_id');
    }

    public function receiver_method()
    {
        return $this->belongsTo('App\PaymentMethod', 'receiver_method_id');
    }
}
