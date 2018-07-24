<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$role_Biasa = Role::where('nama', 'Biasa')->first();
    	$role_BPH  = Role::where('nama', 'BPH')->first();
    	$role_Penulis  = Role::where('nama', 'Penulis')->first();

    	$Biasa = new User();
    	$Biasa->name = 'Biasa Name';
    	$Biasa->email = 'Biasa@example.com';
    	$Biasa->password = bcrypt('secret');
    	$Biasa->save();
    	$Biasa->roles()->attach($role_Biasa);

    	$BPH = new User();
    	$BPH->name = 'BPH Name';
    	$BPH->email = 'BPH@example.com';
    	$BPH->password = bcrypt('secret');
    	$BPH->save();
    	$BPH->roles()->attach($role_BPH);

    	$Penulis = new User();
    	$Penulis->name = 'Penulis Name';
    	$Penulis->email = 'Penulis@example.com';
    	$Penulis->password = bcrypt('secret');
    	$Penulis->save();
    	$Penulis->roles()->attach($role_Penulis);
    }
}
