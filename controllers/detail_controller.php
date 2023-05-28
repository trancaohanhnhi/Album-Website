
<?php
require_once( $_SERVER[ 'DOCUMENT_ROOT' ]."/models/detail_model.php" );
class detail_controller {
    public $model;
    public function __construct() {
        $this->model = new detail_model();
    }
    public function goiChiTietSanPham($id) {
		if(isset($_GET['id_product'])){
			$product = $this->model->layproductbangid($id);
            include($_SERVER['DOCUMENT_ROOT']."/views/detail_views.php");}
        }
	public function goiSanPhamKhac($id){
		if(isset($_GET['id_product'])){
			$id_cate=$this->model->layidcate($id);
			$other_product = $this->model->layspkhacbangidcate($id_cate,$id);
			include($_SERVER['DOCUMENT_ROOT']."/views/carousel_view.php");
		}
	}
}
?>