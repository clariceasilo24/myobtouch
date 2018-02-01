<?php

use Illuminate\Database\Seeder;
use \App\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			['from'=>'08:00:00', 'to'=>'08:30:00'],
			['from'=>'08:30:00', 'to'=>'09:00:00'],
			['from'=>'09:00:00', 'to'=>'09:30:00'],
			['from'=>'09:30:00', 'to'=>'10:00:00'],
			['from'=>'10:00:00', 'to'=>'10:30:00'],
			['from'=>'10:30:00', 'to'=>'11:00:00'],
			['from'=>'11:00:00', 'to'=>'11:30:00'],
			['from'=>'11:30:00', 'to'=>'12:00:00'],
			['from'=>'13:30:00', 'to'=>'14:00:00'],
			['from'=>'14:00:00', 'to'=>'14:30:00'],
			['from'=>'14:30:00', 'to'=>'15:00:00'],
			['from'=>'15:00:00', 'to'=>'15:30:00'],
			['from'=>'15:30:00', 'to'=>'16:00:00'],
			['from'=>'16:00:00', 'to'=>'16:30:00'],
			['from'=>'16:30:00', 'to'=>'17:00:00']
        ];
        TimeSlot::insert($data); 
    }
}
