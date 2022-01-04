<?php

use Illuminate\Database\Seeder;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SideData\Blood::select('*')->delete();
        $bloods=['A+','A-','B+','B-','O+','O-','AB+','AB-'];
        foreach ($bloods as $blood){
            \App\Models\SideData\Blood::create([
                'name'=>$blood
            ]);
        }


    }
}
