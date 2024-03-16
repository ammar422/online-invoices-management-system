@extends('layouts.master')
@section('title', 'المنتجات')
@section('css')
    @include('includes.css.css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"><strong>الاعدادات</strong></h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            @include('includes.alerts.success')
            @include('includes.alerts.error')
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">جدول قائمة المنتجات ..</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2"> هذا الجدول يحتوى على كافة المنتجات فى جميع الاقسام الموجودة داخل
                        النظام</p>
                </div>
                <div class="card-header pb-0">
                    <a class="modal-effect btn btn-outline-success btn-block" data-effect="effect-scale" data-toggle="modal"
                        href="#add-new-product-modal">
                        <strong>
                            إضافة منتج
                        </strong>
                    </a>
                </div>
                @isset($products)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">م</th>
                                        <th class="border-bottom-0">اسم المنتج</th>
                                        <th class="border-bottom-0">القسم</th>
                                        <th class="border-bottom-0">الوصف</th>
                                        <th class="border-bottom-0"> العمليات</th>
                                        <th class="border-bottom-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->section->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <a class="modal-effect btn btn-outline-info" data-effect="effect-scale"
                                                    data-toggle="modal" href="#edit-product-modal" title="تعديل"
                                                    data-id='{{ $product->id }}' data-name="{{ $product->product_name }}"
                                                    data-sectionId="{{ $product->section->id }}"
                                                    data-sectionName="{{ $product->section->name }}"
                                                    data-description="{{ $product->description }}">
                                                    <i class="las la-pen"></i>
                                                </a>
                                                <a class="modal-effect btn btn-outline-danger" data-effect="effect-scale"
                                                    data-toggle="modal" href="#delete-product-modal" title="حذف"
                                                    data-id='{{ $product->id }}' data-name="{{ $product->product_name }}"
                                                    data-description="{{ $product->description }}">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            </td>
                                            <td></td>
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
    </div>
    <!-- row closed -->



    <!-- adding new product modal -->
    <div class="modal" id="add-new-product-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة منتج جديد</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <h6>اسم المنتج</h6>
                        <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                            name="product_name" id="product_name">
                        @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <h6> القسم</h6>
                        <select class="form-control @error('section_id')is-inavlid @enderror" name="section_id"
                            id="section_id">
                            @foreach (getSectionName() as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id')
                            <span role="alert" class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="modal-body">
                        <h6> الوصف </h6>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                            rows="3">
                      </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">حفظ</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End adding new product modal -->

    <!-- editing exist product modal -->
    <div class="modal" id="edit-product-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">تعديل منتج </h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <form action="" method="post" id="edit-form">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <h6>اسم المنتج</h6>
                        <input class="form-control @error('product_name') is-invalid @enderror" type="text"
                            name="product_name" id="product_name">
                        @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror


                        <h6> القسم</h6>
                        <select class="form-control @error('section_id')is-inavlid @enderror" name="section_id">
                            @foreach (getSectionName() as $section)
                                <option value="{{ $section->id }}"> {{ $section->name }}</option>
                            @endforeach
                        </select>
                        @error('section_id')
                            <span role="alert" class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                        <h6> الوصف </h6>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                            rows="3">
                      </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">حفظ</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End editing exist product modal -->

    <!-- remove product modal -->
    <div class="modal" id="delete-product-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"> حذف منتج</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <form action="" method="post" id="delete-form">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <h6> هل انت متاكد من حذف المنتج ؟..</h6>
                        <label for="">اسم المنتج</label>
                        <input type="text" disabled class="form-control" id="product-name" value="">
                        <br>
                        <label for="">القسم</label>
                        <input type="text" disabled class="form-control" id="product-description" value="">

                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" type="submit">تأكيد</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End remove product modal -->



    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    @include('includes.js.js')
    <script>
        $('#edit-product-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var product_name = button.data('name')
            var section_id = button.data('sectionId')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #product_name').val(product_name);
            modal.find('.modal-body #description').val(description);
            document.getElementById('edit-form').action = '{{ url('products') }}' + '/' + id;
        })
        $('#delete-product-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var product_name = button.data('name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #product-name').val(product_name)
            modal.find('.modal-body #product-description').val(description)
            document.getElementById('delete-form').action = '{{ url('products') }}' + '/' + id
        })
    </script>


@endsection
