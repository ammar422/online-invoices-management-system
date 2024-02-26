@extends('layouts.master')
@section('tittle', 'الاقسام')
@section('css')
    @include('includes.css.css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><strong>الاعدادت</strong></h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"><strong> / الاقسام</strong></span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div id='secTable' class="row row-sm">
            <!--div-->
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">
                                <strong>
                                    جدول قائمة الاقسام
                                </strong>
                            </h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        @isset($sections)
                            <p class="tx-12 tx-gray-500 mb-2">
                                <strong>
                                    هذا الجدول يحتوى على كافة الاقسام بجميع تفاصيلها
                                </strong>
                            </p>
                        @endisset
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-outline-success btn-block" data-effect="effect-scale"
                                data-toggle="modal" href="#modaldemo8">
                                <strong>
                                    إضافة قسم
                                </strong>
                            </a>
                        </div>
                    </div>
                    @isset($sections)
                        @if ($sections->count() < 1)
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">


                                </div>
                                <p class="tx-12 tx-gray-500 mb-2">
                                <h3>
                                    <strong>
                                        لا يوجد اي اقسام لعرضها
                                    </strong>
                                </h3>
                                </p>
                            </div>
                        @endif

                        @if ($sections->count() > 0)
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table key-buttons text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">م</th>
                                                <th class="border-bottom-0">اسم القسم</th>
                                                <th class="border-bottom-0"> الوصف </th>
                                                <th class="border-bottom-0"> العمليات</th>
                                                <th class="border-bottom-0"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sections as $section)
                                                <tr class="section-row{{ $section->id }}">
                                                    <td>{{ $section->id }}</td>
                                                    <td>{{ $section->name }}</td>
                                                    <td>{{ $section->description }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-success" href="">تعديل</a>
                                                        <a class="btn btn-outline-danger" href="">مسح</a>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    @endisset
                </div>
            </div>
            <!--/div-->

            <!--div-->


        </div>
        <!-- Basic modal -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title"> إضافة قسم جديد</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div style="display: none" id="aler-seccess" class="alert alert-success alert-dismissible fade show"
                        role="alert">
                        <strong>
                            تم حفظ القسم بنجاح
                        </strong>
                        <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                            <span aria-hidden="true">&times; </span>
                        </button>
                    </div>
                    <div style="display: none" id="aler-error" class="alert alert-danger alert-dismissible fade show"
                        role="alert">
                        <strong>
                            عفواََ حدث خطاء ماء برجاء المحاولة لاحقاََ
                        </strong>
                        <button type="button" class="close" data-dismiss='alert' aria-label="Close">
                            <span aria-hidden="true">&times; </span>
                        </button>
                    </div>
                    <form id="section-form">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><strong>
                                        اسم القسم
                                    </strong>
                                </label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" id="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="examplFormControlTextarea1">
                                    <strong>
                                        الوصف
                                    </strong>
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                                    id="description" rows="3"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" value="{{ Auth::user()->name }}" name="created_by">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" id="form-submit" type="submit"><strong>حفظ</strong> </button>
                            <button class="btn btn-secondary" data-dismiss="modal"
                                type="button"><strong>إلغاء</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    @include('includes.js.js')

    <script>
        $(document).on('click', '#form-submit', function(e) {
            e.preventDefault()
            let formdata = new FormData($('#section-form')[0])
            $.ajax({
                type: 'post',
                url: '{{ route('sections.store') }}',
                data: formdata,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if (data.status == true) {
                        $("#aler-seccess").show()
                    }
                    if (data.status == false) {
                        $("#aler-error").show()

                    }
                },
                error: function(reject) {},
            });
        })
    </script>
@endsection
