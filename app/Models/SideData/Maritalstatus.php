<?php

namespace App\Models\SideData;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Maritalstatus extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    public $timestamps=false;

}
