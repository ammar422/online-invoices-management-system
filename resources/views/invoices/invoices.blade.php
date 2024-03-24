@extends('layouts.master')
@section('title', 'قائمة الفواتير')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><strong>الفواتير</strong></h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"><strong>
                        / قائمة الفواتير
                    </strong>
                </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @include('includes.alerts.error')
    @include('includes.alerts.success')
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="row row-sm">

            <!--div-->
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">جدول قائمة الفواتير </h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        @isset($invoices)
                            <p class="tx-12 tx-gray-500 mb-2">
                                هذا الجدول يحتوى على كافة الفواتير بجميع انواعها والاقسام والمنتجات التى تنتمى اليها
                            </p>
                        @endisset
                        <a href="{{ route('invoices.create') }}" class="btn btn-success"> إضافة فاتورة</a>
                    </div>
                    @if (!isset($invoices))
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">

                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2">
                            <h3>
                                لا يوجد اي فواتير لعرضها
                            </h3>
                            </p>
                        </div>
                    @endif
                    @isset($invoices)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table key-buttons text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">م</th>
                                            <th class="border-bottom-0">رقم الفاتورة </th>
                                            <th class="border-bottom-0">تاريخ الفاتورة</th>
                                            <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                            <th class="border-bottom-0">المنتج</th>
                                            <th class="border-bottom-0">القسم</th>
                                            <th class="border-bottom-0">المبلغ الكلى</th>
                                            <th class="border-bottom-0">الخصم</th>
                                            <th class="border-bottom-0">نسبة الضريبة</th>
                                            <th class="border-bottom-0">قيمة الضريبة</th>
                                            <th class="border-bottom-0">العمولة</th>
                                            <th class="border-bottom-0">الحالة</th>
                                            <th class="border-bottom-0">ملاحظات</th>
                                            <th class="border-bottom-0">المستخدم</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->id }}</td>
                                                <td>{{ $invoice->invoice_number }}</td>
                                                <td>{{ $invoice->invoice_date }}</td>
                                                <td>{{ $invoice->due_date }}</td>
                                                <td>{{ $invoice->product->product_name }}</td>
                                                <td>{{ $invoice->section->name }}</td>
                                                <td>{{ $invoice->collection_amount }}</td>
                                                <td>{{ $invoice->discount }}</td>
                                                <td>{{ $invoice->rate_vat }}</td>
                                                <td>{{ $invoice->value_vat }}</td>
                                                <td>{{ $invoice->total }}</td>
                                                <td>{{ $invoice->status }}</td>
                                                <td>{{ $invoice->note }}</td>
                                                <td>{{ $invoice->user }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
            <!--/div-->

            <!--div-->


        </div>
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
@endsection
