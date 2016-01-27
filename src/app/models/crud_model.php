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

    public function getAll()
    {
        return $this->db->get('estudoci');
    }

    public function getById($id=null)
    {
        if($id!=null){
            $this->db->where('id',$id);
            $this->db->limit(1);
            return $this->db->get('estudoci');
        }else{
            return false;
        }
    }

    public function updateData($data=null,$condition=null)
    {
        if($data != null && $condition != null)
        {
            if($this->db->update('estudoci',$data,$condition))
            {
                $this->session->sess_create;
                $this->session->set_flashdata('edicao_status', true);
                $this->session->set_flashdata('edicao_mensagem','Alteração realizada com sucesso!');
                $this->session->set_flashdata('edicao_tipo','success');
                redirect(current_url());
            }
        }
    }

    public function deleteById($condition = null)
    {
        if($condition != null){
            $this->db->delete('estudoci',$condition);
            $this->session->sess_create;
            $this->session->set_flashdata('delete_status', true);
            $this->session->set_flashdata('delete_mensagem','Usuário excluído com sucesso!');
            $this->session->set_flashdata('delete_tipo','success');
            redirect('crud/retrieve');
        }else{
            return false;
        }
    }
}