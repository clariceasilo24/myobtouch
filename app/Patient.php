<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'firstname',
		'nickname',
		'lastname',
		'email',
		'birthdate',
		'gender',
		'status',
		'address',
		'occupation',
		'pregnancy',
		'p_firstname',
		'p_lastname',
		'reffered_by',
		'mobile_no',
		'user_id'
    ];

    public function user(){
    	return $this->belongsTo('\App\User', 'user_id');
    }
}
