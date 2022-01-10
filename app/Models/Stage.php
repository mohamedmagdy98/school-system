<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Stage extends Model
{
    use HasTranslations;
    protected $fillable=['name','notes','user_id'];
    public $translatable = ['name','notes'];
    public function added_by()
    {
        return $this->belongsTo(User::class);
    }
    public function grade(){
        return $this->hasMany(Grade::class);
    }
    public function classroom(){
        return $this->hasManyThrough(Classroom::class,Grade::class);
    }
}

