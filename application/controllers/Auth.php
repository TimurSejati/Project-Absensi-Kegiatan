<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
  public function index()
  {
    accseesBlockAuth();
    $this->load->view('v_login');
  }

  public function auth_login()
  {
    accseesBlockAuth();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('v_login');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $admin = $this->db->get_where('admin', ['username' => $username])->row_array();
      if ($admin) {
        if (password_verify($password, $admin['password'])) {
          $data = [
            'id' => $admin['id'],
            'nama' => $admin['nama'],
            'username' => $admin['username'],
            'avatar' => $admin['avatar']
          ];
          $this->session->set_userdata($data);
          return redirect('admin/dashboard');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Password salah
        </div>');
          redirect('auth/index');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Admin tidak tersedia
      </div>');
        redirect('auth/index');
      }
    }
  }


  public function logout()
  {
    if (isset($_POST['logout'])) {
      $this->session->unset_userdata('nama');
      return redirect('auth/index');
    } else {
      return redirect('admin/dashboard');
    }
  }

  public function registerpage()
  {
    accseesBlockAuth();
    $this->load->view('v_register');
  }

  public function auth_register()
  {
    $data = [
      'nama' => $this->input->post('nama'),
      'username' => $this->input->post('username'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'avatar' => 'user2-160x160.jpg',
    ];
    $this->db->insert('admin', $data);
  }
}
