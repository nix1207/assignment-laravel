@extends('admin.layout.admin')

@section('main_content')  
<div class="main_content_iner ">
    @if(session('success')) 
    <h6 class="text-success"> {{ session('success') }} </h6> 
    @elseif(session('error'))
    <h6 class="text-danger"> {{ session('error') }} </h6> 
    @endif
    <div class="container-fluid p-0 sm_padding_15px">
        <form action="{{ route('admin.category.store') }}" method="post"> 
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tên danh mục</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">

                            <div class="form-group mb-0">
                                <input  value="" type="text" class="form-control" name="name" id="slug" placeholder="Nhập tên danh mục...">
                            </div>
                            <br>
                            @if($errors->has('name'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('name') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Mô tả </h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <textarea id="" cols="30" rows="10" name="desc" class="form-control"></textarea>
                            </div>
                            <br>
                            <br>
                            @if($errors->has('desc'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('desc') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
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
                
            </div>

            <a href="">
                <button type="button" class="btn mb-3 btn-danger"><i class="ti-heart f_s_14 mr-2"></i>Quay lại</button>
            </a>

            <button type="submit" class="btn mb-3 btn-success"><i class="ti-heart f_s_14 mr-2"></i>Submit</button>
        </form>

    </div>
</div>
@endsection