<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content mt-5">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-sm-12">
          <div class="card card-primary">
            <div class="card-header p-5 d-flex justify-content-center text-center">
              <h5 class="card-title">
                <div>Form Pengisian Daftar Hadir Kegiatan <strong><?php echo $pages[0]['nama_kegiatan'] ?></strong></div>
                <div class="mt-2">Pelaksanaan Tanggal <?php echo date('d F Y', strtotime($pages[0]['tanggal'])) ?></div>
              </h5>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
              <div class="card-body">
                <input type="hidden" name="id_kegiatan" value="<?php echo $pages[0]['id'] ?>">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan nama anda">
                  <span id="nama_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP anda">
                  <span id="nip_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukan jabatan anda">
                  <span id="jabatan_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label for="instansi">Instansi</label>
                  <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukan instansi anda">
                  <span id="instansi_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label for="unit_kerja">Unit Kerja</label>
                  <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Masukan unit kerja anda">
                  <span id="unit_kerja_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label for="alamat_unit_kerja">Alamat Unit Kerja</label>
                  <input type="text" class="form-control" name="alamat_unit_kerja" id="alamat_unit_kerja" placeholder="Masukan alamat unit kerja anda">
                  <span id="alamat_unit_kerja_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <div id="signArea">
                    <label for="">Tanda Tangan</label>
                    <div class="sig sigWrapper form-control" style="height:auto; width: auto;">
                      <div class="typed"></div>
                      <canvas class="sign-pad" id="sign-pad" width="270" height="100"></canvas>
                    </div>
                  </div>
                  <div class="btn btn-warning text-white mt-2" id="btnClearSign">Clear</div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button id="btn-submit" class="btn btn-primary float-right btn-block btn-lg">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-2"></div>
      </div>

    </div>
  </section>
</div>