<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Classroom extends Component
{
    public $name_ar,$name_en,$note_ar,$note_en,$grade_id;
    public function refresh(){
        return ['classrooms'=>\App\Models\Classroom::all()];
    }

    public function add(){
        try {
            \App\Models\Classroom::create([
                'name' => ['en' => $this->name_en, 'ar' => $this->name_ar],
                'notes' => ['en' => $this->note_en, 'ar' => $this->note_ar],
                'grade_id' => $this->grade_id,
                'user_id' => Auth::id(),
            ]);
                $this->resetFields();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);

        }catch (\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"something smells bad!"
            ]);
        }

    }
    public function render()
    {
        return view('livewire.classroom',['classrooms'=>\App\Models\Classroom::all(),'grades'=>Grade::all()]);
    }
//#############################Helping functions########################################################
    public function resetFields(){

        $this->name_en='';
        $this->name_ar='';
        $this->note_ar='';
        $this->note_en='';
        $this->grade_id='';
    }
}
