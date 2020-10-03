<div class="content-wrapper">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-5">
      <div class="card card-primary mt-5">

        <!-- /.card-header -->
        <!-- form start -->
        <?= form_open_multipart('admin/edit') ?>
        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" id="exampleInputEmail1" value="<?= $admin['nama'] ?>">
            <small class="text-danger"><?= form_error('nama') ?></small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" name="username" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" id="exampleInputPassword1" value="<?= $admin['username'] ?>">
            <small class="text-danger"><?= form_error('username') ?></small>
          </div>
          <div class="form-group">
            <img src="<?php echo base_url('assets/images/profile/' . $admin['avatar']) ?>" class="img-thumbnail" style="width:150px;height:150px;">
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-12">
              <div class="input-group">
                <div class="custom-file">
                  <label for="exampleInputPassword1">Avatar</label>
                  <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                  <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
              </div>
            </div>
            <div class="col-8"></div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Ubah Profile</button>
        </div>
        </form>
      </div>
    </div>


    <div class="col-1"></div>

    <div class="col-4">
      <div class="card card-primary mt-5">

        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?= site_url('admin/ubah_password') ?>" method="post">
          <div class="card-body">
            <?= $this->session->flashdata('messagePassword'); ?>
            <div class="form-group">
              <label for="exampleInputPassword1">Password Sekarang</label>
              <input type="password" name="password_sekarang" class="form-control <?= form_error('password_sekarang') ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
              <small class="text-danger"><?= form_error('password_sekarang') ?></small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password Baru</label>
              <input type="password" name="password_baru" class="form-control <?= form_error('password_baru') ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
              <small class="text-danger"><?= form_error('password_baru') ?></small>

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Ulangi Password</label>
              <input type="password" name="ulangi_password" class="form-control <?= form_error('ulangi_password') ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
              <small class="text-danger"><?= form_error('ulangi_password') ?></small>

            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Ubah Password</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-1"></div>
  </div>
</div>

</div>