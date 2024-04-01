@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">
                <div id="carouselExampleBigIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active p-xl">
                            <img class="d-block w-75 m-auto" src={{asset('public/backend/img/dashboard_welcome.jpg')}} alt="First slide">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection