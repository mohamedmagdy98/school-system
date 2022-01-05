
<div>

    @if($parents_table)
        <div >
             <button class="btn btn-success" wire:click="add_parent_button">{{__('layout.parents_add')}}</button>
        </div>

        <input wire:model="search" type="search" class="form-control" placeholder="{{__('layout.search')}}">

        <div class="table-responsive" >


            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('parents.id')}}</th>
                    <th scope="col">{{__('parents.father_name')}}</th>
                    <th scope="col">{{__('parents.father_national_id')}}</th>
                    <th scope="col">{{__('parents.mother_name')}}</th>
                    <th scope="col">{{__('parents.mother_national_id')}}</th>
                    <th scope="col">{{__('parents.email')}}</th>
                    <th scope="col">{{__('parents.process')}}</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; ?>

                @foreach($parents as $parent)
                    <?php $i++?>
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$parent->id}}</td>
                    <td>{{$parent->father_name}}</td>
                    <td>{{$parent->father_national_id}}</td>
                    <td>{{$parent->mother_name}}</td>
                    <td>{{$parent->mother_national_id}}</td>
                    <td>{{$parent->email}}</td>
                    <td> <button type="button" wire:click="details_mode_on({{$parent->id}})" class="btn btn-info btn-sm m-1"
                                 title=" {{ __('parents.show') }}"><i
                                class="fa fa-search-plus"></i></button>
                        </button>
                        <button type="button" wire:click="update_mode_on({{$parent->id}})" class="btn btn-warning btn-sm m-1"
                                title=" {{ __('parents.edit') }}"><i class="fa fa-edit"></i>
                        </button>

                        <button type="button" data-toggle="modal"
                                data-target="#delete{{ $parent->id }}" class="btn btn-danger btn-sm m-1"
                                title=" {{ __('parents.delete') }}"><i
                                class="fa fa-trash"></i></button></td>

                </tr>
                    <div class="modal fade" id="delete{{ $parent->id }}" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ __('parents.delete') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                        {{ __('parents.delete_msg') }}
                                    <br>
                                    {{__('parents.id')}}: {{$parent->id}}

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ __('classrooms.close') }}</button>
                                            <button type="button" wire:click="delete_parent({{$parent->id}})"
                                                    data-dismiss="modal"   class="btn btn-danger">{{ __('classrooms.submit') }}</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                </tbody>
            </table>


    </div>


      <div class="align-content-lg-center" >
          <br>
          {{ $parents->links() }}</div>
    @elseif($parents_details)
        <div > <button class="btn btn-danger" wire:click="back_to_table">{{__('parents.back_to_table')}}</button></div>
        <div class="card">
            <div class="card-header"><h5 class="card-title">{{__('parents.details')}}</h5></div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.email')}}</div><div class="col-8 col-md-4">
                        {{$this->email}}</div>
                        <div class="col-4 col-md-2">{{__('parents.id')}}</div><div class="col-8 col-md-4">{{$this->parent_id}}</div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_name')}}</div><div class="col-8 col-md-4">{{$this->father_name}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_name')}}</div><div class="col-8 col-md-4">{{$this->mother_name}}</div>

                    </div>
                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_national_id')}}</div><div class="col-8 col-md-4">{{$this->father_national_id}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_national_id')}}</div><div class="col-8 col-md-4">{{$this->mother_national_id}}</div>
                    </div>
                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_nationality')}}</div><div class="col-8 col-md-4">{{$this->father_nationality}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_nationality')}}</div><div class="col-8 col-md-4">{{$this->mother_nationality}}</div>
                    </div>

                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_job')}}</div><div class="col-8 col-md-4">{{$this->father_job}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_job')}}</div><div class="col-8 col-md-4">{{$this->mother_job}}</div>
                    </div>

                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_status')}}</div><div class="col-8 col-md-4">{{$this->father_status}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_status')}}</div><div class="col-8 col-md-4">{{$this->mother_status}}</div>
                    </div>
                    <div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_phone')}}</div><div class="col-8 col-md-4">{{$this->father_phone}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_phone')}}</div><div class="col-8 col-md-4">{{$this->mother_phone}}</div>
                    </div><div class="row">
                        <div class="col-4 col-md-2">{{__('parents.father_address')}}</div><div class="col-8 col-md-4">{{$this->father_address}}</div>
                        <div class="col-4 col-md-2">{{__('parents.mother_address')}}</div><div class="col-8 col-md-4">{{$this->mother_address}}</div>
                    </div>


                </div>
            </div>
        </div>
        <button type="button" wire:click="update_mode_on({{$this->parent_id}})" class="btn btn-warning "
                title=" {{ __('classrooms.edit_classroom') }}">{{__('parents.edit')}}
        </button>
    @else
        <div > <button class="btn btn-danger" wire:click="back_to_table">{{__('parents.back_to_table')}}</button></div>

    <div class="stepwizard" aria-autocomplete="off">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{__('parents.step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{__('parents.step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{__('parents.step3') }}</p>
            </div>
        </div>
    </div>


    @include('livewire.Father_Form')

    @include('livewire.Mother_Form')


    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
                @endif

                <div class="col-md-12">
                    <div class="col-md-12 align-content-center">
                        <br>
                        <br>
                        <br>
                        <h2 style="font-family: 'Cairo', sans-serif;">{{__('parents.confirm_msg') }}</h2><br>
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                wire:click="back(2)">{{__('parents.back') }}</button>
                        <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                type="button">{{__('parents.confirm') }}</button>
                    </div>
                </div>
            </div>



        @endif
    </div>


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 5000,
                timerProgressBar:true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            window.addEventListener('alert',({detail:{type,message}})=>{
                Toast.fire({
                    icon:type,
                    title:message
                })
            })
        </script>
