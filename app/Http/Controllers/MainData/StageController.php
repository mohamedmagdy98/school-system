<?php

namespace App\Http\Controllers\MainData;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainDataRequests\StageRequest;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        try {
            $Stages=Stage::all();
            return view('MainDataSection.stages',compact('Stages'));
        }
        catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StageRequest  $request
     * @return Response
     */
    public function store(StageRequest $request)
    {
        try {
            Stage::create([
                'name'=>['en'=>$request->Name_en,'ar'=>$request->Name_ar],
                'notes'=>['en'=>$request->Notes_en,'ar'=>$request->Notes_ar],
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
     * @param  \App\Models\Stage  $stage
     * @return Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StageRequest  $request

     * @return Response
     */
    public function update(StageRequest $request)
    {
        try {
            Stage::find($request->id)->update([
                'name'=>['en'=>$request->Name_en,'ar'=>$request->Name_ar],
                'notes'=>['en'=>$request->Notes_en,'ar'=>$request->Notes_ar],
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
            Stage::find($request->id)->delete();
            toastr()->success('deleted');

            return redirect()->back();
        }
        catch (\Exception $e){
            toastr()->error('something went wrong');

            return redirect()->back();
        }

    }
}
