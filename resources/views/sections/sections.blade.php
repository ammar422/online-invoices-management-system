@extends('layouts.master')
@section('title', 'الاقسام')
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
        <div class="row row-sm">
            <div class="col-xl-12">
                @include('includes.alerts.success')
                @include('includes.alerts.error')
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <a class="modal-effect btn btn-outline-success btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#modaldemo1">
                            <strong>
                                إضافة قسم
                            </strong>
                        </a>
                    </div>
                    @isset($sections)
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
                                                        <a class="modal-effect btn btn-outline-info" data-effect="effect-scale"
                                                            data-toggle="modal" data-id='{{ $section->id }}'
                                                            data-name='{{ $section->name }}'
                                                            data-description='{{ $section->description }}' href="#editmodal"
                                                            title="تعديل">
                                                            <i class="las la-pen"></i>
                                                        </a>
                                                        <a class="modal-effect btn btn-outline-danger" href="#deletemodal"
                                                            data-effect="effect-scale" data-name='{{ $section->name }}'
                                                            data-id='{{ $section->id }}' data-toggle="modal" title="مسح"> <i
                                                                class="las la-trash"></i></a>
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
        <div class="modal" id="modaldemo1">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title"><strong>
                                اضافة قسم
                            </strong></h6><button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
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
                            <button class="btn ripple btn-primary" type="submit"><strong>
                                    حفظ
                                </strong></button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"><strong>
                                    إلغاء
                                </strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->

        <!-- edit modal -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="" method="post" autocomplete="off" id="edit-form">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <input type="hidden" value="{{ Auth::user()->name }}" name="created_by">
                                <label for="recipient-name" class="col-form-label"><strong>اسم القسم</strong></label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" type="text">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label"><strong>الوصف</strong></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><strong>تاكيد</strong></button>
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><strong>اغلاق</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- delete modal -->
        <div class="modal" id="deletemodal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title"><strong>حذف القسم</strong></h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="delete-form" action="" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p><strong>هل انت متاكد من عملية الحذف ؟</strong></p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name" id="name" type="text" readonly
                                value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger"><strong>تاكيد</strong></button>
                        </div>
                </div>
                </form>
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
    {{-- include for css modale --}}
    @include('includes.js.js')

    {{-- Jquary script --}}
    <script>
        $('#editmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);
            document.getElementById('edit-form').action = '{{ url('sections') }}' + '/' + id;
        })


        $('#deletemodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            document.getElementById('delete-form').action = '{{ url('sections') }}' + '/' + id;
        })
    </script>

@endsection
