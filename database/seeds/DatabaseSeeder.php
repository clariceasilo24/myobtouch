<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new \App\User;
        $user->username = "admin";
		$user->account_type = "admin";
		$user->password = bcrypt('admin');
		$user->save();
    }
}
