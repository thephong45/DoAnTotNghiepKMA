<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Học Viện Kỹ Thuật Mật Mã</title>
        <link rel="shortcut icon" href="{{ asset('ico/logo-mat-ma.ico') }}" type="image/gif" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"/>
        <!-- Customize styles -->
        <link href="{{ asset('style.css') }}" rel="stylesheet"/>
        <!-- font awesome styles -->
        <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('ico/logo-mat-ma.ico') }}" >
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

        <!-- Styles -->

    </head>
    <body>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
        {{-- </div> --}}



        <!--
	Upper Header Section
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
                <div class="hcm" style="float:left">
                    <a target="_blank" href="http://actvn.edu.vn/" style="font-size:28px"><span><font color="#CC0000">KMA</font><font color="#000099">-HCM</font></span></a>
                </div>
                @guest
                    <a href="{{ route('login') }}" style="font-size:14px">Đăng Nhập </a>
{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}" style="font-size:14px">Đăng Ký </a>--}}
{{--                    @endif--}}
                @else
                    <a href="{{ route('showAll') }}">Xin chào:  <strong>{{ Auth::user()->name }}</strong></a>

                @endguest






			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<img src="{{ asset('img/hoc-vien-mat-ma.jpg') }}" alt="Học viện mật mã" height="144">
</header>

<!--
Navigation Bar Section
-->
<div class="container">
	  <div id="menu">
			<ul class="nav">
			  <li><a href="#home"> &nbsp;TRANG CHỦ	</a></li>
			  <li><a href="#">GIỚI THIỆU</a></li>
			  <li><a href="#">TIN TỨC</a></li>
                <li><a href="#">PHÒNG BAN</a></li>
			  <li><a href="admin/loginhs.php">XEM ĐIỂM</a></li>
			  <li><a href="#">KẾ HOẠCH</a></li>
              <li><a href="#">LIÊN HỆ</a></li>
			</ul>
	  </div>
</div>

