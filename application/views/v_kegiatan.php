<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <div class="swal" data-swal="<?= $this->session->flashdata('message') ?>"></div>
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahKegiatan"><i class="fas fa-plus"></i> Tambah Kegiatan</button>
        <?php if (validation_errors()) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>' . validation_errors() . '
        </div>';
        } ?>
        <div class="row">
          <div class="col-sm-12">

            <table id="tableKegiatan" class="table table-bordered dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Slug</th>
                  <th style="width: 120px;">Daftar Absensi</th>
                  <th>Narasumber</th>
                  <th>Tanggal</th>
                  <th>Publish</th>
                  <th style="text-align:center;width: 130px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kegiatan as $row) :
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row->nama_kegiatan ?></td>
                    <td><a href="<?php echo base_url()  . $row->slug ?>"><?php echo base_url()  . $row->slug ?></a></td>
                    <td> <a href="<?= site_url('peserta/detail_peserta/' . $row->id) ?>" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i> Lihat Peserta</a></td>
                    <td><?php echo $row->narasumber ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row->tanggal)) ?></td>
                    <td>
                      <?php if ($row->status_page == 1) {
                          echo '<div class="badge badge-success btn-sm text-white">Published</div>';
                        } else {
                          echo '<div class="badge badge-danger btn-sm text-white">Not Publish</div>';
                        } ?>

                    </td>
                    <td>
                      <!-- <button class="btn btn-info btn-sm" onclick="Swal.fire()"> <i class="fas fa-eye"></i> Detail</button> -->
                      <button class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modalUbahKegiatan" data-id="<?= $row->id ?>" data-nama_kegiatan="<?= $row->nama_kegiatan ?>" data-slug="<?= $row->slug ?>" data-narasumber="<?= $row->narasumber ?>" data-tanggal="<?= $row->tanggal ?>" data-publish="<?= $row->status_page ?>" id="btn-edit"><i class="fas fa-edit"></i> Ubah</button>
                      <!-- <?php echo anchor('kegiatan/form_ubah_kegiatan/' . $row->id, '<div class="btn btn-warning btn-sm text-white"> <i class="fas fa-edit"></i> Ubah</div>') ?> -->
                      <a href="<?= site_url('kegiatan/hapus_kegiatan/' . $row->id) ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
</div>
</section>


<!-- Modal -->
<div class="modal fade" id="modalTambahKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Kegiatan Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" autocomplete="off" action="<?php echo site_url('kegiatan/tambah_kegiatan') ?>">
          <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan">
          </div>
          <div class="form-group">
            <label for="nama_kegiatan">Narasumber</label>
            <input type="text" name="narasumber" class="form-control" id="nama_kegiatan">
          </div>
          <div class="form-group">
            <label for="nama_kegiatan">Tanggal Kegiatan Acara</label>
            <div class="input-group date" id="tglKegiatan" data-target-input="nearest">
              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#tglKegiatan" data-toggle="datetimepicker">
              <div class="input-group-append" data-target="#tglKegiatan" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <div class="mt-4 float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUbahKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Ubah Kegiatan Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo site_url('kegiatan/update_kegiatan') ?>">
          <input type="hidden" name="id" id="id-kegiatan">
          <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan">
          </div>
          <!-- <div class="form-group">
            <label for="nama_kegiatan">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug">
          </div> -->
          <div class="form-group">
            <label for="narasumber">Narasumber</label>
            <input type="text" name="narasumber" class="form-control" id="narasumber">
          </div>

          <div class="form-group">
            <label for="nama_kegiatan">Tanggal Kegiatan Acara</label>
            <div class="input-group date" id="tglKegiatanUbah" data-target-input="nearest">
              <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#tglKegiatanUbah" data-toggle="datetimepicker" id="tanggal">
              <div class="input-group-append" data-target="#tglKegiatanUbah" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input" name="publish" type="checkbox" id="publish" checked="">
              <label class="custom-control-label" for="publish">Publihsed</label>
            </div>
          </div>

          <div class="mt-4 float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>