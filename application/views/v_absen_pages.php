<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link href="<?php echo base_url() ?>assets/css/signature/jquery.signaturepad.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<?php if ($pages[0]['status_page'] == 0) {
  $this->load->view('v_404');
} else { ?>

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content mt-5">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-sm-12">
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
        <div class="col-lg-3"></div>
      </div>
    </div>
  </section>

<?php } ?>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/signature/numeric-1.2.6.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/signature/bezier.js"></script>
<script src="<?php echo base_url() ?>assets/js/signature/jquery.signaturepad.js"></script>
<script type='text/javascript' src="<?php echo base_url() ?>assets/js/signature/html2canvas.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/js/custom.js"></script> -->
<script src="<?php echo base_url() ?>assets/js/signature/json2.min.js"></script>

<script>
  $(document).ready(function() {
    $("#signArea").signaturePad({
      drawOnly: true,
      drawBezierCurves: true,
      lineTop: 90,
    });
  });

  $("#btn-submit").click(function(e) {
    e.preventDefault();
    html2canvas([document.getElementById("sign-pad")], {
      onrendered: function(canvas) {
        var id_kegiatan = $("input[name='id_kegiatan']").val();
        var nama = $("input[name='nama']").val();
        var nip = $("input[name='nip']").val();
        var jabatan = $("input[name='jabatan']").val();
        var instansi = $("input[name='instansi']").val();
        var unit_kerja = $("input[name='unit_kerja']").val();
        var alamat_unit_kerja = $("input[name='alamat_unit_kerja']").val();
        var canvas_img_data = canvas.toDataURL("image/png");
        var img_data = canvas_img_data.replace(
          /^data:image\/(png|jpg);base64,/,
          ""
        );
        //ajax call to save image inside folder
        $.ajax({
          url: "absenpages/absensi",
          data: {
            id_kegiatan,
            nama,
            nip,
            jabatan,
            instansi,
            unit_kerja,
            alamat_unit_kerja,
            img_data,
          },
          type: "post",
          dataType: "json",
          success: function(response) {
            Swal.fire({
              title: "Apakah form sudah di isi dan sudah benar?",
              text: "",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Ya",
            }).then((result) => {
              if (result.value) {
                if (response.status === "error") {
                  if (response.nama_error != "") {
                    $("#nama_error").html(response.nama_error);
                    $("#nama").addClass(response.class);
                  } else {
                    $("#nama_error").html("");
                  }

                  if (response.nip_error != "") {
                    $("#nip_error").html(response.nip_error);
                    $("#nip").addClass(response.class);
                  } else {
                    $("#nip_error").html("");
                  }

                  if (response.jabatan_error != "") {
                    $("#jabatan_error").html(response.jabatan_error);
                    $("#jabatan").addClass(response.class);
                  } else {
                    $("#jabatan_error").html("");
                  }

                  if (response.instansi_error != "") {
                    $("#instansi_error").html(response.instansi_error);
                    $("#instansi").addClass(response.class);
                  } else {
                    $("#instansi_error").html("");
                  }

                  if (response.unit_kerja_error != "") {
                    $("#unit_kerja_error").html(response.unit_kerja_error);
                    $("#unit_kerja").addClass(response.class);
                  } else {
                    $("#unit_kerja_error").html("");
                  }

                  if (response.alamat_unit_kerja_error != "") {
                    $("#alamat_unit_kerja_error").html(
                      response.alamat_unit_kerja_error
                    );
                    $("#alamat_unit_kerja").addClass(response.class);
                  } else {
                    $("#alamat_unit_kerja_error").html("");
                  }
                } else if (response.status === "success") {
                  window.location.href = response.redirect;
                }
              }
            });
          },
        });
      },
    });
  });
  $("#btnClearSign").click(function(e) {
    $("#signArea").signaturePad().clearCanvas();
  });
</script>