<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Classroom extends Model
{
    use HasTranslations;
    use BelongsToThrough;

    protected $fillable=['name','notes','user_id','grade_id'];

    public $translatable = ['name','notes'];
    public function added_by()
    {
        return $this->belongsTo(User::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function stage()
    {
        return $this->BelongsToThrough(Stage::class,Grade::class);
    }

}
