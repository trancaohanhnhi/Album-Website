<?php
	if(!empty($products)){
		foreach($products as $product)
			echo "
				<div class='col mb-4 d-flex justify-content-center'>
					<div class='card' style='width: 18rem'>
					<form action='detail.php' method='get'><a href='detail.php?id_product=".$product->getid_product()."' class='btn' onClick='parentNode.submit();'><img class='card-img-top' src=".$product->getimg_main_product()." ></a>
					</form>
						<div class ='card-body'>
							<h5 class='card-title' style='font-size: 17px'>".$product->getname_product()."</h5>
							<div class='text-right'>
								<p class='card-text'>".$product->getunit_price()."VNĐ</p>
							</div>
						</div>
					</div>
				</div>
			";
	}
	else{
		echo "<div class='noresult text-right' style='height: 300px'><h5>Không tìm thấy sản phẩm</h5></div>";
	}
?>
