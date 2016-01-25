<?php defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('crud/create'); // Abertura do form

    echo form_label('Nome Completo: ');
    echo form_input(array('id'=>'nome','class'=>'input-text','name'=>'nome'),'','autofocus');
    echo form_label('Email: ');
    echo form_input(array('id'=>'email','class'=>'input-text','name'=>'email'));
    echo form_label('Login: ');
    echo form_input(array('id'=>'login','class'=>'input-text','name'=>'login'));
    echo form_label('Senha: ');
    echo form_password(array('id'=>'password','class'=>'input-text','name'=>'password'));
    echo form_label('Repita a Senha: ');
    echo form_password(array('id'=>'password2','class'=>'input-text','name'=>'password2'));
    echo form_submit(array('name'=>'cadastrat','value'=>'Cadastrar'));

echo form_close(); // Fechamento do form
