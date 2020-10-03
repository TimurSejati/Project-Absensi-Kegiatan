    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Presensi</span>
      </a>

      <!-- Sidebar -->
      <?php $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array(); ?>
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('assets/images/profile/' . $data['admin']['avatar']) ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <div class="d-block text-capitalize text-white"><?= $data['admin']['nama'] ?></div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= site_url('admin/dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'admin' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('kegiatan/list') ?>" class="nav-link <?= $this->uri->segment(1) == 'kegiatan' ? 'active' : '' ?>">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                  Kegiatan (Acara)
                </p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= site_url('peserta/index') ?>" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  ListPeserta
                </p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= site_url('peserta/list') ?>" class="nav-link <?= $this->uri->segment(1) == 'peserta' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-print"></i>
                <p>
                  Cetak Daftar Hadir
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>