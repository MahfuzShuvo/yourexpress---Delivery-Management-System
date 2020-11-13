<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'i.maf.shuvo@gmail.com')->first();

        if (is_null($user)) {
        	$user = new User();
        	
        	$user->name = "Mahfuz Shuvo";
	        $user->email = "i.maf.shuvo@gmail.com";
	        $user->phone = "01521430684";
	        $user->password = bcrypt('12345678');

	        $user->save();
        }
    }
}
