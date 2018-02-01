<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $fillable = [
        'date_time',
		'status',
		'remarks',
		'user_id',
		'patient_id',
        'timeslot_id'
    ];

    public function user(){
    	return $this->belongsTo('\App\User', 'user_id');
    }
    public function patient(){
    	return $this->belongsTo('\App\Patient', 'patient_id');
    }
    public function timeslot(){
        return $this->belongsTo('\App\TimeSlot', 'timeslot_id');
    }
    public function services(){
        return $this->hasMany('\App\ServiceDetail', 'appointment_id');
    }
    public function cases(){
        return $this->hasMany('\App\CaseDetail', 'appointment_id');
    }
}
