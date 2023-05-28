<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thông tin nhận hàng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link href="../styles/style.css" rel="stylesheet" type="text/css">
	
	<style>
	@media(max-width: 768px){
		.labelpayment{
			display: none;
		}
	}
	</style>
</head>

<body>
	<?php session_start(); ?>
	<div class="container-fluid">

<!--Header-->
	<div class="row">
		<div class="header col-lg-12">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/8059/8059485.png" alt="Logo của ALBUMGR" width="40"></a>
				
<!--Thu nhỏ màn hình hiện button menu-->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"><img src="https://cdn-icons-png.flaticon.com/512/10080/10080458.png" width="30"></span>
				</button>
				
<!--Nội dung trong header-->				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Trang chủ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Thông báo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Thông điệp</a>
						</li>
					</ul>
					
<!--Giỏ hàng, tìm kiếm-->
					<div class="row">
					  <div class="col-lg-2 col-2">

					<!--Giỏ hàng-->
						<ul class="navbar-nav b col-2">
							<li class="nav-item">
								<a href="cart.php" class="nav-link"><img src="https://cdn-icons-png.flaticon.com/512/4903/4903482.png" width="30" class="rounded" style="vertical-align: middle">
									<?php
										if (isset($_SESSION['cart'])){
											$count = count($_SESSION['cart']);
											echo "<span id=\"cart_count\" class=\"text-warning\"><b><sup>$count</sup></b></span>";
										}else{
											echo "<span id=\"cart_count\" class=\"text-warning\"><b><sup>0</sup></b></span>";
										}
									 ?>
								</a>
							</li>
						</ul>
						</div>
						<div class="col-lg-10 col-10">
					
							<!--Tìm kiếm -->	
						<form class="form-inline" action="search.php" method="get">							
							<input class="form-control col-8" type="search" name="tim_kiem" placeholder="" aria-label="Search">
							<button id="searchclick" class="btn btn-outline-none col-2" type="submit"><img src="https://cdn-icons-png.flaticon.com/512/751/751463.png" width="25"></button>
						</form>
						</div>
					</div>
				</div>
			</nav>
		</div>
<!--			Danh mục sản phẩm-->
		<div class="category col-lg-12"><hr style="width:100%; margin-top: 0; margin-bottom: 0">			
			<nav class="navbar navbar-expand-lg">		
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-lg-auto">
						<li class="nav-item mr-5"> <a  id = "albumclick" class="nav-link" href="categoryAblum.php">Album</a> </li>
						<li class="nav-item mr-5"> <a id = "lightstickclick" class="nav-link" href="categoryLightstick.php">Lightstick</a> </li>
						<li class="nav-item mr-5">
							<a id = "phukienclick" class="nav-link" href="categoryPhukien.php">Phụ kiện</a>
						</li>
					</ul>
				</div>
			</nav>
		<hr style="width:100%; margin-top: 0; margin-bottom: 0">
		</div>
	</div> 
<!--End Header-->
	
	
	<!--THÔNG TIN NHẬN HÀNG	CỦA KHÁCH HÀNG-->
		<form action="payment.php" method="post">
			<div class="row" style="padding-left: 50px; padding-right: 50px">
				<div class="paidInformation text-white p-lg-3 row"><h2><b>Thông tin nhận hàng</b></h2></div>
				<div class="card col-lg-12">
					<div class="card-body rounded">
						<div class="row d-flex justify-content-center">
							<label for="Name" class="Name col-lg-3 col-12">Tên khách hàng: </label>
							<input type="text" class="Name col-lg-9 col-11 border border-dark" name="name_customer"  pattern="[\p{L}\s]+" required>
						</div>
						<div class="row mt-4 d-flex justify-content-center">
							<label for="Email" class="Email col-lg-3 col-12">Email: </label>
							<input type="email" class="Email col-lg-9 col-11 border border-dark" name="email_customer" required>
						</div>
						<div class="row mt-4 d-flex justify-content-center">
							<label for="Phone" class="Phone col-lg-3 col-12">Số điện thoại: </label>
							<input type="tel" class="Phone col-lg-9 col-11 border border-dark" name="phone_customer" pattern="[0-9]+" maxlength="11" required>
						</div>
						<div class="row mt-4 d-flex justify-content-center">
							<label for="Address" class="Address col-lg-3 col-12">Địa chỉ: </label>
							<input type="text" class="Phone col-lg-9 col-11 border border-dark" name="address_customer" required>
						</div>
						<div class="row mt-4 d-flex justify-content-center">
							<label for="PaymentMethod" class="PaymentMethod col-lg-3 col-12">Phương thức thanh toán: </label>
							<div class="col-lg-9 col-12">
								<div>
									<input type="radio" id="cart" name="PaymentMethod" value="cart" checked>
									<label for="cart">Thanh toán khi nhận hàng</label>
								</div>
								<div>
									<input type="radio" id="digitalwallet" name="PaymentMethod" value="digitalwallet">
									<label for="digitalwallet">
										Ví điện tử
										<a href="#" class="text-secondary">(Xem thêm)</a>
									</label>
								</div>
								<div>
									<input type="radio" id="bank" name="PaymentMethod" value="bank">
									<label for="bank">
										Ngân hàng
										<a href="#" class="text-secondary">(Xem thêm)</a>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		<!--THÔNG TIN ĐƠN HÀNG-->			
			<div class="row" style="padding-top: 30px; padding-bottom: 20px; padding-left: 50px; padding-right: 50px">
				<div class="SaleOrder col-lg-12 text-white"><h2><b>Đơn hàng</b></h2></div>
				<a href="cart.php" class="col-lg-12 text-right"  style="font-size: 18px">Sửa</a>
				
				<div class="card col-lg-12">
					<div class="card-header bg-transparent border-0">
						<div class="row">
							<div class="labelsp col-lg-5 col-6 text-dark"><h5>Sản phẩm</h5></div>
							<div class="labelpayment col-lg-2 text-center"><font color="#CBCBCB"><h5>Đơn giá</h5></font></div>
							<div class="labelpayment col-lg-2 text-center"><font color="#CBCBCB"><h5>Số lượng</h5></font></div>
							<div class="labelpayment col-lg-3 col-6 text-right" ><font color="#CBCBCB"><p>Thành tiền</p></font></div>
						</div>
					</div>
	
			<?php
				require_once($_SERVER['DOCUMENT_ROOT']."/controllers/payment_controller.php");
				$controller = new cartcontroller();
				$controller -> cartPayment();
			?>
			<?php
				require_once($_SERVER['DOCUMENT_ROOT']."/controllers/payment_controller.php");
				$controller = new cartcontroller();
				$controller -> clickbtaddPaymentInfo();
			?>		
			</form>
				
