<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct()
  {
    parent::__construct();
    isLogin();
  }

  public function dashboard()
  {
    $data['kegiatan'] = $this->m_kegiatan->getAll_kegiatan()->result();
    $data['peserta'] = $this->m_peserta->getAll_peserta()->result();
    $this->load->view('_partials/header');
    $this->load->view('_partials/sidebar');
    $this->load->view('v_dashboard', $data);
    $this->load->view('_partials/footer');
  }


  public function edit()
  {
    $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Form %s harus disi'));
    $this->form_validation->set_rules('username', 'Username', 'required|trim', array('required' => 'Form %s harus disi'));
    if ($this->form_validation->run() == false) {
      $this->load->view('_partials/header');
      $this->load->view('_partials/sidebar');
      $this->load->view('v_edit_profile', $data);
      $this->load->view('_partials/footer');
    } else {
      $nama = $this->input->post('nama');
      $username = $this->input->post('username');
      $avatar = $_FILES['avatar']['name'];

      if ($avatar) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/images/profile';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('avatar')) {
          $old_avatar = $data['admin']['avatar'];
          if ($old_avatar != 'default.png') {
            unlink(FCPATH . 'assets/images/profile/' . $old_avatar);
          }
          $new_avatar = $this->upload->data('file_name');
          $this->db->set('avatar', $new_avatar);
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('admin/edit');
        }
      }
      $this->db->set([
        'nama' => $nama,
        'username' => $username
      ]);
      $this->db->where('id', $this->session->userdata('id'));
      $update = $this->db->update('admin');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ubah profile</div>');
      redirect('admin/edit');
    }
  }

  public function ubah_password()
  {
    $this->form_validation->set_rules('password_sekarang', 'password sekarang', 'required', array('required' => 'Form %s harus disi'));
    $this->form_validation->set_rules('password_baru', 'password baru', 'required|trim|min_length[6]', array('required' => 'Form %s harus disi', 'min_length' => 'Password minimal 6 karakter',));
    $this->form_validation->set_rules('ulangi_password', 'ulangi password', 'required|trim|matches[password_baru]', array('required' => 'Form %s harus disi', 'matches' => 'Form %s tidak sama dengan password baru'));

    $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();

    if ($this->form_validation->run() == false) {
      $this->load->view('_partials/header');
      $this->load->view('_partials/sidebar');
      $this->load->view('v_edit_profile', $data);
      $this->load->view('_partials/footer');
    } else {
      $passwordSekarang = $this->input->post('password_sekarang');
      $passwordBaru = $this->input->post('password_baru');

      if (!password_verify($passwordSekarang, $data['admin']['password'])) {
        $this->session->set_flashdata('messagePassword', '<div class="alert alert-danger" role="alert">Password sekarang salah</div>');
        redirect('admin/edit');
      } else {
        if ($passwordSekarang == $passwordBaru) {
          $this->session->set_flashdata('messagePassword', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password sekarang</div>');
          redirect('admin/edit');
        } else {
          $password_hash = password_hash($passwordBaru, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('id', $this->session->userdata('id'));
          $this->db->update('admin');
          $this->session->set_flashdata('messagePassword', '<div class="alert alert-success" role="alert">Berhasil ubah password</div>');
          redirect('admin/edit');
        }
      }
    }
  }
}
