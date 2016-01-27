<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','array'));
        $this->load->library(array('form_validation','session','table'));
        $this->load->model(array('crud_model'));
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
        $this->form_validation->set_rules('email','<strong>E-mail</strong>','trim|required|max_length[255]|strtolower|valid_email|is_unique[estudoci.email]');
        $this->form_validation->set_rules('login','<strong>Nome de Usuário</strong>','trim|required|max_length[32]|is_unique[estudoci.login]');
        $this->form_validation->set_rules('password','<strong>Senha</strong>','required');
        $this->form_validation->set_rules('passwordrepeat','<strong>Confirmação de Senha</strong>','required|matches[password]');

        if($this->form_validation->run() == true)
        {
            $post = elements(array('nome','email','login','password'),$this->input->post());
            $data = array(
                'nome'=>$post['nome'],
                'email'=>$post['email'],
                'login'=>$post['login'],
                'senha'=>md5($post['password'])
            );
            $this->crud_model->insertData($data);
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
            'tela'      => 'retrieve',
            'usuarios'  => $this->crud_model->getAll()->result()
        );
        $this->load->view('crud', $dados);
    }

    public function update()
    {
        $this->form_validation->set_rules('nome','<strong>Nome Completo</strong>','trim|required|max_length[100]|ucwords');
        $this->form_validation->set_rules('password','<strong>Senha</strong>','required');
        $this->form_validation->set_rules('passwordrepeat','<strong>Confirmação de Senha</strong>','required|matches[password]');

        if($this->form_validation->run() == true)
        {
            $post = elements(array('nome','email','login','password'),$this->input->post());
            $data = array(
                'nome'=>$post['nome'],
                'senha'=>md5($post['password'])
            );
            $this->crud_model->updateData($data,array('id'=>$this->input->post('idusuario')));
        }
        $dados = array(
            'titulo'    => 'CRUD &raquo; Update',
            'tela'      => 'update'
        );
        $this->load->view('crud', $dados);
    }

    public function delete()
    {
        if($this->input->post('idusuario') > 0){
            $this->crud_model->deleteById(array('id'=>$this->input->post('idusuario')));
        }
        $dados = array(
            'titulo'    => 'CRUD &raquo; Delete',
            'tela'      => 'delete'
        );
        $this->load->view('crud', $dados);
    }

}