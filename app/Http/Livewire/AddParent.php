<?php

namespace App\Http\Livewire;

use App\Models\SideData\Job;
use App\Models\SideData\Maritalstatus;
use App\Models\SideData\Nationality;
use App\Models\Studentparent;
use Livewire\Component;
use Livewire\WithPagination;

class AddParent extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $currentStep = 1, $update=false, $parents_table=true, $parents_details=false,
        // Father_INPUTS
       $parent_id, $email, $password,
       $father_name_ar,       $father_name_en,        $father_job,        $father_status,
        $father_national_id,        $father_phone,         $father_nationality,
        $father_address,
        $mother_name_ar,        $mother_name_en,        $mother_job,        $mother_status,
        $mother_national_id,        $mother_phone,        $mother_nationality,
        $mother_address,

        $father_name,$mother_name


    ;




    public function render()
    {

        return view('livewire.add-parent',[
            'Nationalities' => Nationality::all(),
            'jobs' => Job::all(),
            'statuses' => Maritalstatus::all(),
            'parents'=>Studentparent::where('id', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('father_name', 'like', '%'.$this->search.'%')
                ->orWhere('father_national_id', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('mother_name', 'like', '%'.$this->search.'%')
                ->orWhere('mother_national_id', 'like', '%'.$this->search.'%')
                ->paginate(10),

        ]);

    }

    public function add_parent_button(){
        $this->parents_table=false;
    }

    public function back_to_table(){
        $this->resetFields();
        $this->currentStep=1;
        $this->parents_table=true;
        $this->parents_details=false;
    }

    //change the mode from adding to updating and fill model
    public function update_mode_on($parent_id){
        $this->parents_details=false;
        try {
            $this->fill_fields($parent_id);
            $this->update=true;
            $this->parents_table=false;
        }catch (\Exception $e){
            $this->resetFields();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"something went wrong!"
            ]);
        }
    }

    public function details_mode_on($parent_id){
        try {
            $this->parents_details=true;
            $this->parents_table=false;
            $this->fill_fields($parent_id);

        }catch (\Exception $e){
            $this->resetFields();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"something went wrong!"
            ]);
        }

    }

    //firstStepSubmit
    public function firstStepSubmit()
    {

        $this->validate([
            'password' => 'required',
            'father_name_ar' => 'required',
            'email' => 'required',
            'father_name_en' => 'required',
        ]);
        $this->currentStep = 2;

    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        $this->currentStep = 3;
    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    //submitForm update/add
    public function submitForm()
    {
        if ($this->update)
            $this->update_data();
        else
            $this->add_data();
    }

    public function delete_parent($parent_id){
        try {
            Studentparent::findOrFail($parent_id)->delete();
            $this->dispatchBrowserEvent('alert',['type'=>'success','message'=>'deleted successfully']);
            $this->resetFields();
        }catch (\Exception $e){
            $this->dispatchBrowserEvent('alert',['type'=>'error','message'=>'something went wrong']);
        }

    }

    //livewire validation hook
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'password' => 'required',
            'father_name_ar' => 'required',
            'email' => 'required',
            'father_name_en' => 'required',
            'mother_address'=>'required'

        ]);
    }
