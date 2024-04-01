@extends('admin_layout')

@section('admin_page_heading')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Chỉnh sửa menu con</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a>Menu con</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Chỉnh sửa menu con</strong>
            </li>
        </ol>
    </div>
</div>
@endsection


@section('admin_content')
<div class="animated fadeInRight ecommerce">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<div class="alert alert-success alert-dismissable">';
                                    echo '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
                                    echo $message;
                                    echo '</div>';
                                    Session::put('message', null);
                                }
                            ?>
                            <div class="panel-body">
                                @foreach($edit_sub_menu as $key => $edit_value)
                                <form action={{(URL::to("/update-sub-menu-detail/".$edit_value->id_sub_menu))}} method="POST">
                                    {{ csrf_field() }}
                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Menu cha:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="id_parent">
                                                        <option value="">Chọn menu cha</option>
                                                        @foreach($menus as $menu)
                                                            <option value="{{ $menu->id_menu }}" {{ $menu->id_menu == $edit_sub_menu[0]->id_parent ? 'selected' : '' }}>
                                                                {{ $menu->menu_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Tên menu con:</label>
                                                <div class="col-sm-10"><input name="menu_sub_name" value="{{ $edit_value->menu_sub_name}}" type="text" class="form-control" placeholder="Nhập tên menu"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Đường dẫn:</label>
                                                <div class="col-sm-10"><input name="menu_sub_url" value="{{ $edit_value->menu_sub_url}}" type="text" class="form-control" placeholder="Nhập đường dẫn"></div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="row">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <a class="btn btn-white btn-sm" href={{(URL::to("/all-menu"))}}>Quay lại</a>
                                                <button class="btn btn-primary btn-sm" type="submit" name="edit_sub_menu">Lưu thay đổi</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            @endforeach
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection