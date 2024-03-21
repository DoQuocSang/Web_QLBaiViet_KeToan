@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <!-- Form -->
                <form action="{{URL::to('/save-link')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề link</label>
                        <!-- <input type="text" class="form-control" id="name" name="title" required> -->
                        <input type="text" class="form-control" id="name" name="title" pattern="^[^*]*$" title="Tiêu đề không được chứa ký tự *." required>
                    </div>
                    <div class="form-group">
                        <label for="url">Đường dẫn</label>
                        <input type="url" class="form-control" id="url" name="url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
</div>
@endsection
