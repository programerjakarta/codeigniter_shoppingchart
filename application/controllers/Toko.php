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
}
