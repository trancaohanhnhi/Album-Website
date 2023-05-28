<?php
	function paymentCartItem($img_main_product, $name_product, $unit_price, $quantity_order, $price_detail){
				$element = " 
					<div class=\"card-text text-dark rounded pt-3\">
						<div class=\"row\">
							<div class=\"col-lg-2 col-5\">
								<img src=\"$img_main_product\" class=\" img-fluid\">
							</div>
							<div class=\"col-lg-10 col-7\">
							<div class=\"row\">
							<div class=\"col-lg-4 col-12 pt-lg-5 pt-0\">$name_product</div>
							<div class=\"row col-lg-4\">
								<div class=\"col-lg-6 col-8 pt-lg-5 pt-0 text-left text-lg-center\">$unit_price</div>
								<div class=\"col-lg-6 col-4 pt-lg-5 pt-0 text-right text-lg-right\">x$quantity_order</div>
							</div>
							<div class=\"col-lg-4 text-right pt-lg-5 pt-0\">$price_detail</div>
							</div>
							</div>
						</div>
					</div>
			";
		echo $element;
	}
?>

<?php 
		function paymentCart($shipping, $total_order){	
			$element = " <hr style=\"border-style: dashed\">
					<div class=\"row d-flex justify-content-end\" style=\"padding-bottom: 20px\">
						<div class=\"col-lg-1 col-2\">
							<img src=\"https://traungonquan.vn/wp-content/uploads/2019/03/promo-icon-9.png\"class='img-fluid' width='30px'>
						</div>
						<div class=\"col-lg-2 col-10 text-dark\">Mã giảm giá: </div>
						<div class=\"col-lg-3 col-12 text-right\">
							<a href=\"#\" class=\"text-dark\">Chọn hoặc nhập mã > </a>
						</div>
					</div>
					<div class=\"card-footer text-dark\" style=\"padding-top: 30px; background-color:lavender\">
						<div class=\"row \">
							<div class=\"row col-lg-4 col-12\">
								<div class='col-lg-4'><label for=\"note\">Ghi chú: </label></div>
								<div class='col-lg-8'><textarea id=\"note\" name=\"note_customer\" style='height:100px; width:240px;'>
								</textarea></div>
							</div>
							<div class=\"col-lg-3 col-12 text-left text-lg-center\">Đơn vị vận chuyển: </div>
							<div class=\"col-lg-3 col-12\">
								Giao hàng tiết kiệm
								<br><font size=\"-1\" color=\"#A5A5A5\">Dự kiến nhận hàng vào 12 Th06</font>
							</div>
							<div class=\"col-lg-2 col-12 text-right\">$shipping</div>
						</div>
						<hr style=\"border-style: dashed\">
						<div class=\"row d-flex justify-content-end text-dark\">
							<div class=\"col-lg-2 col-6\"><b>Tổng tiền: </b></div>
							<div class=\"col-lg-3 col-6 text-right\"><b><font size=\"+1\" color=\"#FF6944\">$total_order</font></b></div>
						</div>
						</div>
					</div>
				</div>
				<!--Button Thanh toán -->	
				<div class=\"row d-flex justify-content-end\" style=\"padding-top: 5px\">
					<div class=\"col-lg-2 col-7	\">
						<button class=\"border-0 rounded text-white\" type=\"submit\" name=\"btaddPaymentInfo\" style=\"width: 175px; height: 50px; background-color: coral\"><font size=\"+1\"><b>Thanh toán</b></font></button>
						<input type=\"hidden\" name=\"total_order\" value=\"$total_order\">
					</div>
				</div>
			";
			echo $element;
		}
?>
