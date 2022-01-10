<?php

namespace App\Http\Controllers\HrData;

use App\Http\Controllers\Controller;
use App\Models\SideData\Blood;
use App\Models\SideData\Job;
use App\Models\SideData\Maritalstatus;
use App\Models\SideData\Nationality;
use App\Models\Studentparent;
use Illuminate\Http\Request;

class StudentparentsController extends Controller
{

    public function index()
    {

        return view('HrDataSection.parents.parentsadd');
    }


}
