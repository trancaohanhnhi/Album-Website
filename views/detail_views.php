<?php 
echo"
<script>
	$(document).ready(function(){

var DefaultQty=1;
   $('.quantity-right-plus').click(function(e){
        e.preventDefault(); // ngăn nút nhảy trang
        var quantity = parseInt($('#quantity').val()); //lấy giá trị tại id=quantity
		if(quantity<".$product->getstock_quantity()."){
            $('#quantity').val(quantity + 1);
			}
    });
		
     $('.quantity-left-minus').click(function(e){  
        e.preventDefault();  
        var quantity = parseInt($('#quantity').val());
          if(quantity>1){
            $('#quantity').val(quantity - 1);
            }
    });   
});
	</script>
  <div class='row text-center text-white mx-md-4 pt-md-3'>
    <div class='ProductInfo col-lg-5'>
      <div class='ImageP '> <img src='".$product->getimg_main_product()."' alt='image'> </div>
      <div class='ProductQuantity' style='padding: 15px;'>
	  <form action='cart.php' method='post'>
        <div class='Quantity d-flex justify-content-center'> 
          <button type='button' class='quantity-left-minus btn btn-number text-white col-2'  data-type='minus' data-field=''>
          <h5>-</h5>
          </button>
          <input type='text' id='quantity' name='quantity' class='form-control input-number text-center col-2' value='1' min='1' max='100' readonly>
          <button type='button' class='quantity-right-plus btn btn-number text-white col-2'  data-type='plus' data-field=''>
          <h5>+</h5>
          </button>
        </div>
        <div class='AddToCart d-flex justify-content-around'>
          <button type='submit' class='btn col-6 btn-outline-light' name='btaddItemCart' style=' font-family: monospace;'>Thêm vào giỏ hàng</button>
		  <input type='hidden' name='id_product' value='".$product->getid_product()."'>
        </div>
      </div>
	  </form>
    </div>
    <div class='ProductDetail col-lg-7 pl-5 pr-3'>
      <div class='ProductName row text-left' style=' font-family: monospace;'>
        <h1>".$product ->getname_product()."</h1>
      </div>
      <div class='ProductPrice row 'style=' font-family: monospace;'>
         <h3 class='p-3'> Giá </h3> <h3 class='giasp border text-light p-3'>".$product ->getunit_price()." VNĐ</h3>
      </div>
	  <br>
      <div class='ProductDescription row text-left pr-3'style=' font-family: monospace;'>
	  <h4 class='pl-3'> Mô tả sản phẩm:</h4>
        <h5 class='border border-dark rounded p-3'>".$product ->getdescription_product()."
		<p> * Hình ảnh chi tiết: 
		<p><img src='".$product->getimg_detail_product()."' class='img-fluid pt-0 pl-3 pr-2' alt='image'>
		</h5>
      </div>
    </div>
  </div><br>";
?>