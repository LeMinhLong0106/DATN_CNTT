@extends('layouts.main')

@section('main')
    <div class="box-container">
        <h3>Tìm kiếm với từ khóa: {{ $data }}</h3>

        @if (count($monans) > 0)
            @foreach ($monans as $item)
                <div class="box">
                    {{-- <i class="tinhtrang">còn</i> --}}
                    <div class="image">
                        <img src="{{ asset('images/' . $item->hinhanh) }}" alt="" width="100px">
                    </div>
                    <div class="content">
                        <h3>{{ $item->tenmonan }}</h3>
                        <div class="price">{{ $item->gia }}/{{ $item->donvitinhs->tendvt }}</div>
                        <a href="{{ route('detail', [$item->id]) }}" class="btn">Chi tiết</a>
                    </div>
                </div>
            @endforeach
        @else
            <h3>Không tìm thấy kết quả nào</h3>
        @endif

    </div>
@endsection
