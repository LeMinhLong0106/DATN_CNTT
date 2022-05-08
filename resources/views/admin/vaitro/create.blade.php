@extends('layouts.admin')

@section('js')
    {{-- chọn tất cả --}}
    <script>
        $('.checkbox_wrap').on('click', function() {
            $(this).parents('.card').find('.checkbox_child').prop('checked', $(this).prop('checked'));
        })

        $('.checkall').on('click', function() {
            $(this).parents().find('.checkbox_wrap').prop('checked', $(this).prop('checked'));
            $(this).parents().find('.checkbox_child').prop('checked', $(this).prop('checked'));
        })
    </script>
@endsection

@section('content_admin')
    <div class="container-fluid">
        <h3>THÊM MỚI VÀI TRÒ</h3>
        <div>
            <form action="{{ route('vaitro.store') }}" method="post">
                @csrf

                <div class="col-md-12">
                    <div class="form-group1">
                        <label for="tenvaitro" class="control-label "><b>Tên vai trò: </b></label>
                        <input type="text" class="form-control text-box single-line" id="tenvaitro" name="tenvaitro">
                    </div>

                    <div class="form-group1">
                        <label for="mota" class="control-label "><b>Mô tả: </b></label>
                        <input type="text" class="form-control text-box single-line" id="mota" name="mota">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" class="checkall"> Chọn tất cả
                            </label>
                        </div>
                        {{-- @foreach ($quyenCha as $item)
                            <div class="card border-primary col-md-4">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" value="" class="checkbox_wrap">
                                    </label>
                                    Module {{ $item->tenquyen }}
                                </div>
                                <div class="row">
                                    @foreach ($item->quyenCon as $item1)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label>
                                                    <input type="checkbox" class="checkbox_child" name="quyen_id[]"
                                                        value="{{ $item1->id }}">
                                                </label>
                                                {{ $item1->tenquyen }}
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach --}}
                    </div>

                </div>
                <div class="form-group" style="align-items: baseline;">
                    <div style="margin-top: 10px;" class="col-md-offset-2 col-md-6">
                        <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
                    </div>

                    <div class="col-md-offset-2 col-md-6 comback_div">
                        <a class="comeback" href="{{ route('vaitro.index') }}">Quay lại</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
