@extends('admin.layout.index')
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="post" />{{csrf_field()}}
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                @foreach($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                @foreach($loaitin as $lt)
                                    <option id="tenloaitin" value="{{$lt->id}}">{{$lt->Ten}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <textarea id="demo" class="form-control ckeditor" name="TieuDe" placeholder="Vui lòng nhập tiêu đề" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo" class="form-control ckeditor" name="TomTat" placeholder="Vui lòng nhập tóm tắt" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung" placeholder="Vui lòng nhập nội dung" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="Hinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input type="radio" name="NoiBat" value="1">Có
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="NoiBat" value="0">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    // $("#LoaiTin").html(data);
                    // }
                    var toAppend = '';
                    console.log(data);
                    $.each(data.loaitin,function(index,loai){
                    toAppend += '<option value="' + loai.id +'">'+ loai.Ten +'</option>';
                    });
                    $('#LoaiTin').html(toAppend);
                });
                
            });
        });
    </script>
@endsection