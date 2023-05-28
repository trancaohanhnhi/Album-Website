<?php
	class customer
	{
		private $id_customer;
		private $name_customer;
		private $email_customer;
		private $address_customer;
		private $phone_customer;
		private $note_customer;
		
		public function __construct($id_customer, $name_customer, $email_customer, $address_customer, $phone_customer, $note_customer)
		{
			$this -> id_customer=$id_customer;
			$this -> name_customer=$name_customer;
			$this -> email_customer=$email_customer;
			$this -> address_customer=$address_customer;
			$this -> phone_customer=$phone_customer;
			$this -> note_customer=$note_customer;
		}
		
		public function setid_customer($id_customer){$this -> id_customer = $id_customer;}
		public function setname_customer($name_customer){$this -> name_customer = $name_customer;}
		public function setemail_customer($email_customer){$this -> email_customer = $email_customer;}
		public function setaddress_customer($address_customer){$this -> address_customer = $address_customer;}
		public function setphone_customer($phone_customer){$this -> phone_customer = $phone_customer;}
		public function setnote_customer($note_customer){$this -> note_customer = $note_customer;}
	}

?>