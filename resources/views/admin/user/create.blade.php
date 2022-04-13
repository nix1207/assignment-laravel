@extends('admin.layout.admin')
@section('title', 'Tạo mới thành viên')
@section('main_content')  
<div class="main_content_iner ">
    @if(session('success')) 
    <h6 class="text-success"> {{ session('success') }} </h6> 
    @elseif(session('error'))
    <h6 class="text-danger"> {{ session('error') }} </h6> 
    @endif
    <div class="container-fluid p-0 sm_padding_15px">
        <form action="{{ route('admin.user.store') }}" method="post"> 
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Họ và tên</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="form-group mb-0">
                                <input  value="" type="text" class="form-control" name="name" id="slug" placeholder="Nhập họ và tên">
                            </div>
                            <br>
                            @if($errors->has('name'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('name') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Email</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="form-group mb-0">
                                <input  value="" type="text" class="form-control" name="email" id="slug" placeholder="Nhập email">
                            </div>
                            <br>
                            @if($errors->has('email'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('email') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Ngày sinh</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="form-group mb-0">
                                <div class="input-group common_date_picker">
                                    <input value="" autocomplete="off"
                                           class="datepicker-here  digits"
                                           placeholder="Ngày sinh" name="birthday" type="text"
                                           data-language="en">
                                </div>
                            </div>
                            <br>
                            @if($errors->has('birthday'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('birthday') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Trạng thái</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <input value="on"  type="checkbox" class="form-control" name="status" id="inputEmail" >
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Mật khẩu</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="form-group mb-0">
                                <input  value="" type="password" class="form-control" name="password" id="slug" placeholder="Nhập mật khẩu">
                            </div>
                            <br>
                            @if($errors->has('birthday'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('birthday') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>

            <a href="">
                <button type="button" class="btn mb-3 btn-danger"><i class="ti-heart f_s_14 mr-2"></i>Quay lại</button>
            </a>

            <button type="submit" class="btn mb-3 btn-success"><i class="ti-heart f_s_14 mr-2"></i>Submit</button>
        </form>

    </div>
</div>
@endsection