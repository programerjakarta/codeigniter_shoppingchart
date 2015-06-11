<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('toko/index',array('row' => $this->db->order_by('title','asc')->get('depkeu_product')));
	}

	function beli()
	{
		if ($this->input->post('id') !== null) {

			$query = $this->db->query('select * from depkeu_product where id = '.$this->input->post('id').' ');
			$row = $query->row();
			// var_dump($result);
			$data = array('id' => $row->id ,
				'name' => $row->title ,
				'qty' => 1 ,
				'price' => $row->price ,
				'options' => array('image'=>$row->image) ,
			 );
			
			$this->cart->insert($data);
			echo $this->cart->total_items();
		} else {
			redirect(base_url());
		}
	}

	function keranjang()
	{
		$this->load->view('toko/keranjang');
	}
}
