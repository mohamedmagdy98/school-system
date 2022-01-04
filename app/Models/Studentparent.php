<?php

namespace App\Models;

use App\Models\SideData\Job;
use App\Models\SideData\Maritalstatus;
use App\Models\SideData\Nationality;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Studentparent extends Model
{
    use HasTranslations;
    public $translatable = ['father_name','mother_name'];
    protected $fillable=['email','password','father_name','father_phone',
        'father_nationality','father_national_id','father_status','father_job','father_address',
        'mother_name','mother_phone','mother_nationality','mother_national_id',
        'mother_status','mother_job','mother_address'];

    public function father_nationality_key(){
        return $this->belongsTo(Nationality::class,'father_nationality');
    }
    public function father_job_key(){
        return $this->belongsTo(Job::class,'father_job');
    }
    public function father_status_key(){
        return  $this->belongsTo(Maritalstatus::class,'father_status');
    }
    public function mother_nationality_key(){
        return $this->belongsTo(Nationality::class,'mother_nationality');
    }
    public function mother_job_key(){
        return $this->belongsTo(Job::class,'mother_job');
    }
    public function mother_status_key(){
        return $this->belongsTo(Maritalstatus::class,'mother_status');
    }

}