<div class="container">
	<div class="row">
	<div class="span9">
	<div class="well np">
     <div class="thongbao" style="float:right">

      <ul class="nav1">
      <div class="thongtin">THÔNG BÁO MỚI</div>
              <marquee behavior="scroll" direction="up" width="250px" height="310px" scrollamount="4" onMouseOver="this.stop()" onMouseOut="this.start()">
                  <span id="menu2_lbCreeping"><br><a target="_blank" href="#">Khoa ATTT thông báo về việc quản lý thực tập tốt nghiệp và đồ án sinh viên khoá AT13</a><br></span>
                  <span id="menu2_lbCreeping"><br><a target="_blank" href="#">Học viện Kỹ thuật mật mã đón nhận Huân chương Bảo vệ Tổ quốc hạng Nhì</a><br></span>
                  <span id="menu2_lbCreeping"><br><a target="_blank" href="#">ACTVN cùng ngày hội tư vấn tuyển sinh – hướng nghiệp năm 2021</a><br></span>
                  <span id="menu2_lbCreeping"><br><a target="_blank" href="#">Thông báo lịch thi tuyển sinh thạc sĩ chuyên ngành an toàn thông tin năm 2015</a><br></span>
                  <span><br><a target="_blank" href="#">Cơ hội học tập tại nước ngoài của sinh viên Học viện Kỹ thuật mật mã</a><br></span>

              </marquee>
      </ul>

      </div>
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
			  <div class="item">
                <img style="width:100%" src="{{ asset('img/hcldh2.jpg') }}" alt="bootstrap ecommerce templates">
              </div>

			  <div class="item">
                <img style="width:100%" src="{{ asset('img/mco2022.jpg') }}" alt="bootstrap ecommerce templates">

              </div>
			  <div class="item active">
                <img style="width:100%" src="{{ asset('img/imgp0877.jpg') }}" alt="bootstrap ecommerce templates">

              </div>
              <div class="item">
                <img style="width:100%" src="{{ asset('img/slide-gl1.jpg') }}" alt="bootstrap templates">

              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
        </div>


	<div class="well well-small" style="float:left;width:645px">
        <div class="well well-small" style=" height: 350px">
            <div class="well well-small" style="font-weight: bold;background: #C00;color:#f1f1f1; margin-top: -20px;margin-left: -20px;margin-right: -20px">
                <a href="#" style="text-decoration: none;color:#f1f1f1 ">TIN TỨC VÀ SỰ KIỆN</a></div>
            <div class="well well-small" style=" float:left;width: 350px;height: 310px;margin-top: -20px;margin-left: -20px;margin-bottom: -20px">
                <img src="{{ asset('img/ngattt.jpg') }}" style="width: 340px">
                <br/>
                <a href="#" style="text-decoration: none;color:#0A5BC4;font-weight: bold">Chuyên ngành an toàn thông tin cơ hội và việc làm tại phân hiệu Học viện Kỹ thuật mật mã tại TP. Hồ Chí Minh </a>
            </div>
            <div class="well well -small" style="width: 235px;float: right;height: 290px;margin-top: -20px;margin-right: -10px;margin-bottom: -20px">
                <div class="well well-small" style="height: 100px;margin-top: -20px;margin-right: -20px;margin-bottom: -20px;margin-left: -20px">
                    <img src="{{ asset('img/phia-nam.jpg') }}" style="width: 100px;height: 80px">
                    <a href="#" style="text-decoration: none;color:#0A5BC4;font-weight: bold">Giao lưu thể thao</a>
                </div>
                <div class="well well-small" style="height: 100px;margin-top: -20px;margin-right: -20px;margin-bottom: -20px;margin-left: -20px">
                    <img src="{{ asset('img/ts211.jpg') }}" style="width: 100px;height: 80px">
                    <a href="#" style="text-decoration: none;color:#0A5BC4;font-weight: bold">Ước mơ nghề nghiệp</a>

                </div>
                <div class="well well-small" style="height: 100px;margin-top: -20px;margin-right: -20px;margin-bottom: -20px;margin-left: -20px">
                    <img src="{{ asset('img/16885565640434155356784782242997079799439891n.jpg') }}" style="width: 100px;height: 80px">
                    <a href="#" style="text-decoration: none;color:#0A5BC4;font-weight: bold">Thông tin tuyển sinh</a>
                </div>
            </div>
        </div>
    </div>



    <div class="well well-small" style="float:right;height:390px;width:245px">

        <div class="well well-small" style="font-weight: bold;background: #C00;color:#f1f1f1; margin-top: -10px;margin-left: -10px;margin-right: -10px">
            <center><a href="#" style="text-decoration: none;color:#f1f1f1">BẢN ĐỒ VỊ TRÍ</a></div></center>
        <div class="well well-small" style="margin-top: -10px;margin-left: -10px;margin-right: -10px" >
            <img src="{{ asset('img/ban-do.png') }}">
            Địa Chỉ:<br/>
            Số 17A Cộng Hòa, Phường 4, Quận Tân Bình, Thành phố Hồ Chí Minh
        </div>
	</div>
	</div>
	</div>
    </div>


<!--
Footer
-->
<div class="footer">
    <div class="LogoBotoom" style='border-right: 5px; height:100px; width:100px; margin: 20px 100px 5px 20px; float:left'><img src="{{asset('ico/logo-mat-ma.ico')}}" alt=" " /> </div>
    <div class="containe" style="float:none; margin-left: 75px;">
        <br>
        <p><span><b>Học viện kỹ thuật mật mã - Cơ sở phía nam</b><br></span></p>
        <p><span><b>Địa Chỉ: Số 17A Cộng Hòa, Phường 4, Quận Tân Bình, Thành phố Hồ Chí Minh</b><br></span></p>
        <p><span><b>Điện thoại (028).6293.9206</b><br></span></p>
    </div>
</div>

</div><!-- /container -->



<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>

    <body onload="time()"></body>
    <script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>

   	<script src="{{ asset('js/dongho.js') }}"></script>
   	<script src="{{ asset('jquery-3.1.1.js') }}"></script>


    </body>
</html>
