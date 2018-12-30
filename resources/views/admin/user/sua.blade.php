@extends('admin.layout.index')
@if(session('thongbao'))
{
    <div class="alert alert-success">{{session('thongbao')}}</div>
}
@endif
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
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

                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="post" /> {{csrf_field()}}
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" type="password" name="password", placeholder="Vui lòng nhập mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control" type="password" name="passwordAgain", placeholder="Vui lòng nhập lại mật khẩu">
                            </div>
                            
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio">Người dùng
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
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