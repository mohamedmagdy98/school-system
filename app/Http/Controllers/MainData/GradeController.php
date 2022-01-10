<?php

namespace App\Http\Controllers\MainData;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Stage;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Grades=Grade::all();
            $Stages=Stage::all('id','name');
            return view('MainDataSection.grades',compact('Grades','Stages'));
        }
        catch (\Exception $e){
            toastr()->error('something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        Grade::create([
            'name'=>['en'=>$request->Name_en,'ar'=>$request->Name_ar],
            'notes'=>['en'=>$request->Notes_en,'ar'=>$request->Notes_ar],
            'stage_id'=>$request->stage,
            'user_id'=>Auth::id(),
        ]);
            toastr()->success('added');
            return redirect()->back();
        }
        catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            Grade::find($request->id)->update([
                'name'=>['en'=>$request->Name_en,'ar'=>$request->Name_ar],
                'notes'=>['en'=>$request->Notes_en,'ar'=>$request->Notes_ar],
                'stage_id'=>$request->Stage,
                'user_id'=>Auth::id(),
            ]);
            toastr()->success('updated');

            return redirect()->back();
        }catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        try {
            Grade::find($request->id)->delete();
            toastr()->success('deleted');
            return redirect()->back();
        }
        catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();
        }

    }
}
