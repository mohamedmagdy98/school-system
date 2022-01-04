<?php

use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SideData\Speciality::select('*')->delete();
        $specialities=[
            [
                'en'=> 'Arabic',
                'ar'=> 'اللغة العربية'
            ],[
                'en'=> 'English',
                'ar'=> 'اللغة الانجليزية'
            ],[
                'en'=> 'French',
                'ar'=> 'اللغة الفرنسية'
            ],[
                'en'=> 'German',
                'ar'=> 'اللغة الالمانية'
            ],[
                'en'=> 'mathematics',
                'ar'=> 'الرياضيات'
            ],[
                'en'=> 'science',
                'ar'=> 'العلوم'
            ],[
                'en'=> 'computer',
                'ar'=> 'الحاسب الالي'
            ],[
                'en'=> 'music',
                'ar'=> 'الموسيقي'
            ],[
                'en'=> 'athletics',
                'ar'=> 'الالعاب الرياضية'
            ],[
                'en'=> 'religon',
                'ar'=> 'الدين'
            ]
        ];
        foreach ($specialities as $speciality){
            \App\Models\SideData\Speciality::create([
                'name'=>$speciality
            ]);
        }
    }
}
