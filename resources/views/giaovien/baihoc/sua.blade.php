        
@extends('giaovien.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài giảng
                    <small>{{$baihoc->title}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
                @endif
                <form action="giaovien/baihoc/sua/{{$baihoc->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Khóa học</label>
                        <select class="form-control" name="Khoahoc" id="Khoahoc">
                            @foreach($khoahoc as $kh)
                            <option 
                            @if($baihoc->monhoc->khoahoc->id == $kh->id)
                            {{'selected'}} 
                            @endif 
                            value="{{$kh->id}}">{{$kh->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Môn học</label>
                    <select class="form-control" name="monhoc_id" id="Monhoc">
                        @foreach($monhoc as $mh)
                        <option 
                        @if($baihoc->monhoc->id == $mh->id)
                        {{'selected'}} 
                        @endif
                        value="{{$mh->id}}">{{$mh->name}}
                    </option>
                    @endforeach
                </select>
            </div>
                    <div class="form-group">
                        <label>Giảng viên</label>
                        <input readonly="" class="form-control" value="{{Auth::user()->name}}" />
                    </div>
        <div class="form-group">
            <label>Tiêu đề</label>
            <input required="" class="form-control" name="title" placeholder="Nhập tiêu đề" value="{{$baihoc->title}}" />
        </div>
        <div class="form-group">
            <label>Tóm tắt</label>
            <textarea required="" name="description" id="demo" class="form-control ckeditor" rows="3">{{$baihoc->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea required="" name="content" id="demo" class="form-control ckeditor" rows="5">{{$baihoc->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <p>
                <img width="400px" src="upload/baihoc/{{$baihoc->Hinh}}">
            </p>
            <input type="file" name="Hinh" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Sửa</button>
        <button type="reset" class="btn btn-default">Reset</button>
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
        <script type="text/javascript">
            $(document).ready(function(){
                $("#Khoahoc").change(function(){
                    var idKhoahoc = $(this).val();
                        //alert(idTheLoai);
                        $.get("admin/ajax/monhoc/"+idKhoahoc,function(data){
                            $("#Monhoc").html(data);
                        });
                    });
            });
        </script>
@endsection