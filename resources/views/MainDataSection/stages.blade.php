@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('plugins/css/dataTables.bootstrap4.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">

@section('title')
{{__('layout.stages_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('layout.stages_list')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{__('layout.main_data')}}</a></li>
                <li class="breadcrumb-item active">{{__('layout.stages')}}</li>

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


                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ __('stages.add_stage') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> {{ __('stages.name') }}</th>
                            <th> {{ __('stages.notes') }}</th>

                            <th> {{ __('stages.process') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Stages as $Stage)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Stage->name }}</td>
                                <td>{{ $Stage->notes }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Stage->id }}"
                                            title=" {{ __('stages.edit_stage') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Stage->id }}"
                                            title=" {{ __('stages.delete_stage') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $Stage->id }}"  role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('stages.edit_stage') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('stages.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">{{ __('stages.name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name_ar"
                                                               class="form-control"
                                                               value="{{ $Stage->getTranslation('name', 'ar') }}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $Stage->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                               class="mr-sm-2">{{ __('stages.name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $Stage->getTranslation('name', 'en') }}"
                                                               name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ __('stages.notes_ar') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes_ar" id="exampleFormControlTextarea1"
                                                              rows="3">{{ $Stage->getTranslation('notes', 'ar') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ __('stages.notes_en') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes_en"
                                                              id="exampleFormControlTextarea1"
                                                              rows="3">{{ $Stage->getTranslation('notes', 'en') }}</textarea>
                                                </div>

                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('stages.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-success">{{ __('stages.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $Stage->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('stages.delete_stage') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('stages.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('grades.delete_grade_warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $Stage->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ __('stages.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ __('stages.submit') }}</button>
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
                        {{ __('stages.add_stage') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('stages.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{ __('stages.name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="Name_ar" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{ __('stages.name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="Name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ __('stages.notes_ar') }}
                                :</label>
                            <textarea class="form-control" name="Notes_ar" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ __('stages.notes_en') }}
                                :</label>
                            <textarea class="form-control" name="Notes_en" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>


                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('stages.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('stages.submit') }}</button>
                </div>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- row closed -->


@endsection
@section('js')

@endsection
