@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{__('parents.email') }}</label>
                        <input type="email" wire:model="email"  class="form-control" autocomplete="off">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{__('parents.password') }}</label>
                        <input type="password" wire:model="password" class="form-control" autocomplete="off" >
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{__('parents.father_name_ar') }}</label>
                        <input type="text" wire:model="father_name_ar" class="form-control" >
                        @error('father_name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{__('parents.father_name_en') }}</label>
                        <input type="text" wire:model="father_name_en" class="form-control" >
                        @error('father_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{__('parents.father_job') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_job">
                            <option selected>{{__('parents.choose') }}</option>
                            @foreach($jobs as $job)
                                <option value="{{$job->id}}">{{$job->name}}</option>
                            @endforeach
                        </select>
                        @error('father_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{__('parents.father_status') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_status">
                            <option selected>{{__('parents.choose') }}</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                        @error('father_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title">{{__('parents.father_id') }}</label>
                        <input type="text" wire:model="father_national_id" class="form-control">
                        @error('father_national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title">{{__('parents.father_phone') }}</label>
                        <input type="text" wire:model="father_phone" class="form-control">
                        @error('father_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{__('parents.father_nationality') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_nationality">
                            <option selected>{{__('parents.choose') }}</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->name}}</option>
                            @endforeach
                        </select>
                        @error('father_nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{__('parents.father_address') }}</label>
                    <textarea class="form-control" wire:model="father_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('father_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            <div >
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                        type="button">{{__('parents.next') }}
                </button>
            </div>


            </div>
        </div>
    </div>


