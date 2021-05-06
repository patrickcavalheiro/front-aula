<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * WS Aula Service
 * Biblioteca que realiza a conexão ao web-service do sistema via CURL/REST
 * @author Patrick Cavalheiro 
*/

class Wsaulaservice {

    private $url_ws = 'http://127.0.0.1/wsaula/rest/';
    private $token = '8cb706dccb601ec747367471e6cf0c8af283562e';
    private $default_timeout;
    private $curl;

    public function get($endpoint = '') {
        if ($endpoint != '') {
            try {
                /* realiza a requisição para a API */
                $this->curl = curl_init();
                curl_setopt($this->curl, CURLOPT_URL, $this->url_ws . $endpoint);
                curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('token: ' . $this->token));
                $retornoApi = curl_exec($this->curl);
                curl_close($this->curl);

                return json_decode($retornoApi);                
            } catch (Throwable $t) {                
                error_clear_last();
                return false;
            }
        } else {
            return false;
        }
    }

    public function post($endpoint = '', $dados = null) {
        if ($endpoint != '' && $dados != null) {
            try {
                /* realiza a requisição para a API */
                $this->curl = curl_init();
                curl_setopt($this->curl, CURLOPT_URL, $this->url_ws . $endpoint);
                curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('token: ' . $this->token));
                /* --- requisição POST ---- */
                curl_setopt($this->curl, CURLOPT_POST, count($dados));
                curl_setopt($this->curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($dados)));

                $retornoApi = curl_exec($this->curl);
                curl_close($this->curl);

                return json_decode($retornoApi);
            } catch (Throwable $t) {                
                error_clear_last();
                return false;
            }
        } else {
            return false;
        }
    }
}