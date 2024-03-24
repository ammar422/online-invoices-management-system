@extends('layouts.master')
@section('title', 'اضافة فاتورة')
@section('css')
    @include('includes.css.css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                    فاتورة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">رقم الفاتورة</label>
                                <input class="form-control @error('invoice_number') is-invalid @enderror" type="text"
                                    name="invoice_number" id="invoice_number" title="يرجي ادخال رقم الفاتورة">
                                @error('invoice_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label>تاريخ الفاتورة</label>
                                <input class="form-control fc-datepicker @error('invoice_date') is-invalid @enderror"
                                    name="invoice_date" id="invoice_date" placeholder="YYYY-MM-DD" type="date"
                                    value="{{ date('Y-m-d') }}">
                                @error('invoice_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label>تاريخ الاستحقاق</label>
                                <input class="form-control fc-datepicker @error('due_date') is-invalid @enderror"
                                    name="due_date" placeholder="YYYY-MM-DD" type="date">
                                @error('due_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">القسم</label>
                                <select name="section_id" class="form-control @error('section_id') is-invalid @enderror ">
                                    <option value="" selected disabled>حدد القسم</option>
                                    @foreach (getSectionName() as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">المنتج</label>
                                <select id="product_id" name="product_id"
                                    class="form-control @error('product_id') is-invalid @enderror ">

                                </select>
                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">مبلغ التحصيل</label>
                                <input type="number" class="form-control @error('collection_amount') is-invalid @enderror"
                                    id="collection_amount" name="collection_amount">
                                @error('collection_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">مبلغ العمولة</label>
                                <input type="number"
                                    class="form-control form-control-lg @error('commission_amount') is-invalid @enderror"
                                    id="commission_amount" name="commission_amount" title="يرجي ادخال مبلغ العمولة ">
                                @error('commission_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">الخصم</label>
                                <input type="number"
                                    class="form-control form-control-lg @error('discount') is-invalid @enderror"
                                    id="discount" name="discount" value="0" title="يرجي ادخال مبلغ الخصم ">
                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">نسبة ضريبة القيمة المضافة</label>
                                <select name="rate_vat" id="rate_vat" 
                                    class="form-control @error('rate_vat') is-invalid @enderror" onchange="calcTotla()" >
                                    <option value="" selected disabled>حدد نسبة الضريبة</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                </select>
                                @error('rate_vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                <input readonly type="text"
                                    class="form-control  @error('value_vat') is-invalid @enderror" id="value_vat"
                                    name="value_vat">
                                @error('value_vat')
                                    <span class="invalid-feedback "role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label ">الاجمالي شامل الضريبة</label>
                                <input readonly type="text" class="form-control @error('total') is-invalid @enderror"
                                    id="total" name="total">
                                @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control @error('note') is-invalid @enderror" id="exampleTextarea" name="note"
                                    rows="3"></textarea>
                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>


                        <h5 class="card-title">المرفقات</h5>
                        <div class="col">
                            <input type="file" name="image"
                                class="form-control  @error('image') is-invalid @enderror" data-height="70" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    @include('includes.js.js')
@endsection
