<?php
class product{
    private $id_product;
	private $id_category;
    private $name_product;
    private $unit_price;
    private $stock_quantity;
    private $description_product;
    private $img_main_product;
    private $img_detail_product;
    private $highlight_product;

    public function getid_product(){return $this->id_product; }
	public function getid_category(){return $this->id_category; }
    public function getname_product(){return $this->name_product; }
    public function getunit_price(){return $this->unit_price;}
    public function getstock_quantity(){return $this->stock_quantity; }
    public function getdescription_product(){return $this->description_product; }
    public function getimg_main_product(){return $this->img_main_product; }
    public function getimg_detail_product(){return $this->img_detail_product; }
    public function gethighlight_product(){return $this->highlight_product; }

    public function __construct
		($id_product,$id_category,$name_product,$unit_price,$stock_quantity,$description_product,$img_main_product,$img_detail_product,$highlight_product){
        $this->id_product = $id_product;
		$this->id_category = $id_category;
        $this->name_product = $name_product;
        $this->unit_price = $unit_price;
        $this->stock_quantity = $stock_quantity;
        $this->description_product = $description_product;
        $this->img_main_product = $img_main_product;
        $this->img_detail_product = $img_detail_product;
        $this->highlight_product =$highlight_product;        
    }
}   
?>