@extends('admin_layout')

@section('admin_page_heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Danh sách trang thông tin</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{URL::to('/dashboard')}}>Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href={{URL::to('/all-info-post')}}>Trang thông tin</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Danh sách trang thông tin</strong>
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
                        <label class="col-form-label" for="product_name">Tiêu đề trang thông tin</label>
                        <input type="text" id="product_name" name="product_name" value=""
                            placeholder="Nhập tiêu đề trang thông tin" class="form-control">
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
                                    <th data-toggle="true">Tiêu đề</th>
                                    <th data-hide="all">Nội dung</th>
                                    <th data-toggle="true">Tác giả</th>
                                    <th data-toggle="true">Ngày tạo</th>
                                    <th data-toggle="true">Trạng thái</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_info_post as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $item->info_post_title }}
                                        </td>
                                        <td>
                                            {!! $item->info_post_content !!}
                                        </td>
                                        <td>
                                            {{ $item->info_post_author }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <?php
                                                if($item->info_post_status == 0){
                                            ?>
                                            <a href="{{ URL::to('/active-info-post/' . $item->info_post_id) }}">
                                                <span class="label label-danger">Ẩn</span>
                                            </a>
                                            <?php
                                                }else{
                                            ?>
                                            <a href="{{ URL::to('/unactive-info-post/' . $item->info_post_id) }}">
                                                <span class="label label-primary">Hiển thị</span>
                                            </a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ URL::to('/edit-info-post/' . $item->info_post_id) }}"
                                                    class="btn-white btn btn-xs">
                                                    Sửa
                                                </a>

                                                <?php
                                                    if($item->is_default == false){
                                                ?>
                                                    <a onclick="return confirm('Bạn có chắc chắn là muốn xóa trang thông tin này không?')"
                                                        href="{{ URL::to('/delete-info-post/' . $item->info_post_id) }}"
                                                        class="btn-white btn btn-xs">
                                                            Xóa
                                                    </a>
                                                <?php
                                                    }
                                                ?>
                                          
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
