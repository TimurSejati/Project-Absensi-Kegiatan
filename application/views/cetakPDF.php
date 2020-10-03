<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid black;
      text-align: left;
      padding: 8px;
    }

    .title {
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
  </style>
</head>

<body>
  <div class="title">
    <div>
      <h4><strong>Kegiatan <?= $kegiatan[0]['nama_kegiatan'] ?> </strong></h4>
    </div>
    <div style="margin-top: -30px;">
      <h4><strong>Pelaksanaan tanggal <?= date('d F Y', strtotime($kegiatan[0]['tanggal'])) ?></strong></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <table>
        <thead>
          <tr>
            <th style="width: 20px;">No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Unit Kerja</th>
            <th style="width: 70px; text-align:center">Tanda Tangan</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($peserta == null) { ?>
            <tr>
              <td colspan="5" style="text-align: center;">Belum ada peserta</td>
            </tr>
          <?php } else { ?>
            <?php
              $no = 1;
              foreach ($peserta as $row) :
                ?>
              <tr>
                <td style="text-align:center;"><?= $no++ ?></td>
                <td><?= $row->nama ?></td>
                <td><?= $row->jabatan ?></td>
                <td><?= $row->unit_kerja ?></td>
                <td>
                  <center><img height="50px" src=" <?= base_url() . $row->tanda_tangan ?>"></center>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
      <?php } ?>
      </table>
    </div>
  </div>
</body>

</html>