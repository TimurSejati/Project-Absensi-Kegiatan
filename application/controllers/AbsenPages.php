<?php

class AbsenPages extends CI_Controller
{
  public function index($slug)
  {
    $data['pages'] = $this->m_page_absensi->getPageById($slug);

    if ($data['pages']) {
      $this->load->view('v_absen_pages', $data);
    } else {
      $this->load->view('v_404');
    }
  }

  public function absensi()
  {
    $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Form %s harus disi'));
    $this->form_validation->set_rules('nip', 'nip', 'required|integer|min_length[18]|max_length[18]', array(
      'required' => 'Form %s harus disi',
      'integer' => 'Nip harus berupa angka',
      'min_length' => 'Masukan NIP anda dengan benar',
      'max_length' => 'Masukan NIP anda dengan benar'
    ));
    $this->form_validation->set_rules('jabatan', 'jabatan', 'required', array('required' => 'Form %s harus disi'));
    $this->form_validation->set_rules('instansi', 'instansi', 'required', array('required' => 'Form %s harus disi'));
    $this->form_validation->set_rules('unit_kerja', 'unit kerja', 'required', array('required' => 'Form %s harus disi'));
    $this->form_validation->set_rules('alamat_unit_kerja', 'alamat unit kerja', 'required', array('required' => 'Form %s harus disi'));
    $response = array();
    if ($this->form_validation->run() == false) {
      $response['status'] = 'error';
      $response['nama_error'] = form_error('nama');
      $response['nip_error'] = form_error('nip');
      $response['jabatan_error'] = form_error('jabatan');
      $response['instansi_error'] = form_error('instansi');
      $response['unit_kerja_error'] = form_error('unit_kerja');
      $response['alamat_unit_kerja_error'] = form_error('alamat_unit_kerja');
      $response['class'] = 'is-invalid';
      echo json_encode($response);
    } else {

      $imagedata = base64_decode($_POST['img_data']);
      $filename = md5(date("dmYhisA"));
      //Location to where you want to created sign image
      $file_name = './assets/images/' . $filename . '.png';
      file_put_contents($file_name, $imagedata);
      $filenameReplace = str_replace("./", "", $file_name);
      $result['nama'] = $this->input->post('nama');
      $result['nip'] = $this->input->post('nip');
      $result['jabatan'] = $this->input->post('jabatan');
      $result['instansi'] = $this->input->post('instansi');
      $result['unit_kerja'] = $this->input->post('unit_kerja');
      $result['alamat_unit_kerja'] = $this->input->post('alamat_unit_kerja');
      $result['tanda_tangan'] = $filenameReplace;
      $result['kegiatan_id'] = $this->input->post('id_kegiatan');
      $addKehadiran = $this->m_absen->input_data($result, 'peserta');

      $response['status'] = 'success';
      $response['redirect'] = site_url('absenpages/success_absen');
      echo json_encode($response);
    }
  }

  public function success_absen()
  {
    $this->load->view('v_success_absen_page');
  }
}
