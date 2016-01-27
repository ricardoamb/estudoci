<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id_user = $this->uri->segment(3);
if($id_user == null) redirect('crud/retrieve');

$query = $this->crud_model->getById($id_user)->row();

echo '<div class="container">';
echo '<div class="page-header">';
echo '<h1>Exclusão de Usuários <small>(Delete)</small></h1>';
echo '</div>';
echo '<div class="col-md-6 into">';

echo form_open("crud/delete/$id_user"); // Abertura do form
// Campo Nome
echo '<div class="form-group">';
echo form_label('Nome Completo: ','',array('for' => 'nome'));
echo form_input(array(
    'id'=>'nome',
    'class'=>'form-control',
    'name'=>'nome',
    'placeholder'=>'Nome',
),set_value('nome', $query->nome),'disabled="disabled');
echo '</div>';
echo '<div class="spacer-v-5"></div>';

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
echo '<div class="spacer-v-5"></div>';

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
echo '<div class="spacer-v-5"></div>';

echo form_hidden('idusuario',$query->id);
echo '<div class="clearfix"></div>';
echo '<hr>';
// Botão Submit
echo form_submit(array('name'=>'delete','value'=>'Confirmar Exclusão', 'class'=>'btn btn-default'));

echo form_close(); // Fechamento do form

echo '</div>';
echo '</div>';
