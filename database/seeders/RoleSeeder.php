<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = ['Student','Faculty','Admin'];
        foreach($groups as $group){
        	$data[] = [
        		'role' =>	$group
        	];
        }
        \DB::table('roles')->insert($data);
    }
}
