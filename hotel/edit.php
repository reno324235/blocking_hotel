<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Booking Hotel</title>
  <?php
  include 'alerts.php';
  include 'koneksi.php';
  $id = $_GET['id'];
  $input = "SELECT tamu.*, kamar.* FROM tamu INNER JOIN kamar ON kamar.id = tamu.id WHERE tamu.id = '$id'";
  $result = $koneksi->query($input);
  
  $update = $result->fetch_assoc();
  ?>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/datepicker.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Input Booking Hotel</a></li>
          <li><a href="rekap.php">List Booking</a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-lg-6">
        <div class="page-header">
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="glyphicon glyphicon-tag"></i> <b> Edit Booking Hotel </b> </h3>
        </div>
        <div class="panel-body">
          <form id="form_input" action="edit.php" method="post">
            <?php
             if(isset($_POST['update'])){

               $id = $_POST['id'];
               $nama = $_POST['nama'];
               $jns_kel = $_POST['jns_kel'];
               $notelp = $_POST['notelp'];
               $keterangan = $_POST['keterangan'];
               $jalan = $_POST['jalan'];
               $provinsi = $_POST['provinsi'];
               $kota = $_POST['kota'];
               $kd_pos = $_POST['kd_pos'];

               $no_kamar = $_POST['no_kamar'];
               $tipe_kamar = $_POST['tipe_kamar'];
               $jml_ranjang = $_POST['jml_ranjang'];

               $tgl_checkin = $_POST['tgl_checkin'];
               $tgl_checkout = $_POST['tgl_checkout'];

               $update  = "UPDATE tamu, kamar SET tamu.id='".$id."', tamu.nama='".$nama."', tamu.jns_kel='".$jns_kel."', tamu.notelp='".$notelp."', tamu.jalan='".$jalan."', tamu.kota='".$kota."', tamu.provinsi='".$provinsi."', tamu.kd_pos='".$kd_pos."', tamu.keterangan='".$keterangan."',tamu.tgl_checkin='".$tgl_checkin."',tamu.tgl_checkout='".$tgl_checkout."',kamar.no_kamar='".$no_kamar."' WHERE kamar.id = tamu.id AND tamu.id= '".$id."'";
               $result = $koneksi->query($update);

              if ($result === TRUE) {
                 writeMsg('save.sukses');
              } else {
                 writeMsg('save.gagal');
              }

             }
             ?>
               <div class="row">
                 <div class="col-xs-6 form-group">
                   <label class="control-label" for="id">No. Identitas (SIM/KTP)</label>
                   <input type="text" name="id" value="<?php echo $update['id']; ?>" class="form-control" required>
                 </div>
                 <div class="col-xs-6 form-group">
                   <label class="control-label" for="nama">Nama</label>
                   <input type="text" class="form-control" name="nama" value="<?php echo $update['nama']; ?>" required>
                 </div>
               </div>

                <!-- field & combo jenis - hp -->
               <div class="row">
                 <div class="col-xs-6 form-group">
                   <label for="sel1">Jenis Kelamin</label>
                   <select class="form-control" name="jns_kel">
                     <option <?php if($update['jns_kel'] === 'Laki-Laki') echo 'selected'; ?>>Laki-Laki</option>
                     <option <?php if($update['jns_kel'] === 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                   </select>
                 </div>
                 <div class="col-xs-6 form-group">
                   <label class="control-label" for="hp">No Telepon</label>
                   <input type="number" class="form-control" value="<?php echo $update['notelp']; ?>" name="notelp">
                 </div>
               </div>
               <!-- akhir jns dan hp -->

                <!-- Field alamat -->
               <div class="form-group">
                 <label class="control-label" for="hp">Alamat</label>
                 <input type="text" class="form-control" placeholder="Alamat Lengkap" name="jalan" value="<?php echo $update['jalan']; ?>">
              </div>

               <div class="row">
                 <div class="col-xs-4 form-group">
                   <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" value="<?php echo $update['provinsi']; ?>" required>
                 </div>
                 <div class="col-xs-4 form-group">
                   <input type="text" class="form-control" placeholder="Kota/Kabupaten" name="kota" value="<?php echo $update['kota']; ?>" required>
                 </div>
                 <div class="col-xs-4 form-group">
                   <input type="text" class="form-control" placeholder="Kode Pos" name="kd_pos" value="<?php echo $update['kd_pos']; ?>" required>
                 </div>
               </div>
               <!-- akhir bagian alamat -->

               <!-- combo jenis kamar dan jmlranjang -->
               <div class="row">
                 <div class="col-xs-4 form-group">
                   <label class="control-label">No. Kamar</label>
                   <input type="text" class="form-control" placeholder="No. Kamar" name="no_kamar" value="<?php echo $update['no_kamar']; ?>" required>
                 </div>
                 <div class="col-xs-4 form-group">
                   <label for="sel1">Jenis Kamar</label>
                   <select class="form-control" name="tipe_kamar">
                     <option <?php if($update['tipe_kamar'] === 'Standard room') echo 'selected'; ?>>Standard room</option>
                     <option <?php if($update['tipe_kamar'] === 'Superior/Premium room') echo 'selected'; ?>>Superior/Premium room</option>
                     <option <?php if($update['tipe_kamar'] === 'Deluxe room') echo 'selected'; ?>>Deluxe room</option>
                     <option <?php if($update['tipe_kamar'] === 'Suite room') echo 'selected'; ?>>Suite room</option>
                     <option <?php if($update['tipe_kamar'] === 'Presidential/penthouse room') echo 'selected'; ?>>Presidential/penthouse room</option>
                   </select>
                 </div>
                 <div class="col-xs-4 form-group">
                   <label for="sel1">Jumlah Ranjang</label>
                   <select class="form-control" name="jml_ranjang">
                     <option <?php if($update['jml_ranjang'] === 'Single') echo 'selected'; ?>>Single</option>
                     <option <?php if($update['jml_ranjang'] === 'Double') echo 'selected'; ?>>Double</option>
                     <option <?php if($update['jml_ranjang'] === 'Triple/Family') echo 'selected'; ?>>Triple/Family</option>
                   </select>
                 </div>
               </div>
               <!-- Akhir combo jenis kamar -->

               <!-- datepicker  -->
               <div class="row">
                 <div class="col-xs-6 form-group">
                   <label>Tgl. CheckIn</label>
                   <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                     <input class="form-control" type="text" name="tgl_checkin" readonly="readonly" value="<?php echo $update['tgl_checkin']; ?>">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                   </div>
                </div>
                <div class="col-xs-6 form-group">
                  <label>Tgl. CheckOut</label>
                  <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                    <input class="form-control" type="text" name="tgl_checkout" readonly="readonly" value="<?php echo $update['tgl_checkout']; ?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>
               </div>
               </div>
               <!-- akhir datepicker -->

               <!-- text keterangan -->
               <div class="form-group">
                 <label for="comment">Keterangan</label>
                 <textarea class="form-control" rows="5" name="keterangan"><?php echo $update['keterangan']; ?></textarea>
               </div>
               <!-- akhir keterangan -->

               <!-- button -->
               <div class="form-group">
                 <input type="submit" value="Update" name="update" class="btn btn-primary">
                 <a href="rekap.php" class="btn btn-danger">Batal</a>
               </div>
               <!-- akhir button -->
               
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script>
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
  </script>

</body>
</html>
