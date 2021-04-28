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

        /* realiza a requisição para a API buscando a lista de usuários */
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://127.0.0.1/wsaula/rest/api/usuario');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('token: 8cb706dccb601ec747367471e6cf0c8af283562e'));
        $retornoApi = curl_exec($curl);
        curl_close($curl);        

        
        $this->data['usuarios'] = json_decode($retornoApi);

        $this->load->view('listaUsuarios', $this->data);
        $this->load->view('footer', $this->data);
    }

}

/* End of file Usuario.php */
