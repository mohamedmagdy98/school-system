@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
            @endif
      <div class="col-xs-12">
            <div class="col-md-12">
                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="title">{{__('parents.mother_name_ar') }}</label>
                        <input type="text" wire:model="mother_name_ar" class="form-control">
                        @error('mother_name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{__('parents.mother_name_en') }}</label>
                        <input type="text" wire:model="mother_name_en" class="form-control">
                        @error('mother_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">{{__('parents.mother_job') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_job">
                            <option selected>{{__('parents.choose') }}</option>
                            @foreach($jobs as $job)
                                <option value="{{$job->id}}">{{$job->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title">{{__('parents.mother_id') }}</label>
                        <input type="text" wire:model="mother_national_id" class="form-control">
                        @error('mother_national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col">
                        <label for="title">{{__('parents.mother_phone') }}</label>
                        <input type="text" wire:model="mother_phone" class="form-control">
                        @error('mother_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">{{__('parents.mother_nationality') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_nationality">
                            <option selected>{{__('parents.choose') }}</option>
                            @foreach($Nationalities as $National)
                                <option value="{{$National->id}}">{{$National->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_nationality')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{__('parents.mother_status') }}</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_status">
                            <option selected>{{__('parents.choose') }}</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

       -       <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{__('parents.mother_address') }}</label>
                    <textarea class="form-control" wire:model="mother_address" id="exampleFormControlTextarea1"
                              rows="4"></textarea>
                    @error('mother_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div >
                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                        {{__('parents.back') }}
                    </button>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="secondStepSubmit">{{__('parents.next') }}</button>
                </div>


            </div>
        </div>

    </div>

