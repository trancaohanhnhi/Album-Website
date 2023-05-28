<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="../owlcarousel/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> 
	<script src="../owlcarousel/owl.carousel.min.js"></script>
<title>Untitled Document</title>
	<style>
		.owl-prev {
    position: absolute;
    top: 50%;
	left: 0px;
    transform: translateY(-50%);
    width: 40px; 
    height: 30%; 
    background-color: #ccc; 
}

.owl-next {
    position: absolute;
    top: 50%;
	right: 0px;
    transform: translateY(-50%);
    width: 40px; 
    height: 30%; 
    background-color: #ccc; 
}

.owl-prev span,
.owl-next span {
    font-size: 35px;
    color: #000;
}
.owl-prev:hover span,
.owl-next:hover span {
    color: #ff0000;
}
	.anhsp{
height:270px;
    display: inline-block;
}

.anhsp img{
  width: 100%;
  height: 100%;
  object-fit: contain;

}

	</style>
</head>
<body>
	
	<div class="owl-carousel owl-theme">
<?php 

// Duyệt qua mảng $data và tạo HTML cho từng phần tử
foreach ($other_product as $product) 
	echo" <div class='item'>
	<form action='detail.php' method='get'>
      <div class='card p-1' style='height:450px'>
	  		  <a href='detail.php?id_product=".$product->getid_product()."' class='btn' onClick='parentNode.submit();'>
	  <div class='anhsp'>
	  <img src='".$product->getimg_main_product()."' class='card-img-top' alt='image'> 
	  </div>
	   </a>
        <div class='card-body'>
          <div class='card-text'>
		 <p class='tensp text-left' style='font-size:18px; height:80px'>".$product->getname_product()." </p>
		  <p class='giasp text-right' style='font-size:20px;' >".$product->getunit_price()." VNĐ</p>
         </div>
         </div>
      </div> 
	  </form>
    </div>
  ";
 ?>
		
		</div>
	<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    loop:false,
    margin:20,
    nav:true,
	dots:false,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
	</script>	
	</body>
</html>
 