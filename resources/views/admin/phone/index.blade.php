@extends('admin.layout.admin')
@section('title', 'Phones')
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
                                                    <th> <img src="{{ Storage::url (str_replace('public', '', $phone->image_url)) }} " alt="" width="125px"> </th>
                                                    <th> <a href="#" data-id="{{ $phone->id }}"
                                                            data-status="{{ $phone->status }}"
                                                            data-toggle="modal"
                                                            data-target="#confirmStatus"
                                                            class="status btn {{ $phone->status == 1 ? 'btn-primary' : 'btn-danger' }} c-white">
                                                            {{ $phone->status == 1 ? 'Hiển thị' : 'Ẩn' }} </a></th>
                                                    <th>
                                                        <a href="{{ route('admin.phone.show', ['phone' => $phone->id]) }}" class="btn btn-warning">EDT</a>
                                                        <a href="#" data-id="{{ $phone->id }}" id="delete" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary">DEL</a>
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

    <div class="modal fade" id="confirmStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn cập nhật lại trạng thái này không
                    <input type="text" value="" id="id-category" class="d-none">
                    <input type="text" value="" id="status-category" class="d-none">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="update-yes">Yes</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xoá sản phẩm này không !
                <input type="text" value="" id="delete-id" class="d-none">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="delete-yes">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).on('click', '.status', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            $('#id-category').val(id);
            $('#status-category').val(status);
        });

        $(document).on('click', '#update-yes', function() {
            var id = $("#id-category").val();
            var status = $("#status-category").val();
            $.ajax({
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/phones/update-status',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'status': status
                },
                success: function(data) {
                    if(data.message == 'success'){
                        alert('Cập nhật trạng thái thành công');
                        location.reload();
                    } 
                }, 
                error: function(){
                    alert('Có lỗi xảy ra vui lòng thử lại');
                }
            })
        });

        $(document).on('click', '#delete', function() {
            var id = $(this).attr('data-id');

            $("#delete-id").val(id);
        });

        $(document).on('click', '#delete-yes', function() {
            var id_yes = $("#delete-id").val();
            $.ajax({
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/phones/delete',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id_yes
                },
                success: function() {
                    alert('Xoá sản phẩm thành công');
                    location.reload();
                }
            })
        });
    </script>
@endsection
