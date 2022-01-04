@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('plugins/css/dataTables.bootstrap4.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- CSS only -->
@section('title')
{{__('layout.grades_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('layout.classes_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{__('layout.main_data')}}</a></li>
                <li class="breadcrumb-item active">{{__('layout.classes')}}</li>

            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">


                @error('*')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p>
                            @foreach ($errors->all() as $error)
                                <strong>{{ $error }}</strong>
                            @endforeach
                        </p>
                    </div>
                @endif
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    {{ __('classrooms.add_classroom') }}
                </button>
                <button type="button" class=" btn btn-danger " id="btn_delete_selected">
                    {{ __('classrooms.delete_selected') }}
                </button>
                <br><br>

                <div class="table-responsive">
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
                                <div class="modal-dialog modal-xl" role="document">
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
                                                    <label class="mr-sm-2"for=exampleFormControlTextarea1">{{ __('classrooms.grade') }}
                                                        :</label>
                                                    <br>
                                                    <select class="js-example-basic-single col-lg-5" style="width: 100%"  name="Grade">
                                                        @foreach($stages as $stage)
                                                            <optgroup label="{{$stage->name}}">
                                                                @foreach($stage->grade as $grade)
                                                                    @if($grade->id==$classroom->grade_id)
                                                                        <option value="{{$grade->id}}" selected>{{$grade->stage->name}} {{$grade->name}} </option>
                                                                    @else
                                                                        <option value="{{$grade->id}}">{{$grade->stage->name}} {{$grade->name}} </option>
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="w-100">


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
            </div>
        </div>
    </div>




    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="list_classroom">
                                    <div data-repeater-item>
                                        <div class="form-group" >
                                        <div class="row ">
                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ __('classrooms.name_ar') }} :</label>
                                                <input class="form-control" type="text" name="Name_ar" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ __('classrooms.name_en') }} :</label>
                                                <input class="form-control" type="text" name="Name_en" />
                                            </div>
                                            <div class="col">
                                                <label for="notes"
                                                       class="mr-sm-2">{{ __('classrooms.notes_ar') }} :</label>
                                                <input class="form-control" type="text" name="Notes_ar" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2">{{ __('classrooms.notes_en') }} :</label>
                                                <input class="form-control" type="text" name="Notes_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">{{ __('classrooms.grade') }}:</label>


                                                    <select class="js-example-basic-single col-lg-5" style="width: 110%;height: 200%" name="Grade">
                                                        <option value="0" selected disabled>{{__('classrooms.choose_grade')}}</option>
                                                        @foreach($stages as $stage)
                                                            <optgroup label="{{$stage->name}}">
                                                                @foreach($stage->grade as $grade)
                                                                        <option value="{{$grade->id}}">{{$grade->stage->name}} {{$grade->name}} </option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>


                                            </div>

                                            <div class="col">
                                                <br>
                                                <br>
                                                <input class="btn btn-danger btn-sm fa" data-repeater-delete
                                                       type="button" value="&#xf014;" />
                                            </div>
                                        </div>
                                    </div>   <br>

                                    </div>
                                </div>
                                <br>

                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ __('classrooms.add_row') }}" />
                                    </div>

                                </div>
                                <br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ __('classrooms.close') }}</button>
                                    <button type="submit"
                                            class="btn btn-success">{{ __('classrooms.submit') }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>

    <!-- delete_selected -->

    <div class="modal fade" id="delete_selected" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('classrooms.delete_selected') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('classrooms.delete_selected') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{ __('classrooms.delete_selected_warning') }}
                        <input class="text" type="hidden" id="delete_selected_id" name="delete_selected_id" value=''>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">    {{ __('classrooms.close') }}</button>
                        <button type="submit" class="btn btn-danger">    {{ __('classrooms.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>


<!-- row closed -->


@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>$(document).ready(function() {
            $('.js-example-basic-single').select2();


        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#btn_delete_selected").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_selected').modal('show')
                    $('input[id="delete_selected_id"]').val(selected);
                }
            });
        });
    </script>
@endsection
