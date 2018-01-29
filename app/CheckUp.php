<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckUp extends Model
{
    

    protected $fillable = [
        'date_time',
		'notes',
		'bp',
		'hr',
		'rr',
		'weight',
		'height',
		'pregnancy',
		'complaints',
		'assessments',
		'treatment',
		'prescribed_meds',
		'ea_id',
		'appointment_id'
    ];

    public function appointment(){
    	return $this->belongsTo('\App\Appointment', 'appointment_id');
    }
}
