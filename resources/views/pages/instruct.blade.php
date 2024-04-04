@extends('layout')

@section('content')
    <div class="pt-10" style="width: 1000px; margin: 0 auto;">
        @if(isset($post_instruct))
            <h1>{{ $post_instruct->info_post_title }}</h1>
            <p>Tác giả: {{ $post_instruct->info_post_author }}</p>
            <p>{!! $post_instruct->info_post_content !!}</p>
        @else
            <p>Không tìm thấy bài viết</p>
        @endif
        <div class="height-emulator d-none d-lg-block"></div>
    </div>
@endsection