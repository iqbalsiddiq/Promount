<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table 	= 'order';
	protected $fillable = ['transaction_code','fullname',
	    'lastname',
	    'company',
	    'address',
	    'address2',
	    'town',
	    'zipcode',
	    'email',
	    'phone',
	    'payment',
	    'id_cart'
	    ];
}
