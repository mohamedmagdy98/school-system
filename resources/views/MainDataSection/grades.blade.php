@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('plugins/css/dataTables.bootstrap4.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('title')
{{__('layout.grades_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('layout.grades_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{__('layout.main_data')}}</a></li>
                <li class="breadcrumb-item active">{{__('layout.grades')}}</li>

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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ __('grades.add_grade') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> {{ __('grades.name') }}</th>
                            <th> {{ __('grades.notes') }}</th>
                            <th> {{ __('layout.stage') }}</th>
                            <th> {{ __('grades.process') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Grades as $Grade)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Grade->name }}</td>
                                <td>{{ $Grade->notes }}</td>
                                <td>{{ $Grade->stage->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Grade->id }}"
                                            title=" {{ __('grades.edit_grade') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Grade->id }}"
                                            title=" {{ __('grades.delete_grade') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $Grade->id }}"  role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('grades.edit_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('grades.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ __('grades.name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name_ar"
                                                               class="form-control"
                                                               value="{{ $Grade->getTranslation('name', 'ar') }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $Grade->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                               class="mr-sm-2">{{ __('grades.name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $Grade->getTranslation('name', 'en') }}"
                                                               name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ __('grades.notes_ar') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes_ar" id="exampleFormControlTextarea1"
                                                              rows="3">{{ $Grade->getTranslation('notes', 'ar') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ __('grades.notes_en') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes_en"
                                                              id="exampleFormControlTextarea1"
                                                              rows="3">{{ $Grade->getTranslation('notes', 'en') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mr-sm-2"for=exampleFormControlTextarea1">{{ __('grades.stage') }}
                                                        :</label>

                                                    <select class="js-example-basic-single" style="width: 50%" name="stage">
                                                        <option value="{{$Grade->stage->id}}" selected disabled>{{$Grade->stage->name}}</option>

                                                        @foreach($Stages as $Stage)
                                                            <option value="{{$Stage->id}}">{{$Stage->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('grades.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ __('grades.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('grades.delete_grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('grades.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('grades.delete_grade_warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $Grade->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('grades.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ __('grades.submit') }}</button>
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




    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('grades.add_grade') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('grades.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ __('grades.name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name_ar" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ __('grades.name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ __('grades.notes_ar') }}
                                :</label>
                            <textarea class="form-control" name="Notes_ar" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ __('grades.notes_en') }}
                                :</label>
                            <textarea class="form-control" name="Notes_en" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2"for=exampleFormControlTextarea1">{{ __('grades.stage') }}
                                :</label>

                            <select class="js-example-basic-single" style="width: 50%" name="stage">
                                <option value="" selected disabled>{{__('grades.choose_stage')}}</option>

                               @foreach($Stages as $Stage)
                                <option value="{{$Stage->id}}">{{$Stage->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('grades.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('grades.submit') }}</button>
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
@endsection
