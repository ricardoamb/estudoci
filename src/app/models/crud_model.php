<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud_model extends CI_Model
{

    public function insertData($data=NULL)
    {
        if($data!=NULL)
        {
            if($this->db->insert('estudoci',$data))
            {
                $this->session->sess_create;
                $this->session->set_flashdata('cadastro_status', true);
                $this->session->set_flashdata('cadastro_mensagem','Cadastro efetuado com sucesso');
                $this->session->set_flashdata('cadastro_tipo','success');
                redirect('crud/create');
            }
        }
    }

}