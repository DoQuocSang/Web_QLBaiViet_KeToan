@extends('admin_layout')

@section('admin_page_heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cập nhật bài viết</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{URL::to('/dashboard')}}>Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                     <a href={{URL::to('/all-post-detail')}}>Bài viết</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Cập nhật bài viết</strong>
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
                    {{-- <ul class="nav nav-tabs">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Product info</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Data</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Discount</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li>
                    </ul> --}}

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
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
                            <div class="panel-body">
                                @foreach($edit_post as $key => $edit_value)
                                <form action={{ URL::to('/update-post-detail/'.$edit_value->post_id) }} method="POST">
                                    {{ csrf_field() }}
                                    <fieldset>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Số thứ tự:</label>
                                            <div class="col-sm-10"><input name="post_index" type="number" value="{{$edit_value->post_index}}"
                                                    class="form-control" placeholder="Nhập số thứ tự hiển thị"></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Thể loại:</label>
                                            <div class="col-sm-10">
                                                <select name="category_id" class="form-control">
                                                    <option value = "" selected>-- Chọn thể loại --</option>
                                                    @foreach($cate_post as $key => $cate)
                                                    @if($cate->category_id == $edit_value->category_id)
                                                        <option selected value = "{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                    @else
                                                        <option value = "{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                    @endif
                                                @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Tiêu đề:</label>
                                            <div class="col-sm-10"><input name="post_title" type="text" value="{{$edit_value->post_title}}"
                                                    class="form-control" placeholder="Nhập tiêu đề"></div>
                                        </div>
                                        {{-- <div class="form-group row"><label class="col-sm-2 col-form-label">Nội dung:</label>
                                            <div class="col-sm-10"><textarea name="post_content" rows="5" class="form-control" placeholder="Nhập nội dung">{{$edit_value->post_content}}</textarea></div>
                                        </div> --}}
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nội dung:</label>
                                            <div class="col-sm-10">
                                                <textarea class="summernote" name="post_content">{{$edit_value->post_content}}</textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="row">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <a class="btn btn-white btn-sm" href={{ URL::to('/all-post-detail') }}>Quay lại</a>
                                                <button class="btn btn-primary btn-sm" type="submit" name="edit_post">Lưu thay đổi</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div id="tab-2" class="tab-pane">
                            <div class="panel-body">

                                <fieldset>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">ID:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="543"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Model:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="..."></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Location:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="location"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Tax Class:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" >
                                                <option>option 1</option>
                                                <option>option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Quantity:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="Quantity"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Minimum quantity:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="2"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Sort order:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" placeholder="0"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Status:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" >
                                                <option>option 1</option>
                                                <option>option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>


                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-stripped table-bordered">

                                        <thead>
                                        <tr>
                                            <th>
                                                Group
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Discount
                                            </th>
                                            <th style="width: 20%">
                                                Date start
                                            </th>
                                            <th style="width: 20%">
                                                Date end
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                    <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" >
                                                    <option selected>Group 1</option>
                                                    <option>Group 2</option>
                                                    <option>Group 3</option>
                                                    <option>Group 4</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="10">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="$10.00">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="07/01/2014">
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image preview
                                            </th>
                                            <th>
                                                Image url
                                            </th>
                                            <th>
                                                Sort order
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/2s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image1.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="1">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/1s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image2.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="2">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/3s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image3.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="3">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/4s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image4.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="4">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/5s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image5.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="5">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/6s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image6.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="6">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="img/gallery/7s.jpg">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="http://mydomain.com/images/image7.png">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="7">
                                            </td>
                                            <td>
                                                <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper-content"></div>
@endsection
