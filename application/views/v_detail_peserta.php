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
        <h5 class="text-gray">Kegiatan - Daftar Hadir</h5>
        <hr>
        <div class="mb-5 text-center text-uppercase mt-5">
          <h5><strong>Kegiatan <?= $kegiatan[0]['nama_kegiatan'] ?> </strong></h5>
          <h5><strong>Pelaksanaan tanggal <?= date('d F Y', strtotime($kegiatan[0]['tanggal'])) ?></strong></h5>
          <h5><strong>Narasumber <?= $kegiatan[0]['narasumber'] ?></strong> </h5>
        </div>
        <div class="row">
          <div class="col-sm-12">

            <table id="tableKegiatan" class="table table-bordered dataTable dtr-inline" role="grid" aria-describedby="example1_info">
              <thead>
                <tr role="row">
                  <th style="text-align:center;width: 20px;">No</th>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Jabatan</th>
                  <th>Instansi</th>
                  <th>Unit Kerja</th>
                  <th>Alamat Unit Kerja</th>
                  <th style="text-align:center;width: 100px;">Tanda Tangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($peserta as $row) :
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->nip ?></td>
                    <td><?= $row->jabatan ?></td>
                    <td><?= $row->instansi ?></td>
                    <td><?= $row->unit_kerja ?></td>
                    <td><?= $row->alamat_unit_kerja ?></td>
                    <td>
                      <img src=" <?php echo base_url()  . $row->tanda_tangan ?>">
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