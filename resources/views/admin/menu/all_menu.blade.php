@extends('admin_layout')

@section('admin_page_heading')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Danh sách Menu</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a>Menu</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách Menu</strong>
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
                <label class="col-form-label" for="product_name">Tên Menu</label>
                <input type="text" id="product_name" name="product_name" value="" placeholder="Nhập tên Menu" class="form-control">
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
                if($message){
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
                            <th data-toggle="true">Tên Menu</th>
                            <th data-hide="all">Menu con</th>
                            <th data-hide="phone">Đường dẫn</th>
                            <th data-hide="phone">Ngày tạo</th>
                            <th data-hide="phone">Trạng thái</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($all_menus as $key => $menu_item)
                    <tr>
                        <td>
                            {{ $menu_item->menu_name }}
                        </td>
                        <td>
                            {{-- {{ $menu_item->menu_sub_name }} --}}
                            <table class="footable table table-stripped toggle-arrow-tiny"">
                                <thead>
                                    <tr>
                                        <th data-toggle="true">Tên Menu</th>
                                        <th data-hide="phone">Đường dẫn</th>
                                        <th data-hide="phone">Ngày tạo</th>
                                        <th data-hide="phone">Trạng thái</th>
                                        <th class="text-right" data-sort-ignore="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($menu_item->submenus as $submenu)
                                            <tr>
                                                <td>{{ $submenu->menu_sub_name }}</td>
                                                <td>{{ $submenu->menu_sub_url }}</td>
                                                <td>{{ $submenu->created_at }}</td>
                                                <td>
                                                    <?php
                                                        if($submenu->menu_sub_status == 0){
                                                    ?>
                                                    <a href="{{URL::to('/active-sub-menu-detail/'.$submenu->id_sub_menu)}}">
                                                        <span class="label label-danger">Ẩn</span>
                                                    </a>
                                                    <?php
                                                        } else {
                                                    ?>
                                                        <a href="{{URL::to('/unactive-sub-menu-detail/'.$submenu->id_sub_menu)}}">
                                                            <span class="label label-primary">Hiển thị</span>
                                                        </a>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{URL::to('/edit-sub-menu-detail/'.$submenu->id_sub_menu)}}" class="btn-white btn btn-xs">
                                                            Sửa
                                                        </a>
                                                        <a onclick="return confirm('Bạn có chắc chắn là muốn xóa menu con này không?')" href="{{URL::to('/delete-menu-sub-detail/'.$submenu->id_sub_menu)}}" class="btn-white btn btn-xs">
                                                            Xóa
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td>
                            {{ $menu_item->menu_url }}
                        </td>
                        <td>
                            {{ $menu_item->created_at }}
                        </td>
                        <td>
                            <?php
                                if($menu_item->menu_status == 0){
                            ?>
                                <a href="{{URL::to('/active-menu-detail/'.$menu_item->id_menu)}}">
                                    <span class="label label-danger">Ẩn</span>
                                </a>
                            <?php
                                } else {
                            ?>
                                <a href="{{URL::to('/unactive-menu-detail/'.$menu_item->id_menu)}}">
                                    <span class="label label-primary">Hiển thị</span>
                                </a>
                            <?php
                                }
                            ?>
                        </td>
                        <td class="text-right">
                            <div class="btn-group">
                                <a href="{{URL::to('/edit-menu-detail/'.$menu_item->id_menu)}}" class="btn-white btn btn-xs">
                                    Sửa
                                </a>
                                <a onclick="return confirm('Bạn có chắc chắn là muốn xóa menu này không?')" href="{{URL::to('/delete-menu-detail/'.$menu_item->id_menu)}}" class="btn-white btn btn-xs">
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