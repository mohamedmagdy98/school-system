<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Grade extends Model
{

    use HasTranslations;
    protected $fillable=['name','notes','user_id','stage_id'];
    public $translatable = ['name','notes'];
    public function added_by()
    {
        return $this->belongsTo(User::class);
    }
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
    public function classroom(){
        return $this->hasMany(Classroom::class);
    }

}
