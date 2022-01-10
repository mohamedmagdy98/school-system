<?php

namespace App\Http\Controllers\MainData;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainDataRequests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $classrooms=Classroom::all();
            $stages=Stage::all('id','name');
            $grades=Grade::all('id','name','stage_id');
            return view('MainDataSection.classrooms',compact('classrooms','grades','stages'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClassroomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {

       try {
           $list=$request->list_classroom;

           foreach ($list as $classroom) {
                Classroom::create([
                    'name' => ['en' => $classroom['Name_en'], 'ar' => $classroom['Name_ar']],
                    'notes' => ['en' => $classroom['Notes_en'], 'ar' => $classroom['Notes_ar']],
                    'grade_id' => $classroom['Grade'],
                    'user_id' => Auth::id(),
                ]);


           }
            toastr()->success('added');

            return redirect()->back();
         }
       catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClassroomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request)
    {
        try {
            Classroom::find($request->id)->update([
                'name'=>['en'=>$request->Name_en,'ar'=>$request->Name_ar],
                'notes'=>['en'=>$request->Notes_en,'ar'=>$request->Notes_ar],
                'grade_id'=>$request->Grade,
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
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Classroom::find($request->id)->delete();
            toastr()->success('deleted');

            return redirect()->back();
        }
        catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();
        }

    }

    public function delete_selected(Request $request){
        $selected_classes=explode(',',$request->delete_selected_id);

        try {
            Classroom::whereIn('id',$selected_classes)->delete();
            toastr()->success('deleted successfully');
            return redirect()->back();
        }catch (\Exception $e){
            toastr()->error('something  went wrong');
            return redirect()->back();
        }

        return $selected_classes;

    }
}