//######################## functionality ####################################################
    //reset
    public function resetFields()
    {
        $this->email=''; $this->password=''; $this->parent_id;
        $this->father_name_ar='';       $this->father_name_en='';        $this->father_job='';       $this->father_status='';
        $this->father_national_id='';       $this->father_phone='';       $this->father_nationality='';
        $this->father_address='';
        $this->mother_name_ar='';       $this->mother_name_en='';        $this->mother_job='';        $this->mother_status='';
        $this->mother_national_id='';        $this->mother_phone='';        $this->mother_nationality='';
        $this->mother_address='';
        $this->currentStep=1;            $this->update=false; $this->parents_details=false;

    }
   //create parent
    public function add_data()
    {
        try {
            Studentparent::create([
                'email'=>$this->email,
                'password'=>$this->password,
                'father_name'=>['en'=>$this->father_name_en,'ar'=>$this->father_name_ar],
                'father_phone'=>$this->father_phone,
                'father_nationality'=>$this->father_nationality,
                'father_national_id'=>$this->father_national_id,
                'father_status'=>$this->father_status,
                'father_job'=>$this->father_job,
                'father_address'=>$this->father_address,
                'mother_name'=>['en'=>$this->mother_name_en,'ar'=>$this->mother_name_ar],
                'mother_phone'=>$this->mother_phone,
                'mother_nationality'=>$this->mother_nationality,
                'mother_national_id'=>$this->mother_national_id,
                'mother_status'=>$this->mother_status,
                'mother_job'=>$this->mother_job,
                'mother_address'=>$this->mother_address,

            ]);
            $this->resetFields();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            $this->currentStep=1;
        }
        catch (\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"something smells bad!".$e
            ]);
        }
    }
    //update parent

    public function update_data()
    {
        try {
            Studentparent::findOrFail($this->parent_id)->update([
                'email'=>$this->email,
                'password'=>$this->password,
                'father_name'=>['en'=>$this->father_name_en,'ar'=>$this->father_name_ar],
                'father_phone'=>$this->father_phone,
                'father_nationality'=>$this->father_nationality,
                'father_national_id'=>$this->father_national_id,
                'father_status'=>$this->father_status,
                'father_job'=>$this->father_job,
                'father_address'=>$this->father_address,
                'mother_name'=>['en'=>$this->mother_name_en,'ar'=>$this->mother_name_ar],
                'mother_phone'=>$this->mother_phone,
                'mother_nationality'=>$this->mother_nationality,
                'mother_national_id'=>$this->mother_national_id,
                'mother_status'=>$this->mother_status,
                'mother_job'=>$this->mother_job,
                'mother_address'=>$this->mother_address,

            ]);
            $this->resetFields();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"updated Successfully!!"
            ]);
            $this->update=false;
            $this->parents_table=true;
        }
        catch (\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"something smells bad!".$e
            ]);
        }
    }

    public function fill_fields($parent_id)
    {
        try {
            $parent=Studentparent::findOrFail($parent_id);
            $this->parent_id=$parent_id;
            $this->email=$parent->email;
            $this->password=$parent->password;
            $this->father_name_ar=$parent->getTranslation('father_name', 'ar');
            $this->father_name_en=$parent->getTranslation('father_name', 'en');
            $this->father_national_id=$parent->father_national_id;
            $this->father_phone=$parent->father_phone;
            $this->father_address=$parent->father_address;
            $this->mother_name_ar=$parent->getTranslation('mother_name', 'ar');
            $this->mother_name_en=$parent->getTranslation('mother_name', 'en');

            $this->mother_national_id=$parent->mother_national_id;
            $this->mother_phone=$parent->mother_phone;
            $this->mother_address=$parent->mother_address;
            if ($this->parents_details){
                $this->father_name=$parent->father_name;
                $this->mother_name=$parent->mother_name;
                $this->father_nationality=$parent->father_nationality_key->name;
                $this->father_job=$parent->father_job_key->name;
                $this->father_status=$parent->father_status_key->name;
                $this->mother_nationality=$parent->mother_nationality_key->name;
                $this->mother_job=$parent->mother_job_key->name;
                $this->mother_status=$parent->mother_status_key->name;
            }else{
                $this->father_nationality=$parent->father_nationality;
                $this->father_job=$parent->father_job;
                $this->father_status=$parent->father_status;
                $this->mother_nationality=$parent->mother_nationality;
                $this->mother_job=$parent->mother_job;
                $this->mother_status=$parent->mother_status;
            }
        }
        catch (\Exception $e){

            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"something smells bad!".$e
            ]);
        }

    }


}


