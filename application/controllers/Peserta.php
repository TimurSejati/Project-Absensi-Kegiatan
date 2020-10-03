<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    isLogin();
  }


  public function list()
  {
    $data['kegiatan'] = $this->m_kegiatan->getAll_kegiatan()->result();
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
    $this->load->view('v_list_peserta', $data);
    $this->load->view('_partials/footer');
  }

  public function detail_peserta($id)
  {
    $data['kegiatan'] = $this->m_kegiatan->getKegiatan_byId($id);
    $data['peserta'] = $this->m_peserta->get_peserta($id)->result();
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
    $this->load->view('v_detail_peserta', $data);
    $this->load->view('_partials/footer');
  }
}
