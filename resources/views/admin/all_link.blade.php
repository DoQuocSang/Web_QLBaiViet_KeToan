@extends('admin_layout')
@section('admin_content')

@if(Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-link">
                <h4>
                    Link hỗ trợ > Danh sách
                </h4>
            </div>
            <div class="ibox-content">
                <?php
                    $message = Session::get('message');
                    if ($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <h5>* Liên kết cố định</h>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề link</th>
                                    <th>Đường dẫn</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_link as $key => $supportlink)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $supportlink->title }}</td>
                                    <td>{{ $supportlink->url }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ URL::to('/edit-link/' . $supportlink->link_id) }}"
                                                class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                          
                                            <span style="margin-left: 5px; margin-right: 5px;"></span>
                                            <form action="{{ route('delete.link', $supportlink->link_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger"
                                                    onclick="return confirm('Bạn có chắc muốn xóa liên kết này?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <button onclick="window.location='{{URL::to('/add-link')}}'" class="btn btn-primary">Thêm link mới</button>
        </div>
    </div>
</div>
@endsection