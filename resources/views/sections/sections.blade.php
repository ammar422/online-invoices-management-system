@extends('layouts.master')
@section('tittle', 'الاقسام')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
        @include('includes.alerts.success')
        @include('includes.alerts.error')
        <div class="row row-sm">
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
                            <a class="modal-effect btn btn-success btn-block" data-effect="effect-scale" data-toggle="modal"
                                href="#modaldemo8">
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
                                                <tr>
                                                    <td>{{ $section->id }}</td>
                                                    <td>{{ $section->name }}</td>
                                                    <td>{{ $section->description }}</td>
                                                    <td>
                                                        <a class="btn btn-success" href="">edit</a>
                                                        <a class="btn btn-danger" href="">delete</a>
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
                    <form action="{{ route('sections.store') }}" method="post">
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
                                <label for="examplFormControlTextarea1"><strong>
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
                            <button class="btn btn-success" type="submit"><strong>حفظ</strong> </button>
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
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
