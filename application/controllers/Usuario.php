<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public $data;
    
    public function __construct() {
        parent::__construct();
        $this->data['url'] = $this->config->base_url();
    }    

    public function index() {        
        $this->load->view('header', $this->data);          

        $this->load->library('Wsaulaservice');
        $this->data['usuarios'] = $this->wsaulaservice->get('rest/usuario/');

        $this->load->view('listaUsuarios', $this->data);
        $this->load->view('footer', $this->data);
    }

}

/* End of file Usuario.php */
