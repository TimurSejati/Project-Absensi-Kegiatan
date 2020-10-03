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
        <div class="row">
          <div class="col-sm-12">

            <table id="tableKegiatan" class="table table-bordered dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th style="text-align:center;width: 20px;">No</th>
                  <th>Nama Kegiatan</th>
                  <th>Narasumber</th>
                  <th>Tanggal</th>
                  <th style="text-align:center;width: 170px;">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kegiatan as $row) :
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->nama_kegiatan ?></td>
                    <td><?= $row->narasumber ?></td>
                    <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                    <td>
                      <a href="<?= site_url('peserta/detail_peserta/' . $row->id) ?>" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i> Lihat Peserta</a>
                      <a href="<?= site_url('cetak/cetakPDF/' . $row->id) ?>" class="btn btn-warning btn-sm"> <i class="fas fa-print"></i> Cetak</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>