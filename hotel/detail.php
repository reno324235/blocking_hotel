<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail</title>
    <?php
    /**
    * Created by PhpStorm.
    * User: alwizen
    * Date: 20/05/2017
    * Time: 11:31
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
    <br>
    <a class="btn" href="rekap.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a><br><br>
    <?php

   $id_tm= $_GET['id']; //mengarahkan id yang dipilih dan query untuk menampilkan data.
   $detail = "SELECT tamu.id, tamu.nama, tamu.jns_kel, tamu.notelp, tamu.jalan, tamu.kota, tamu.provinsi, tamu.kd_pos, tamu.tgl_checkin, tamu.tgl_checkout, tamu.keterangan, kamar.no_kamar, kamar.tipe_kamar, kamar.jml_ranjang from tamu,kamar where tamu.id='$id_tm' LIMIT 1";
   $result = $koneksi->query($detail);
          
    while ($data=$result->fetch_assoc()){ //mengambil data
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i><b> Detai Booking</b> </h3>
          </div>
      <div class="panel-body">
        <table class="table table-responsive table-striped">
          <tbody>
            <tr>
                <td class="danger"><b>No ID<b></td>
                <td class="danger"><?php echo $data['id'] ?></td>
            </tr>
            <tr>
                <td><b>Nama<b></td>
                <td><?php echo $data['nama'] ?></td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td><?php echo $data['jalan'] ?><?php echo ", "; ?> <?php echo $data['kota'] ?><?php echo ", "; ?><?php echo $data['provinsi'] ?><?php echo ", "; ?><?php echo $data['kd_pos'] ?></td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin<b></td>
                <td><?php echo $data['jns_kel'] ?></td>
            </tr>
            <tr>
                <td><b>NO. Telp/Hp<b></td>
                <td><?php echo $data['notelp'] ?></td>
            </tr>
            <tr>
                <td><b>No. Kamar<b></td>
                <td><?php echo $data['no_kamar'] ?></td>
            </tr>
            <tr>
                <td><b>tipe Kamar<b></td>
                <td><?php echo $data['tipe_kamar'] ?></td>
            </tr>
            <tr>
                <td><b>Tipe Bad<b></td>
                <td><?php echo $data['jml_ranjang'] ?></td>
            </tr>
            <tr>
                <td><b>CheckIn<b></td>
                <td><?php echo $data['tgl_checkin'] ?></td>
            </tr>
            <tr>
                <td><b>CheckOut<b></td>
                <td><?php echo $data['tgl_checkout'] ?></td>
            </tr>
            <tr>
                <td><b>Keterangan<b></td>
                <td><?php echo $data['keterangan'] ?></td>
            </tr>
            <tbody>
        </table>
      </div>
    </div>
        <?php
    }
    ?>
</div>
