@extends('admin_layout')

@section('admin_page_heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Danh sách bài viết</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Bài viết</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách bài viết</strong>
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('admin_content')
    <div class="animated fadeInRight ecommerce">

        <div class="ibox-content m-b-sm border-bottom">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="product_name">Tiêu đề bài viết</label>
                        <input type="text" id="product_name" name="product_name" value=""
                            placeholder="Nhập tiêu đề bài viết" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="col-form-label" for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Ẩn</option>
                            <option value="1" selected>Hiện</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            // echo '<span class="text-danger font-weight-bold">'.$message.'</span>';
                            echo '<div class="alert alert-success alert-dismissable">';
                            echo '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
                            echo $message;
                            echo '</div>';
                            Session::put('message', null);
                        }
                        ?>
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>
                                    <th data-toggle="true">Thứ tự hiển thị</th>
                                    <th data-toggle="true">Thể loại</th>
                                    <th data-toggle="true">Tiêu đề</th>
                                    <th data-hide="all">Nội dung</th>
                                    <th data-toggle="true">Tác giả</th>
                                    <th data-toggle="true">Ngày tạo</th>
                                    <th data-toggle="true">Trạng thái</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_post as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $item->post_index }}
                                        </td>
                                        <td>
                                            {{ $item->category_name }}
                                        </td>
                                        <td>
                                            {{ $item->post_title }}
                                        </td>
                                        <td>
                                            {{ $item->post_content }}
                                        </td>
                                        <td>
                                            {{ $item->post_author }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <?php
                                                if($item->post_status == 0){
                                            ?>
                                            <a href="{{ URL::to('/active-post-detail/' . $item->post_id) }}">
                                                <span class="label label-danger">Ẩn</span>
                                            </a>
                                            <?php
                                                }else{
                                            ?>
                                            <a href="{{ URL::to('/unactive-post-detail/' . $item->post_id) }}">
                                                <span class="label label-primary">Hiển thị</span>
                                            </a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ URL::to('/edit-post-detail/' . $item->post_id) }}"
                                                    class="btn-white btn btn-xs">
                                                    Sửa
                                                </a>
                                                <a onclick="return confirm('Bạn có chắc chắn là muốn xóa bài viết này không?')"
                                                    href="{{ URL::to('/delete-post-detail/' . $item->post_id) }}"
                                                    class="btn-white btn btn-xs">
                                                    Xóa
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
