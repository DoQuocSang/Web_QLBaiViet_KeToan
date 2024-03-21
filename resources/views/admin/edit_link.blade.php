@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            
            <h2>Cập nhật link hỗ trợ</h2>
            <div class="ibox-content">
                <!-- Form -->
                <form action="{{URL::to('/update-link/'.$edit_link->link_id)}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề link</label>
                        <input type="text" class="form-control" id="name" name="title" value="{{ $edit_link->title}}"required>
                    </div>
                    <div class="form-group">
                        <label for="url">Đường dẫn</label>
                        <input type="url" class="form-control" id="url" name="url" value="{{ $edit_link->url }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>

                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
@endsection