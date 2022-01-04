@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>

            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card">
                    <div class="card-header"><h5 class="card-title">البيانات الشخصية</h5></div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row"><div class="col-4 col-md-2">الاسم</div><div class="col-8 col-md-10">محمد مجدى محمد صبرى حسوب</div></div>
                            <div class="row">
                                <div class="col-4 col-md-2">الكود</div><div class="col-8 col-md-4">1000065316</div>
                                <div class="col-4 col-md-2">الديانة</div><div class="col-8 col-md-4">مسلم</div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-2">الجنس</div><div class="col-8 col-md-4">ذكر</div>
                                <div class="col-4 col-md-2">الجنسية</div><div class="col-8 col-md-4">مصرى</div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-2">تاريخ الميلاد</div><div class="col-8 col-md-4">12/02/1998</div>
                                <div class="col-4 col-md-2">محل الميلاد</div><div class="col-8 col-md-4">مركز دكرنس - الدقهلية</div>
                            </div>

                            <div class="row">
                                <div class="col-4 col-md-2">الحالة الإجتماعية</div><div class="col-8 col-md-4">أعزب</div>
                                <div class="col-4 col-md-2">فصيلة الدم</div><div class="col-8 col-md-4"></div>
                            </div>

                            <div class="row">
                                <div class="col-4 col-md-2">رقم البطاقة</div><div class="col-8 col-md-4">29802121201214</div>
                                <div class="col-4 col-md-2">نوع البطاقة</div><div class="col-8 col-md-4">بطاقة قومية</div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-2">تاريخ الصدور</div><div class="col-8 col-md-4"></div>
                                <div class="col-4 col-md-2">مكان الصدور</div><div class="col-8 col-md-4">مصر</div>
                            </div>

                            <div class="row">
                                <div class="col-4 col-md-2">اسم الأب</div><div class="col-8 col-md-4">مجدى محمد صبرى حسوب</div>
                                <div class="col-4 col-md-2">اسم الإم</div><div class="col-8 col-md-4"></div>
                            </div>
                            <div class="row"><div class="col-4 col-md-2">حالة القيد</div><div class="col-8 col-md-10">مستجد تقدير</div></div>
                            <div class="row">
                                <div class="col-4 col-md-2">نوع القبول</div><div class="col-8 col-md-4">مكتب تنسيق (انترنت)</div>
                                <div class="col-4 col-md-2">عام القبول</div><div class="col-8 col-md-4">2016</div>
                            </div>
                            <div class="row">
                                <div class="col-4 col-md-2">حافز رياضى</div><div class="col-8 col-md-4"></div>
                                <div class="col-4 col-md-2">كشف طبى</div><div class="col-8 col-md-4">نعم</div>
                            </div>
                            <div class="row"><div class="col-4 col-md-2">ملاحظات شئون الطلاب</div><div class="col-8 col-md-10"></div></div>

                        </div>
                    </div>
                </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>

    </div>

</div>
<!-- row closed -->

<livewire:counter/>
@endsection
@section('js')
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
@endsection
