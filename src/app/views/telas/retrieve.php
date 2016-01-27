<?php defined('BASEPATH') OR exit('No direct script access allowed');
echo '<div class="container">';
echo '<div class="page-header">';
    echo '<h1>Lista de Usuários <small>(Retrieve)</small></h1>';
echo '</div>';
echo '<div class="col-md-12 into">';
// Print the array of db on a table
$table_template = array(
    'table_open' => '<table class="table table-striped">'
);
$this->table->set_template($table_template);
$this->table->set_heading('ID','Nome','E-mail','Nome de usuário','Operações');
foreach($usuarios as $usuario){
    $this->table->add_row($usuario->id,$usuario->nome,$usuario->email,$usuario->login,
        anchor("crud/update/$usuario->id",'<i class="fa fa-pencil fa-lg" style="margin-right:10px;color:blue !important;"></i>') .
        anchor("crud/delete/$usuario->id",'<i class="fa fa-times fa-lg" style="color:red !important;"></i>'));
}
echo $this->table->generate();
echo '</div>';
echo '</div>';
if($this->session->flashdata('cadastro_status') != NULL)
{
    $status = $this->session->flashdata('cadastro_status');
    $mensagem = $this->session->flashdata('cadastro_mensagem');
    $tipo = $this->session->flashdata('cadastro_tipo');
    echo '<span class="alert" data-alert="'.$status.'" data-alert-message="'.$mensagem.'" data-type="'.$tipo.'"></span>';
}
if($this->session->flashdata('delete_status') != NULL)
{
    $status = $this->session->flashdata('delete_status');
    $mensagem = $this->session->flashdata('delete_mensagem');
    $tipo = $this->session->flashdata('delete_tipo');
    echo '<span class="alert" data-alert="'.$status.'" data-alert-message="'.$mensagem.'" data-type="'.$tipo.'"></span>';
}