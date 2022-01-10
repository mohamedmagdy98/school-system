<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
        {{ __('classrooms.add_classroom') }}
    </button>
    <div   wire:ignore.self class="table-responsive">
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th><input name="select_all" id="example-select-all" value="0" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                <th>#</th>
                <th> {{ __('classrooms.name') }}</th>
                <th> {{ __('classrooms.notes') }}</th>
                <th> {{ __('classrooms.stage') }}</th>
                <th> {{ __('classrooms.grade') }}</th>
                <th> {{ __('classrooms.process') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach ($classrooms as $classroom)
                <tr>
                    <?php $i++; ?>
                    <td><input type="checkbox"  value="{{ $classroom->id}}" class="box1" ></td>
                    <td>{{ $i }}</td>
                    <td>{{ $classroom->name }}</td>
                    <td>{{ $classroom->notes }}</td>
                    <td>{{ $classroom->stage->name }}</td>
                    <td>{{ $classroom->grade->name }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $classroom->id }}"
                                title=" {{ __('classrooms.edit_classroom') }}"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $classroom->id }}"
                                title=" {{ __('classrooms.delete_classroom') }}"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <!-- edit_modal_Grade -->
                <div class="modal fade" id="edit{{ $classroom->id }}"  role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ __('classrooms.edit_classroom') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- edit_form -->
                                <form action="{{ route('classrooms.update', 'test') }}" method="post">
                                    {{ method_field('patch') }}
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name"
                                                   class="mr-sm-2">{{ __('classrooms.name_ar') }}
                                                :</label>
                                            <input id="Name" type="text" name="Name_ar"
                                                   class="form-control"
                                                   value="{{ $classroom->getTranslation('name', 'ar') }}"
                                                   required>
                                            <input id="id" type="hidden" name="id" class="form-control"
                                                   value="{{ $classroom->id }}">
                                        </div>
                                        <div class="col">
                                            <label for="Name_en"
                                                   class="mr-sm-2">{{ __('classrooms.name_en') }}
                                                :</label>
                                            <input type="text" class="form-control"
                                                   value="{{ $classroom->getTranslation('name', 'en') }}"
                                                   name="Name_en" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">{{ __('classrooms.notes_ar') }}
                                            :</label>
                                        <textarea class="form-control" name="Notes_ar" id="exampleFormControlTextarea1"
                                                  rows="3">{{ $classroom->getTranslation('notes', 'ar') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">{{ __('classrooms.notes_en') }}
                                            :</label>
                                        <textarea class="form-control" name="Notes_en"
                                                  id="exampleFormControlTextarea1"
                                                  rows="3">{{ $classroom->getTranslation('notes', 'en') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="mr-sm-2"for=exampleFormControlTextarea1">{{ __('classrooms.grade') }}
                                            :</label>

                                        <select class="js-example-basic-single" style="width: 50%" name="Grade">

                                            @foreach($grades as $grade)

                                                @if($grade->id==$classroom->grade_id)
                                                    <option value="{{$grade->id}}" selected>{{$grade->name}} {{$grade->stage->name}}</option>
                                                @else
                                                    <option value="{{$grade->id}}">{{$grade->name}} {{$grade->stage->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>

                                    <br><br>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ __('classrooms.close') }}</button>
                                        <button type="submit"
                                                class="btn btn-success">{{ __('classrooms.submit') }}</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete_modal_Grade -->
                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    {{ __('classrooms.delete_classrooms') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('classrooms.destroy', 'test') }}" method="post">
                                    {{ method_field('Delete') }}
                                    @csrf
                                    {{ __('classrooms.delete_classroom_warning') }}
                                    <input id="id" type="hidden" name="id" class="form-control"
                                           value="{{ $classroom->id }}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ __('classrooms.close') }}</button>
                                        <button type="submit"
                                                class="btn btn-danger">{{ __('classrooms.submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </table>
    </div>

    <br>
    <button class="btn btn-success ti-reload" wire:click="refresh"></button>

    <button class="btn btn-success ti-plus" wire:click="add"></button>
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('classrooms.add_classroom') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="card-body">

                                            <div class="row">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ __('classrooms.name_ar') }} :</label>
                                                <input class="form-control" type="text" wire:model="name_ar">
                                            </div>


                                            <div class="row">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ __('classrooms.name_en') }} :</label>
                                                <input class="form-control" type="text" wire:model="name_en">

                                            </div>
                                            <div class="row">
                                                <label for="notes"
                                                       class="mr-sm-2">{{ __('classrooms.notes_ar') }} :</label>
                                                <input class="form-control" type="text" wire:model="note_ar">
                                            </div>


                                            <div class="row">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ __('classrooms.notes_en') }} :</label>
                                                <input class="form-control" type="text" wire:model="note_en">
                                            </div>


                                            <div class="row">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ __('classrooms.grade') }}:</label>

                                                <div  wire:ignore.self class="box">
                                                    <select wire:model="grade_id">
                                                        <option value="0" selected>--choose grade--</option>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                        <br>



                                <br>


                                <br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ __('classrooms.close') }}</button>
                                    <button type="submit" wire:click="add"
                                            class="btn btn-success">{{ __('classrooms.submit') }}</button>
                                </div>



                        </div>

                </div>


            </div>

        </div>
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
