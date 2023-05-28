<!DOCTYPE html> 
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../owlcarousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../owlcarousel/assets/owl.theme.default.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> 
		<script src="../owlcarousel/owl.carousel.js"></script>
		<link href="../styles/style.css" rel="stylesheet" type="text/css">
		<style>
		.highlight{
			height: 270px;
			display: inline-block;
		}
		.highlight img{
			height: 100%;
			width: 100%;
			object-fit: contain;
		}
		</style>
	</head>
	<body>
		<div class="owl-carousel owl-theme">
			<?php
			foreach($id_category as $category){
				if($category->getname_category() == $name_category){
					$id = $category->getid_category();
				}
			}
			
			foreach($productlist as $product){
				if($product->getid_category() == $id && $product->gethighlight_product() == 1){
					echo "
					<div class='item'>
							<form action='detail.php' method='get'>
							<div class='card p-1' style='height: 450px'>
								<a href='detail.php?id_product=".$product->getid_product()."' class='btn' onClick='parentNode.submit();'>
								<div class='highlight'>
								<img src='".$product->getimg_main_product()."' class='card-img-top' alt='image'>
								</div>
                        		</a>
								<div class ='card-body'>
								<div class='card-text'>
								<h5 class='tensp text-left' style='font-size:18px; height:80px'>".$product->getname_product()." </h5>
								<p class='giasp text-right' style='font-size:16px;' >".$product->getunit_price()." VNĐ</p>
								</div>
								</div>
								</div>
							</form>
					</div>";
					}
				}
			?>
		</div>

	<script type="text/javascript">
			$(document).ready(function(){
				 $('.owl-carousel').owlCarousel({
					loop:true,
					margin: 20,
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
				});
			});
		</script>
	</body> 
</html>