@extends('admin.layout.admin')
@section('title' , 'Phones')
@section('main_content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h3 class="m-0">Quản lí sản phẩm</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Sản phẩm</h4>
                                    <div class="box_right d-flex lms_block">
                                        <div class="serach_field_2">
                                            <div class="search_inner">
                                                <form Active="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search content here...">
                                                    </div>
                                                    <button type="submit"><i class="ti-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="add_button ml-10">
                                            <a href="{{ route('admin.create.phone') }}" data-target="#addcategory"
                                                class="btn_1">Thêm mới</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($phones as $phone)
                                                <tr>
                                                    <th> {{ $phone->id }} </th>
                                                    <th> {{ $phone->name }} </th>
                                                    <th> {{ $phone->category->name }} </th>
                                                    <th> {{ $phone->price }} $ </th>
                                                    <th> <img src=" {{ $phone->image_url }} " alt="" width="125px"> </th>
                                                    <th> <a href=""
                                                            class="btn {{ $phone->status == 1 ? 'btn-primary' : 'btn-danger' }} c-white">
                                                            {{ $phone->status == 1 ? 'Hiển thị' : 'Ẩn' }} </a></th>
                                                    <th>
                                                        <a href="" class="btn btn-warning">EDT</a>
                                                        <a href="" class="btn btn-secondary">DEL</a>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>
@endsection
