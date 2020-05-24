<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volejbal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('Volejbal.php',(array)$output);
	}



	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function hala_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('hala');
		$crud->set_relation('mestoid','mesto','nazov');
		$crud->display_as('mestoid','Mesto');
		$crud->set_subject('Športové Haly');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();


		$output = $crud->render();

		$this->_example_output($output);
	}

	public function liga_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('tablestrap');
			$crud->set_table('ligy');
			$crud->set_subject('Ligy');
			$crud->columns('nazov');
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function tim_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('tim');
		$crud->set_relation('halaid','hala','nazov');
		$crud->display_as('halaid','Domáca hala');
		$crud->set_relation('ligaid','ligy','nazov');
		$crud->display_as('ligaid','Druh Ligy');
		$crud->set_subject('Timy');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();


		$output = $crud->render();

		$this->_example_output($output);
	}

	public function zapas_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('tablestrap');
			$crud->set_table('zapas');
			$crud->set_relation('tim_id1','tim','nazov');
			$crud->display_as('tim_id1','Domaci');
			$crud->set_relation('tim_id2','tim','nazov');
			$crud->display_as('tim_id2','Hostia');
			$crud->set_relation('halaid','hala','nazov');
			$crud->display_as('halaid','Hala');
			$crud->set_subject('Zapasy');
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function hraci_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('hrac');
		$crud->set_relation('tim_id','tim','nazov');
		$crud->display_as('tim_id','Aktuálny klub');
		$crud->set_field_upload('foto','assets/uploads/files');
		$crud->set_subject('Hraci');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();


		$output = $crud->render();

		$this->_example_output($output);
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->mesta_management2();

		$output2 = $this->haly_management2();

		$output3 = $this->hrac_management2();

		$output4 = $this->ligy_management2();

		$output5 = $this->zapasy_management2();

		$output6 = $this->timy_management2();

		/*zapasy , timy.  bude ich 6*/


		$js_files = $output1->js_files + $output2->js_files + $output3->js_files+ $output4->js_files + $output5->js_files+ $output6->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files + $output4->css_files+ $output5->css_files + $output6->css_files;
		$output = "<center><h1>Tabuľka Mestá</h1></center>".$output1->output."<center><h1>Tabuľka Haly</h1></center>".$output2->output."<center><h1>Tabuľka hráčov</h1></center>".$output3->output."<center><h1>Tabuľka líg</h1></center>".$output4->output."<center><h1>Tabuľka zápasov</h1></center>".$output5->output."<center><h1>Tabuľka tímov</h1></center>".$output6->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function mesta_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('tablestrap');
		$crud->set_table('mesto');
		$crud->set_subject('Mesta');
		$crud->required_fields('nazov');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function haly_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('hala');
		$crud->required_fields('nazov','mestoid','adresa');
		$crud->set_relation('mestoid','mesto','nazov');
		$crud->display_as('mestoid','Mesto');

		$crud->set_subject('Haly');



		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function hrac_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('hrac');
		$crud->set_relation('tim_id','tim','nazov');
		$crud->display_as('tim_id','Aktuálny klub');
		$crud->set_field_upload('foto','assets/uploads/files');
		$crud->required_fields('meno','priezvisko','rok_narodenia','cislo_registracie','foto');
		$crud->set_subject('Hraci');



		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function zapasy_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('zapas');
		$crud->set_relation('tim_id1','tim','nazov');
		$crud->display_as('tim_id1','Domaci');
		$crud->set_relation('tim_id2','tim','nazov');
		$crud->display_as('tim_id2','Hostia');
		$crud->set_relation('halaid','hala','nazov');
		$crud->display_as('halaid','Hala');
		$crud->required_fields('tim_id1','tim_id2','halaid','datum_zapasu');
		$crud->set_subject('Zapasy');



		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function timy_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('tim');
		$crud->set_relation('halaid','hala','nazov');
		$crud->display_as('halaid','Domáca hala');
		$crud->set_relation('ligaid','ligy','nazov');
		$crud->display_as('ligaid','Druh Ligy');
		$crud->required_fields('nazov','vznik','ligaid','halaid');
		$crud->set_subject('Timy');



		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function ligy_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('ligy');
		$crud->required_fields('nazov');
		$crud->set_subject('Ligy');



		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}



}
