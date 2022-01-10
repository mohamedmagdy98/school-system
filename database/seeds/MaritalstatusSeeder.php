<?php

use Illuminate\Database\Seeder;

class MaritalstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SideData\Maritalstatus::select('*')->delete();
        $statuses=[
            [
                'en'=> 'married',
                'ar'=> 'متزوج'
            ],[
                'en'=> 'single',
                'ar'=> 'اعزب'
            ],[
                'en'=> 'divorced',
                'ar'=> 'مطلق'
            ],[
                'en'=> 'widowed',
                'ar'=> 'ارمل'
            ],[
                'en'=> 'dead',
                'ar'=> 'متوفي'
            ]
        ];
        foreach ($statuses as $status){
            \App\Models\SideData\Maritalstatus::create([
                'name'=>$status
            ]);
        }
    }
}
