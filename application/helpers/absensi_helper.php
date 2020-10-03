<?php

function isLogin()
{
  $ci = get_instance();
  if (!$ci->session->userdata('nama')) {
    redirect('auth/index');
  }
}

function accseesBlockAuth()
{
  $ci = get_instance();
  if ($ci->session->userdata('nama')) {
    redirect('admin/dashboard');
  }
}
