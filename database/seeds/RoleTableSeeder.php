<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_Biasa = new Role();
    	$role_Biasa->nama = 'Biasa';
    	$role_Biasa->keterangan = 'user yang hanya bisa komentar dan memberi kritik saran';
    	$role_Biasa->save();

    	$role_BPH = new Role();
    	$role_BPH->nama = 'BPH';
    	$role_BPH->keterangan = 'user admin';
    	$role_BPH->save();

    	$role_Penulis = new Role();
    	$role_Penulis->nama = 'Penulis';
    	$role_Penulis->keterangan = 'user yang bisa membuat artikel';
    	$role_Penulis->save();
    }
}
