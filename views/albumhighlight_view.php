<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="../owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="../owlcarousel/assets/owl.theme.default.min.css">
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
	<script src="../owlcarousel/owl.carousel.min.js"></script>
	<link href="../styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="carousel">
		<?php
		$active = true;
		foreach($id_category as $category){
			if($category->getname_category() == $name_category){
				$id = $category->getid_category();
				$active = false;
			}
		}
		$active = true;
		foreach($productlist as $product){
			if($product->getid_category() == $id && $product->gethighlight_product() == 1){
				echo "
				<div class='carousel-item " . ($active ? 'active' : '') . "'>
					<div class='row'>
						<div class='col-lg-7 col-md-12 col-sm-12 col-12 d-flex justify-content-center'>
						<form action='detail.php' method='get'><a href='detail.php?id_product=".$product->getid_product()."' class='btn' onClick='parentNode.submit();'>
							<img class='hinh album' src='".$product->getimg_main_product()."' alt='hinh album' style='width: 400px; display: block; margin: auto'></a>
						</form>
						</div>
						<div class='col-lg-4 text-black align-self-center'>
							<h2 class = 'nameproduct text-center'>".$product->getname_product()."</h2>			
						</div>
					</div>
				</div>";
		$active = false;
			}
		}
		?>
	</div>
</body> 
</html>