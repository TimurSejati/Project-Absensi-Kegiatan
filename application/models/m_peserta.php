<?php

class M_Peserta extends CI_Model
{
  public function getAll_peserta()
  {
    return $this->db->get('peserta');
  }
  public function get_peserta($id)
  {
    return $this->db->get_where('peserta', array('kegiatan_id' => $id));
  }
}
