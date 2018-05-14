    @extends('layout.index')
    @section('slide')
    @include('layout.slide');
    @endsection
    @section('content')

    <div id="fh5co-course">
    	<div class="container">
    		<div class="row animate-box" style="border: 1px solid #dddddd;">
    			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading" >
    				<h1 style="color: #6985DF;">Khóa học miễn phí</h1>
    				<h2>Giáo dục là vũ khí mạnh nhất mà người ta có thể sử dụng để thay đổi cả thế giới.</h2>
    			</div>
    		</div>
    		<div class="row" style="margin: 0px; ">
    			@foreach($khoahoc as $k)
                @if($k->loai=="0")
    			<div class="col-md-6 animate-box" style="height: 600px; border: 1px solid #dddddd;">
    				<div class="course">
                        <a>
                           <img height="350px" style="padding-top: 10px;" width="550px" src="upload/khoahoc/{{$k->Hinh}}">
                       </a>
                   </div>
                   <div class="">
                      <h3><a href="#">{{$k->name}}</a></h3>
                      <p>{{$k->gioithieu}}</p>
                      <span><a href="monhoc/{{$k->id}}" class="btn btn-primary btn-sm btn-course">Xem chi tiết</a></span>
                  </div>
              </div>
                @endif
              @endforeach
          </div>
      </div>
  </div>
  <div id="fh5co-course">
    <div class="container">
        <div class="row animate-box" style="border: 1px solid #dddddd;">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading" >
                <h1 style="color: #6985DF;">Khóa học mất phí</h1>
                <h2>Học vấn do người siêng năng đạt được, tài sản do người tinh tế sở hữu, quyền lợi do người dũng cảm nắm giữ, thiên đường do người lương thiện xây dựng.</h2>
            </div>
        </div>
        <div class="row" style="margin: 0px; ">
            @foreach($khoahoc as $k)
            @if($k->loai=="1")
            <div class="col-md-6 animate-box" style="height: 600px; border: 1px solid #dddddd;">
                <div class="course">
                    <a>
                       <img height="350px" style="padding-top: 10px;" width="550px" src="upload/khoahoc/{{$k->Hinh}}">
                   </a>
               </div>
               <div class="">
                  <h3><a href="#">{{$k->name}}</a></h3>
                  <p>{{$k->gioithieu}}</p>
                  <span><a href="monhoc/{{$k->id}}" class="btn btn-primary btn-sm btn-course">Xem chi tiết</a></span>
              </div>
          </div>
          @endif
          @endforeach
      </div>
  </div>
</div>
@endsection