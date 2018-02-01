<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseDetail extends Model
{
    public function case(){
        return $this->belongsTo('\App\Cases', 'case_id');
    }
    public function appointment(){
        return $this->belongsTo('\App\Appointment', 'appointment_id');
    }
}
