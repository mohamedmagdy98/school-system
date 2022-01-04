<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SideData\Job::select('*')->delete();
        $jobs=[
            [
            'en'=> 'Engineer',
            'ar'=> 'مهندس'
        ],[
            'en'=> 'doctor',
            'ar'=> 'دكتور'
        ],[
            'en'=> 'accountant',
            'ar'=> 'محاسب'
        ],[
            'en'=> 'police officer',
            'ar'=> 'ظابط شرطة'
        ],[
            'en'=> 'military soldier',
            'ar'=> 'ظابط جيش'
        ],[
            'en'=> 'lawyer',
            'ar'=> 'محامي'
        ],[
            'en'=> 'teacher',
            'ar'=> 'مدرس'
        ],[
            'en'=> 'businessman',
            'ar'=> 'رجل اعمال'
        ],[
            'en'=> 'freelance',
            'ar'=> 'عمل حر'
        ],[
            'en'=> 'house wife',
            'ar'=> 'ربة منزل'
        ],[
            'en'=> 'government employee',
            'ar'=> 'موظف حكومي'
        ],[
            'en'=> 'others',
            'ar'=> 'اخري'
        ]
        ];
        foreach ($jobs as $job){
            \App\Models\SideData\Job::create([
            'name'=>$job
        ]);
        }

    }
}
