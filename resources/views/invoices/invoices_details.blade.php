@extends('layouts.master')
@section('title', 'تفاصيل الفواتير')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ التفاصيل
                    و المرفقات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @include('includes.alerts.error')
    @include('includes.alerts.success')
@endsection
@section('content')
    <div class="col-xl-12">
        <!-- div -->
        <div class="card" id="tabs-style4">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    تفاصيل الفواتير والمرفقات
                </div>
                <p class="mg-b-20">هذة الصفحة بها كافة تفاصيل الفواتير وعمليات الدفع التى تمت عليها و المرفقات </p>
                <div class="text-wrap">
                    <div class="example">
                        <div class="d-md-flex">
                            <div class="">
                                <div class="panel panel-primary tabs-style-4">
                                    <div class="tab-menu-heading">
                                        <div class="tabs-menu ">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs ml-3">
                                                <li class="">
                                                    <a href="#tab21" class="active" data-toggle="tab">
                                                        <i class="fa fa-laptop"></i>
                                                        معلومات الفاتورة
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab22" data-toggle="tab">
                                                        <i class="fa fa-cube"></i>
                                                        حالات الدفع
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab23" data-toggle="tab">
                                                        <i class="fa fa-cogs"></i>
                                                        المرفقات
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-style-4 ">
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab21">

                                            <div class="table-responsive mt-15">
                                                <table class="table table-striped">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">رقم الفاتورة</th>
                                                            <td class="text-success">{{ $invoiceData->invoice_number }}
                                                            </td>
                                                            <th scope="row">تاريخ الاصدار</th>
                                                            <td class="text-warning">{{ $invoiceData->invoice_date }} </td>
                                                            <th scope="row">تاريخ الاستحقاق</th>
                                                            <td class="text-danger">{{ $invoiceData->due_date }} </td>
                                                            <th scope="row"> القسم</th>
                                                            <td class="text-success">{{ $invoiceData->section->name }} </td>
                                                            <th scope="row"> المنتج</th>
                                                            <td class="text-success">
                                                                {{ $invoiceData->product->product_name }} </td>
                                                            <th scope="row"> مبلغ التحصيل</th>
                                                            <td class="text-danger">{{ $invoiceData->collection_amount }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">مبلغ العمولة</th>
                                                            <td class="text-danger">{{ $invoiceData->commission_amount }}
                                                            </td>
                                                            <th scope="row"> الخصم</th>
                                                            <td class="text-danger">{{ $invoiceData->discount }} </td>
                                                            <th scope="row"> نسبة الضريبه</th>
                                                            <td class="text-danger">{{ $invoiceData->rate_vat }} %</td>
                                                            <th scope="row"> قيمة الضريبة</th>
                                                            <td class="text-danger">{{ $invoiceData->value_vat }} </td>
                                                            <th scope="row"> الاجمالى مع الضريبة</th>
                                                            <td class="text-danger">{{ $invoiceData->total }} </td>
                                                            <th scope="row"> الحالة الحالية </th>
                                                            <td>
                                                                @if ($invoiceData->status == 'paid')
                                                                    <span class="badge badge-pill badge-success">
                                                                        {{ $invoiceData->status }}
                                                                    </span>
                                                                @elseif($invoiceData->status == 'unpaid')
                                                                    <span class="badge badge-pill badge-danger">
                                                                        {{ $invoiceData->status }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-pill badge-warning">
                                                                        {{ $invoiceData->status }}
                                                                    </span>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"> المستخدم</th>
                                                            <td class="text-danger">{{ $invoiceData->user }} </td>
                                                            <th scope="row"> ملاحظات</th>
                                                            <td class="text-success">{{ $invoiceData->note }} </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab22">
                                            <div class="table-responsive mt-15">
                                                <table class="table table-striped">

                                                    <tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>رقم الفاتورة</th>
                                                                <th>نوع المنتج</th>
                                                                <th>القسم</th>
                                                                <th>حالة الدفع</th>
                                                                <th>تاريخ الدفع</th>
                                                                <th> ملاحظات</th>
                                                                <th> تاريخ الاضافة</th>
                                                                <th> المستخدم</th>
                                                            </tr>
                                                        </thead>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td class="text-info">{{ $invoiceData->invoice_number }}</td>
                                                            <td class="text-primary">
                                                                {{ $invoiceData->product->product_name }}</td>
                                                            <td class="text-success">{{ $invoiceData->section->name }}
                                                            </td>
                                                            <td>
                                                                @if ($invoiceData->status == 'paid')
                                                                    <span class="badge badge-pill badge-success">
                                                                        {{ $invoiceData->status }}
                                                                    </span>
                                                                @elseif($invoiceData->status == 'unpaid')
                                                                    <span class="badge badge-pill badge-danger">
                                                                        {{ $invoiceData->status }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-pill badge-warning">
                                                                        {{ $invoiceData->status }}
                                                                    </span>
                                                                @endif

                                                            </td>
                                                            <td class="text-primary"></td>
                                                            <td class="text-primary">{{ $invoiceData->note }}</td>
                                                            <td class="text-primary">{{ $invoiceData->invoice_date }}</td>
                                                            <td class="text-primary">{{ $invoiceData->user }}</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab23">
                                            <div class="table-responsive mt-15">
                                                <table class="table table-striped">

                                                    <tbody>
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> اسم الملف</th>
                                                                <th> المستخدم</th>
                                                                <th>تاريخ الاضافة</th>
                                                                <th>العمليات </th>
                                                            </tr>
                                                        </thead>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td class="text-info">{{ $invoiceData->invoice_number }}</td>
                                                            <td class="text-primary">{{ $invoiceData->user }}</td>
                                                            <td class="text-success">{{ $invoiceData->created_at }} </td>
                                                            <td>
                                                                <a class="btn btn-outline-success btn-sm" role="button"
                                                                    href="{{ route('invoice_attachments.show_file', [$invoiceData->id, $invoiceData->invoice_number]) }}">
                                                                    <i class="fas fa-eye"></i>&nbsp;&nbsp;
                                                                    عرض
                                                                </a>
                                                                <a class="btn btn-outline-info btn-sm" role="button"
                                                                    href="{{ route('invoice_attachments.download_file', [$invoiceData->id, $invoiceData->invoice_number]) }}">
                                                                    <i class="fas fa-download"></i>&nbsp;&nbsp;
                                                                    تحميل
                                                                </a>
                                                                <a class="btn btn-outline-danger btn-sm"
                                                                    data-toggle="modal" href="#delete_file">
                                                                    <i class="fas fa-trash"></i>
                                                                    حذف
                                                                </a>
                                                            </td>

                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /div -->
        </div>
    </div>
    </div>
    <!-- Modal effects -->
    <div class="modal" id="delete_file">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المرفق</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form
                    action="{{ route('invoice_attachments.delete_file', [$invoiceData->id, $invoiceData->invoice_number]) }}"
                    method="POST">
                    @csrf
                    <div class="modal-body">
                        <h6>هل انت متأكد من حذف هذا المرفق ؟<br> <br>
                            للمتابعة اضغط موافق
                        </h6>

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" type="submit">موافق</button>
                        <button class="btn ripple btn-success" data-dismiss="modal" type="button">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->

@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
@endsection
