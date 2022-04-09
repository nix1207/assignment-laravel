@extends('admin.layout.admin')
@section('title', 'Chỉnh sửa sản phẩm')
@section('main_content')  
<div class="main_content_iner ">
    @if(session('success')) 
    <h6 class="text-success"> {{ session('success') }} </h6> 
    @elseif(session('error'))
    <h6 class="text-danger"> {{ session('error') }} </h6> 
    @endif
    <div class="container-fluid p-0 sm_padding_15px">
        <form action="{{ route('admin.phone.update', ['phone' => $phone->id]) }}" method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Tên sản phẩm</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <input  value="{{ $phone->name }}" type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm...">
                            </div>
                            <br>
                            @if($errors->has('name'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('name') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Giá sản phẩm</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <input value=" {{ $phone->price }} " type="text" class="form-control" name="price" id="slug" placeholder="Nhập giá sản phẩm...">
                            </div>
                            <br>
                            @if($errors->has('price'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('price') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Hình ảnh</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <input  value="" type="file" class="form-control" name="image_url" id="imgInp" placeholder="">
                                <img style="margin: 10px" id="blah" class="" src="{{ Storage::url( $phone->image_url ) }}" alt="your image"
                                width="125px" />
                            </div>
                            <br>
                            @if($errors->has('image_url'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('image_url') }}</code></h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Chọn danh mục</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $phone->category_id ? 'selected' : '' }}> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
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
                                <input value="on" {{ $phone->status == 1 ? 'checked' : '' }} type="checkbox" class="form-control" name="status" id="inputEmail" >
                            </div> 
                        </div>
                    </div>
                </div>       

                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Mô tả</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="form-group mb-0">
                                <textarea id="maxlength-textarea" cols="30" rows="10" name="desc" class="form-control"> {{ $phone->desc }} </textarea>
                            </div>
                            <br>
                            <br>
                            @if($errors->has('desc'))
                                <h6 class="card-subtitle mb-2 mb-2"><code>{{ $errors->first('desc') }}</code></h6>
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

@section('js') 
<script>
     imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                // $("#blah").removeClass('d-none')
                blah.src = URL.createObjectURL(file)
            }
        }

        CKEDITOR.replace('maxlength-textarea', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
        
</script>
@endsection