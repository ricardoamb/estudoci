<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form',));
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        $dados = array(
            'titulo'    => 'CRUD com CodeIgniter',
            'tela'      => ''
        );
        $this->load->view('crud', $dados);
    }

    public function create()
    {
        $this->form_validation->set_rules('nome','<strong>Nome Completo</strong>','trim|required|max_length[100]|ucwords');
        $this->form_validation->set_rules('email','<strong>E-mail</strong>','trim|required|max_length[255]|strtolower|valid_email');
        $this->form_validation->set_rules('login','<strong>Nome de Usuário</strong>','trim|required|max_length[50]|min_length[8]|strtolower|is_unique[estudoci.login]');
        $this->form_validation->set_rules('password','<strong>E-mail</strong>','required');
        $this->form_validation->set_rules('passwordrepeat','<strong>Confirmação de Senha</strong>','required|matches[password]');

        if($this->form_validation->run() == true)
        {
            echo '<p>Validation OK - Insert into database!</p>';
        }
        $dados = array(
            'titulo'    => 'CRUD &raquo; Create',
            'tela'      => 'create'
        );
        $this->load->view('crud', $dados);
    }

    public function retrieve()
    {
        $dados = array(
            'titulo'    => 'CRUD &raquo; Retrieve',
            'tela'      => 'update'
        );
        $this->load->view('crud', $dados);
    }

    public function update()
    {
        $dados = array(
            'titulo'    => 'CRUD &raquo; Update',
            'tela'      => 'update'
        );
        $this->load->view('crud', $dados);
    }

    public function delete()
    {
        $dados = array(
            'titulo'    => 'CRUD &raquo; Delete',
            'tela'      => 'delete'
        );
        $this->load->view('crud', $dados);
    }

}