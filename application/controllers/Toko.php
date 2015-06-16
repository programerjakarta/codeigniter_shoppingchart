<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function finish()
	{
		if ( ($this->session->userdata("logged_in")) && ($this->cart->total_items() > 0) ) {
			$this->db->insert("transaction_master", array(
				"user_id" => $this->session->userdata("user_id"),
				"total_product" => count($this->cart->contents()),
				"total_quantity" => $this->cart->total_items(),
				"total_payment" => $this->cart->total(),
				"created" => date("Y-m-d H:i:s")
			));

			$transaction_master_id = $this->db->insert_id();

			foreach ($this->cart->contents() as $key => $value) {
				$this->db->insert("transaction_detail", array(
					"transaction_master_id" => $transaction_master_id,
					"product_id" => $value["id"],
					"quantity" => $value["qty"],
					"price" => $value["price"],
					"total_price" => $value["qty"]*$value["price"],
				));
			}

			$this->cart->destroy();
			$this->session->set_flashdata("success", "Thank You.");
			redirect(base_url());
		} else {
			redirect(base_url());
		}
	}

	public function checkout()
	{
		$this->load->view('toko/checkout');
	}

	public function login()
	{
		$this->load->view('toko/login');
	}

	public function auth()
	{
		$isset = $this->input->post("user");

		if (isset($isset)) {
			$username = $this->input->post("user", TRUE);
			$password = $this->input->post("pass", TRUE);

			$where = array("username" => $username, "password" => $password);
			$sql = $this->db->get_where("user", $where)->row("id");

			if ($sql) {
				$data_session = array("logged_in" => true, "user_id" => $sql, "username" => $username);
				$set_session = $this->session->set_userdata($data_session);

				echo 1;	
			} else {
				echo 0;
			}
		} else {
			redirect(base_url());
		}
	}

	public function logout()
	{
		$data_session = array("logged_in" => "", "username" => "");
		$this->session->set_userdata($data_session);
		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();

		redirect(base_url());
	}

	public function index()
	{
		$this->load->view('toko/index',array('row' => $this->db->order_by('title','asc')->get('depkeu_product')));
	}

	public function produk($id)
	{
		$this->load->view('toko/produk', array('row' => $this->db->where('id',$id)->get('depkeu_product')));
	}

	function beli()
	{
		if ($this->input->post('id') !== null) {

			$query = $this->db->query('select * from depkeu_product where id = '.$this->input->post('id').' ');
			$row = $query->row();
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

	function hapus()
	{
		if ($this->input->post('rowid')) {
			$data = array('rowid' => $this->input->post('rowid', TRUE), 'qty' => 0);
			$this->cart->update($data);

			echo $this->cart->total()."/".$this->cart->total_items();
		} else {
			redirect('toko/keranjang');
		}
	}

	function ubah()
	{
		if ($this->input->post('get_rowid')) {
			$data = array(
				'rowid' => $this->input->post('get_rowid', TRUE), 
				'qty'   => $this->input->post('get_qty', TRUE)
			);
			
			$this->cart->update($data);

			echo $this->cart->total()                ."/"
			    .$this->cart->total_items()          ."/"
			    .$this->input->post('get_qty', TRUE) ."/"
			    .$this->input->post('get_price', TRUE);
		} else {
			redirect('toko/keranjang');
		}
	}

	function hapus_semua()
	{
		if ($this->input->post('submit')) {
			$this->cart->destroy();
		} else {
			redirect('toko/keranjang');
		}
	}
}