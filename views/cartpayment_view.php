<?php
	function cartTotal($sum, $shipping, $total_order, $price_detail){
			$element = "					
				</div></div>
				<div class=\"cartRight col-lg-3 bg-transparent\" style=\"padding-top: 30px\">
					<div class=\"cartHeader text-white\"><b><h3>Tóm tắt giỏ hàng</h3></b></div>
					<div class=\"card rounded\" style=\"background-color: aqua width: 100%;\">
						<div class=\"card-body\" style=\"width: 100%;\">
							<div class=\"row\">
								<div class=\"card-title col-7\">Tổng đơn hàng: </div>
								<div class=\"col-5 text-right\">$sum</div>
							</div>
						</div>
						<div class=\"card-body\" style=\"width: 100%;\">	
							<div class=\"row\">
								<div class=\"card-title col-8\">Phí vận chuyển: </div>
								<div class=\"col-4 text-right\">$shipping</div>
							</div>
						</div>
						<div class=\"card-footer bg-transparent\">
							<div class=\"row text-dark\">
								<div class=\"col-7\"><b>Tổng cộng: <br></b></div>
								<div class=\"col-5 text-right\" style='color:coral;'><b>$total_order<br></b></div>
							</div>
						</div>
					</div>
					<br>
					<form action=\"payment.php\" method=\"post\">
						<button type=\"submit bg-transparent\" class=\"cartPayment col-12 border-0 text-white\" style=\"background-color: lightsalmon\" name=\"btCartPayment\"><h5><b>Đặt hàng</b></h5></button>
						<input type=\"hidden\" name=\"shipping\" value=\"$shipping\">
						<input type=\"hidden\" name=\"total_order\" value=\"$total_order\">
					</form>
				</div>
			</div>
			";
			echo $element;
		}
?>