<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h4>Jumlah Kegiatan</h4>
              <h4 class="text-bold"><?= count($kegiatan) ?> Kegiatan</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4>Jumlah Daftar Hadir<sup style="font-size: 20px"></sup></h4>
              <h4 class="text-bold"><?= count($peserta) ?> Peserta</h4>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <div class="small-box-footer">&nbsp;</div>
          </div>
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->