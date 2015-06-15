<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
			$data = array('rowid' => $this->input->post('get_rowid', TRUE), 'qty' => $this->input->post('get_qty',TRUE));
			$this->cart->update($data);

			echo $this->cart->total()."/".$this->cart->total_items()."/".$this->input->post('get_qty',TRUE)."/".$this->input->post('get_price',TRUE);
		} else {
			redirect('toko/keranjang');
		}
	}
}