<!--Footer-->
 	<div class="footer col-lg-12">
		<div class="row">
		<hr style="width: 100%; margin-bottom: 0;">
<!--Lớp "d-none" sẽ ẩn phần tử trên mọi kích thước màn hình, còn "d-lg-block" sẽ hiển thị phần tử trở lại trên màn hình lớn hơn kích thước "lg" (large). -->
			<div class="logo col-lg-2 d-none d-lg-block"><img src="https://cdn-icons-png.flaticon.com/512/8059/8059485.png" alt="Logo của ALBUMGR" width="50" class="m-5"></div>
<!--Liên hệ tư vấn-->			
			<div class="lienhe col-lg-3"><p></p>

				<p><b>Liên hệ tư vấn</b></p>
				<hr  width="100%" size="1px" align="center" color="white" />						
					<ul>		
						<li style="list-style-type: none"><img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="mail" width="25" style="margin-right: 15px">
							<a style="font-size: 12px" href="views/tuvanalbumgr@gmail.com">tuvanalbumgr@gmail.com</a>
						</li>
						<li style="list-style-type: none"><img src="https://cdn-icons-png.flaticon.com/512/3247/3247310.png" alt="call" width="25" style="margin-right: 20px">	<span style="font-size: 12px">0234545451</span></li>
					</ul>
			</div>
<!--Chính sách và điều khoản-->
			<div class=" csdk col-lg-3"><p></p>
				<p><b>Chính sách và điều khoản</b></p>
				<hr  width="100%" size="1px" align="center" color="white" />
				<ul>
					<li style="list-style-type: none"><a style="font-size: 12px" href="#">Điều khoản dịch vụ</a></li>
					<li style="list-style-type: none"><a style="font-size: 12px" href="#">Điều khoản thanh toán</a></li>
					<li style="list-style-type: none"><a style="font-size: 12px" href="#">Chính sách bảo mật</a></li>
					<li style="list-style-type: none"><a style="font-size: 12px" href="#">Chính sách hoàn trả</a></li>
					<li style="list-style-type: none"><a style="font-size: 12px" href="#">Chính sách vận chuyển</a></li>
				</ul>
			</div>
<!--Thông tin công ty-->
			<div class="col-lg-4"><p></p>
				<p><b>CÔNG TY TNHH ALBUMGR</b></p>
				<hr  width="100%" size="1px" align="center" color="white" />						
				<ul>
					<li style="font-size: 12px; list-style-type: none">Địa chỉ: 123 Đường ABC, Quận XYZ, TP.HCM</li>	
					<li style="list-style-type: none; font-size: 12px">Email: <a href="views/albumgr@gmail.com">albumgr@gmail.com</a></li>
					<p></p>							
					<b><li style="list-style-type: none; font-size: 15px">Social Media</li></b>
					<br><li style="list-style-type: none">
							<a href="#"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="fb" width="25" height="25" style="margin-right: 10px"></a>
							<a href="#"><img src="https://cdn-icons-png.flaticon.com/512/3046/3046121.png" alt="tiktok" width="25" height="25" style="margin-right: 10px"></a>
							<a href="#"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="insta" width="30" height="30"></a>
						</li>
				</ul>
			</div>
		</div>
	</div>
<!--End Footer-->
</div>
</body>
</html>