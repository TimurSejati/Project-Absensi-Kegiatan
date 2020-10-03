<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
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
    $this->load->view('v_kegiatan', $data);
    $this->load->view('_partials/footer');
  }

  public function tambah_kegiatan()
  {
    if (isset($_POST['tambah'])) {
      $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required', array('required' => 'Form %s harus di isi'));
      $this->form_validation->set_rules('narasumber', 'narasumber', 'required', array('required' => ' Form %s harus di isi'));
      $this->form_validation->set_rules('tanggal', 'tanggal', 'required', array('required' => 'Form %s harus di isi'));
      if ($this->form_validation->run() == false) {
        $data['kegiatan'] = $this->m_kegiatan->getAll_kegiatan()->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar');
        $this->load->view('v_kegiatan', $data);
        $this->load->view('_partials/footer');
      } else {
        $data['nama_kegiatan'] = $this->input->post('nama_kegiatan');
        $data['narasumber'] = $this->input->post('narasumber');
        $tanggal = $this->input->post('tanggal');
        $data['tanggal'] = date('Y-m-d', strtotime($tanggal));

        $data['slug'] = $this->seoURL($data['nama_kegiatan']);
        $check_page = $this->m_page_absensi->check_page($data);

        if ($check_page->num_rows() > 0) {
          echo 'Page sudah tersedia';
        } else {
          $add_page = $this->m_kegiatan->input_data($data, 'kegiatan');
          if ($add_page) {
            // $this->save_route();
            $this->session->set_flashdata('message', 'Kegiatan baru berhasil ditambahkan');
            redirect('kegiatan/list');
          } else {
            $this->session->set_flashdata('message', 'Error');
            redirect('kegiatan/list');
          }
        }
      }
    }
  }

  private function seoURL($text)
  {
    $text = strtolower(htmlentities($text));
    $text = str_replace(' ', '-', $text);

    return $text;
  }

  // private function save_route()
  // {
  //   $routes = $this->m_page_absensi->get_all_routes();
  //   $data = array();
  //   if (!empty($routes)) {
  //     $data[] = '<?php ';
  //     foreach ($routes as $route) {
  //       $data[] = '$route[\'' . $route['slug'] . '\'] = \'' . 'absenpages' . '/' . 'index/' . $route['id'] . '\';';
  //     }
  //     $output = implode("\n", $data);
  //     write_file(APPPATH . 'cache/routes.php', $output);
  //   }
  // }

  public function form_ubah_kegiatan($id)
  {
    $where = array('id' => $id);
    $data['kegiatan'] = $this->m_kegiatan->edit_data($where, 'kegiatan')->result();
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
    $this->load->view('v_kegiatan_ubah', $data);
    $this->load->view('_partials/footer');
  }

  public function update_kegiatan()
  {
    $this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'required', array('required' => 'Form %s harus di isi'));
    $this->form_validation->set_rules('narasumber', 'narasumber', 'required', array('required' => ' Form %s harus di isi'));
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required', array('required' => 'Form %s harus di isi'));
    if ($this->form_validation->run() == false) {
      $data['kegiatan'] = $this->m_kegiatan->getAll_kegiatan()->result();
      $this->load->view('_partials/header');
      $this->load->view('_partials/sidebar');
      $this->load->view('v_kegiatan', $data);
      $this->load->view('_partials/footer');
    } else {
      $id = $this->input->post('id');
      $nama_kegiatan = $this->input->post('nama_kegiatan');
      $slug = $this->seoURL($nama_kegiatan);
      $narasumber = $this->input->post('narasumber');
      $tanggal = $this->input->post('tanggal');
      $ubahTanggal = date('Y-m-d', strtotime($tanggal));
      if ($publish = $this->input->post('publish') == null) {
        $valuePublish = 0;
      } else {
        $valuePublish = 1;
      }

      $data = array(
        'nama_kegiatan' => $nama_kegiatan,
        'slug' => $slug,
        'narasumber' => $narasumber,
        'tanggal' => $ubahTanggal,
        'status_page' => $valuePublish
      );

      $where = array('id' => $id);
      $this->m_kegiatan->update_data($where, $data, 'kegiatan');
      $this->session->set_flashdata('message', 'Berhasil ubah data');
      redirect('kegiatan/list');
    }
  }

  public function hapus_kegiatan($id)
  {
    $where = array('id' => $id);
    $this->m_kegiatan->hapus_data($where, 'kegiatan');
    $this->session->set_flashdata('message', 'Kegiatan berhasil dihapus');
    redirect('kegiatan/list');
  }
}
