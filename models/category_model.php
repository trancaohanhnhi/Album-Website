<?php
    class category{
        private $id_category;
        private $name_category	;       

        public function getid_category(){return $this->id_category; }
        public function getname_category(){return $this->name_category; }     

        public function __construct($id_category,$name_category)
		{
            $this->id_category = $id_category;
            $this->name_category=$name_category;
           
        }   
    }
?>