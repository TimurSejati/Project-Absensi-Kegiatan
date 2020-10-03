<?php

class M_Page_Absensi extends CI_Model
{
  public function check_page($data)
  {
    return $this->db->get_where('kegiatan', array('nama_kegiatan' => $data['slug']));
  }

  public function get_all_routes()
  {
    return $this->db->get_where('kegiatan', array('status_page' => 1))->result_array();
  }

  public function checkPageById($url)
  {
    return $this->db->get_where('kegiatan', array('id' => $url))->result_array();
  }

  public function getPageById($slug)
  {
    return $this->db->get_where('kegiatan', array('slug' => $slug))->result_array();
  }
}
