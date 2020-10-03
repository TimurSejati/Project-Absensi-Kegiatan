<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ubah Kegiatan </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content mt-5">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php foreach ($kegiatan as $row) { ?>
          <form method="post" action="<?php echo site_url('kegiatan/update_kegiatan')  ?>">
            <div class="card-body">
              <input type="hidden" name="id" value="<?php echo $row->id ?>">
              <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="<?php echo $row->nama_kegiatan ?>">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $row->slug ?>">
              </div>
              <div class="form-group">
                <label for="narasumber">Narasumber</label>
                <input type="text" class="form-control" name="narasumber" id="narasumber" value="<?php echo $row->narasumber ?>">
              </div>
              <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan</label>
                <div class="input-group date" id="tglKegiatan" data-target-input="nearest">
                  <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#tglKegiatan" data-toggle="datetimepicker" value="<?php echo date('d-m-Y', strtotime($row->tanggal)) ?>">
                  <div class="input-group-append" data-target="#tglKegiatan" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        <?php } ?>
      </div>
    </div>
  </section>
</div>