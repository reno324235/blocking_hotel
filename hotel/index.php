<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Booking</title>
    <?php
    /**
    * Created by PhpStorm.
    * User: alwizen
    * Date: 20/05/2017
    * Time: 7:41
    */
    include 'alerts.php';
    include 'koneksi.php';
    ?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  </head>
  <body>
    <div class="container">
      <?php include 'nav.php'; ?>
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header">
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="glyphicon glyphicon-tag"></i> <b> Form Booking Hotel </b> </h3>
          </div>
          <div class="panel-body">
            <form id="form_input" action="index.php" method="post">
              <?php
              include 'koneksi.php';
               if(isset($_POST['simpan'])){

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

                 $input = "INSERT INTO tamu (id, nama, jns_kel, notelp, jalan, kota, provinsi, kd_pos, keterangan, tgl_checkin, tgl_checkout, no_kamar) VALUES ('$id', '$nama', '$jns_kel', '$notelp', '$jalan', '$kota', '$provinsi', '$kd_pos', '$keterangan', '$tgl_checkin', '$tgl_checkout', '$no_kamar')";
                 $input2 = "INSERT INTO kamar (no_kamar, id, tipe_kamar, jml_ranjang) VALUES ('$no_kamar', '$id', '$tipe_kamar', '$jml_ranjang')";

                if (mysqli_query($koneksi, $input) && mysqli_query($koneksi, $input2)) {
                writeMsg('save.sukses');
                } else {
                echo "Gagal menyimpan data: " . mysqli_error($koneksi);
                }

               mysqli_close($koneksi);
               }
               ?>
                 <div class="row">
                   <div class="col-xs-6 form-group">
                     <label class="control-label" for="id">No. Identitas (SIM/KTP)</label>
                     <input type="text" name="id" class="form-control" required>
                   </div>
                   <div class="col-xs-6 form-group">
                     <label class="control-label" for="nama">Nama </label>
                     <input type="text" class="form-control" name="nama" id="nama" required>
                   </div>
                 </div>

                  <!-- field & combo jenis - hp -->
                 <div class="row">
                   <div class="col-xs-6 form-group">
                     <label for="sel1">Jenis Kelamin</label>
                     <select class="form-control" name="jns_kel">
                       <option>Laki-Laki</option>
                       <option>Perempuan</option>
                     </select>
                   </div>
                   <div class="col-xs-6 form-group">
                     <label class="control-label" for="hp">No Telepon</label>
                     <input type="text" class="form-control" name="notelp" id="hp">
                   </div>
                 </div>
                 <!-- akhir jns dan hp -->

                    <!--  Field alamat -->
                 <div class="form-group">
                   <label class="control-label" for="hp">Alamat</label>
                   <input type="text" class="form-control"  placeholder="Alamat Lengkap" name="jalan" id="hp">
                </div>

                 <div class="row">
                   <div class="col-xs-4 form-group">
                     <input type="text" class="form-control" placeholder="Provinsi" name="provinsi" id="nama" required>
                   </div>
                   <div class="col-xs-4 form-group">
                     <input type="text" class="form-control" placeholder="Kota/Kabupaten" name="kota" id="nama" required>
                   </div>
                   <div class="col-xs-4 form-group">
                     <input type="text" class="form-control" placeholder="Kode Pos" name="kd_pos" id="nama" required>
                   </div>
                 </div>
                 <!-- akhir bagian alamat -->

                 <!-- combo jenis kamar dan jmlranjang -->
                 <div class="row">
                   <div class="col-xs-4 form-group">
                     <label class="control-label">No. Kamar</label>
                     <input type="text" class="form-control" placeholder="No. Kamar" name="no_kamar" id="nama" required>
                   </div>
                   <div class="col-xs-4 form-group">
                     <label for="sel1">Jenis Kamar</label>
                     <select class="form-control" name="tipe_kamar">
                       <option>Standard room</option>
                       <option>Superior room</option>
                       <option>Deluxe room</option>
                       <option>Suite room</option>
                     </select>
                   </div>
                   <div class="col-xs-4 form-group">
                     <label for="sel1">Bed type</label>
                     <select class="form-control" name="jml_ranjang">
                       <option>Single</option>
                       <option>Double</option>
                       <option>Triple/Family</option>
                     </select>
                   </div>
                 </div>

                 <!-- Akhir combo jenis kamar -->

                 <!-- datepicker  -->
                 <div class="row">
                   <div class="col-xs-6 form-group">
                     <label>Tgl. CheckIn</label>
                     <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                       <input class="form-control" type="text" name="tgl_checkin" readonly="readonly">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                     </div>
                  </div>
                  <div class="col-xs-6 form-group">
                    <label>Tgl. CheckOut</label>
                    <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                      <input class="form-control" type="text" name="tgl_checkout" readonly="readonly">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                 </div>
                 </div>
                 <!-- akhir datepicker -->

                 <!-- text keterangan -->
                 <div class="form-group">
                   <label for="comment">Keterangan</label>
                   <textarea class="form-control" rows="5" id="keterangan" name="keterangan"></textarea>
                 </div>
                 <!-- akhir keterangan -->

                 <!-- button -->
                 <div class="form-group">
                   <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
                   <input type="reset" value="Batal" class="btn btn-danger">
                 </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
<!-- fungsi datepicker -->
    <script>
      $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
    </script>

  </body>
</html>
