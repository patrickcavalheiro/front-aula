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
        $this->data['usuarios'] = $this->wsaulaservice->get('usuario');

        $this->load->view('listaUsuarios', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $this->data);
            $this->load->view('formUsuario', $this->data);
            $this->load->view('footer', $this->data);
        } else {
            //resgatamos os dados vindos por post
            $dados = array(
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha')
            );

            $this->load->library('Wsaulaservice');
            $retorno = $this->wsaulaservice->post('usuario', $dados);

            if(array_key_exists('status', $retorno) && ($retorno->status == true)) {
                $this->session->set_flashdata('message', $retorno->message);
                redirect('usuario');
            } else {
                $this->session->set_flashdata('message', $retorno->error);
                redirect('usuario/cadastrar');
            }
        }            
    }

    public function alterar($id = 0) {
        if ($id === 0){
            redirect('usuario');
        } else {
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('senha', 'senha', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header', $this->data);
                //carregamos a library para buscar o usu??rio que deve ser alterado
                $this->load->library('Wsaulaservice');
                $this->data['usuario'] = $this->wsaulaservice->get('usuario/index/id/'.$id);

                $this->load->view('formUsuario', $this->data);
                $this->load->view('footer', $this->data);
            } else {
                //resgatamos os dados vindos por post do FORMUL??RIO da VIEW
                $dados = array(
                    'email' => $this->input->post('email'),
                    'senha' => $this->input->post('senha')
                );

                $this->load->library('Wsaulaservice');
                $retorno = $this->wsaulaservice->put('usuario/index/id/'. $id, $dados);

                if(array_key_exists('status', $retorno) && ($retorno->status == true)) {
                    $this->session->set_flashdata('message', $retorno->message);
                    redirect('usuario');
                } else {
                    $this->session->set_flashdata('message', $retorno->error);
                    redirect('usuario/alterar/'.$id);
                }
            }
        }
    }

}

/* End of file Usuario.php */
