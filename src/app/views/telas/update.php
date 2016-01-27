<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id_user = $this->uri->segment(3);
if($id_user == null) redirect('crud/retrieve');

$query = $this->crud_model->getById($id_user)->row();

echo '<div class="container">';
echo '<div class="page-header">';
echo '<h1>Alteração de Usuários <small>(Update)</small></h1>';
echo '</div>';
echo '<div class="col-md-6 into">';

echo form_open("crud/update/$id_user"); // Abertura do form
// Campo Nome
echo '<div class="form-group">';
echo form_label('Nome Completo: ','',array('for' => 'nome'));
echo form_input(array(
    'id'=>'nome',
    'class'=>'form-control',
    'name'=>'nome',
    'placeholder'=>'Nome',
),set_value('nome', $query->nome),'autofocus');
echo '</div>';
echo form_error('nome','<p class="error-message pull-right">','<i class="fa fa-warning fa-lg error-icon"></i></p>');

// Campo E-mail
echo '<div class="form-group">';
echo form_label('Email: ','',array('for'=>'email'));
echo form_input(array(
    'id'=>'email',
    'class'=>'form-control',
    'name'=>'email',
    'placeholder'=>'E-mail'
),set_value('email', $query->email), 'disabled="disabled');
echo '</div>';
echo form_error('email','<p class="error-message pull-right">','<i class="fa fa-warning fa-lg error-icon"></i></p>');

// Campo Nome de Usuário
echo '<div class="form-group">';
echo form_label('Nome de usuário: ','',array('for'=>'login'));
echo form_input(array(
    'id'=>'login',
    'class'=>'form-control',
    'name'=>'login',
    'placeholder'=>'Nome de Usuário'
),set_value('login', $query->login), 'disabled="disabled');
echo '</div>';
echo form_error('login','<p class="error-message pull-right">','<i class="fa fa-warning fa-lg error-icon"></i></p>');

// Campo Senha
echo '<div class="form-group">';
echo form_label('Senha: ','',array('for'=>'password'));
echo form_password(array(
    'id'=>'password',
    'class'=>'form-control',
    'name'=>'password',
    'placeholder'=>'Senha'
),set_value('password'));
echo '</div>';
echo form_error('password','<p class="error-message pull-right">','<i class="fa fa-warning fa-lg error-icon"></i></p>');

// Campo Confirmação de Senha
echo '<div class="form-group">';
echo form_label('Confirmação de Senha: ','',array('for'=>'passwordrepeat'));
echo form_password(array(
    'id'=>'passwordrepeat',
    'class'=>'form-control',
    'name'=>'passwordrepeat',
    'placeholder'=>'Confirme a Senha'
),set_value('passwordrepeat'));
echo '</div>';
echo form_error('passwordrepeat','<p class="error-message pull-right">','<i class="fa fa-warning fa-lg error-icon"></i></p>');
echo form_hidden('idusuario',$query->id);
echo '<div class="clearfix"></div>';
echo '<hr>';
// Botão Submit
echo form_submit(array('name'=>'cadastrar','value'=>'Alterar', 'class'=>'btn btn-default'));

echo form_close(); // Fechamento do form

echo '</div>';
echo '</div>';
if($this->session->flashdata('edicao_status') != NULL)
{
    $status = $this->session->flashdata('edicao_status');
    $mensagem = $this->session->flashdata('edicao_mensagem');
    $tipo = $this->session->flashdata('edicao_tipo');
    echo '<span class="alert" data-alert="'.$status.'" data-alert-message="'.$mensagem.'" data-type="'.$tipo.'"></span>';
}