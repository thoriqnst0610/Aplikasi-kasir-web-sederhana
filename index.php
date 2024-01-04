<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir Sederhana</title>
    <style>
        select{
            width: 150px;
            height: 50px;
            font-size: 20px;
            color: brown;
            padding-left: 20px;
            background-color: #efefef;
            margin-bottom: 10px;
        }
        option{
            font-size: 20px;
            color: chocolate;
        }
        input{
            width: 150px;
            height: 50px;
            background-color: #efefef;
            color: brown;
            font-size: 20px;
        }
        .labels{
            margin-bottom: 10px;
        }
        table{
            margin-top: 10px;
            width: 950px;
            border-collapse: collapse;
        }
        .ga{
            margin-top: 10px;
            border-radius: 20px;
        }
        .ga:hover{
            cursor: pointer;
            background-color: blanchedalmond;
        }
        .tombol{
            margin-top: 10px;
        }
        body{
            width: 90%;
            margin: 3px auto;
            box-sizing: border-box;
            color: azure;
        }
        h1{
            text-shadow: 0ric;
        }
        .header{
            background-color: chocolate;
            padding: 5px;
        }
        .kolom-1{
            background-color: chocolate;
            margin-top: 20px;
            width: 17%;
            padding: 5px;
            padding-left: 50px;
            float: left;
        }
        .kolom-2{
            background-color: none;
            width: 77.3%;
            float: left;
            margin-top: 10px;
            margin-left: 15px;
            padding: 0px;
        }
        .tombol{
            margin-top: 10px;
            
            float: left;
            margin-left: 800px;
        }
        th{
            background-color: brown;
            padding: 9px;
            text-align: left;
            color: #efefef;
            font-weight: bold;
            border-bottom: white solid 2px;
        }
        td{
            padding: 5px;
            color: azure;
            
        }
        button{
            background-color: chocolate;
            padding: 5px;
            border-radius: 15px;
            color: azure;
            height: 40px;
        }
        button:hover{
            background-color: aqua;
            color: black;
            cursor: pointer;
        }
        input{
            border-radius: 15px;
            border: none;
        }
        select{
            border-radius: 15px;
            border: none;
        }
        label{
            font-size: 18px;
        }
        .akhir{
            text-align: center;
            background-color: brown;
        }
        .no{
            width: 4px;
        }
        .ganjil{
            background-color: chocolate;
        }
        .genap{
            background-color: chocolate;
        }
    </style>
</head>
<body>
    <?php
    require "koneksi.php";
    $barang = [
        // "permen" => 4,
        // "indomie" => 5,
        // "nabati" => 8,
        // "popmie" => 10,
        // "borobudur" => 12
    ];

    ?>
    <div class="header">
    <h1>Selamat Datang di Aplikasi Kasir Sederhana</h1>
    </div>
    <div class="kolom-1">
    <form  method="post">
        <label class="labels">Pilih Barang:
        </label>
        <br>
        <select name="barang">
            <option value="permen">permen</option>
            <option value="indomie">indomie</option>
            <option value="nabati">nabati</option>
            <option value="popmie">pop mie</option>
            <option value="borobudur">borobudur</option>
        </select>
        <br>
        <label class="labels">Jumlah: 
        </label>
        <br>
        <input type="number" name="jumlah" required>
        <br>
        <input type="submit" value="simpan" class="ga" name="simpan">
    </form>
    </div>
    <?php
    
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp ".number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

    ?>
    
    <?php 
    if(isset($_POST['simpan'])) { 
        
        $jumlah = $_POST['jumlah'];
        $harga =0;
        ?>
    <?php

        if($_POST['barang'] == "permen")
        {
            $harga = 20000;
        }elseif($_POST['barang'] == "nabati")
        {
            $harga = 40000;
        }elseif($_POST['barang'] == "indomie")
        {
            $harga = 60000;
        }elseif($_POST['barang'] == "popmie")
        {
            $harga = 80000;
        }elseif($_POST['barang'] == "borobudur")
        {
            $harga = 100000;
        }

        $nama_barang_post = $_POST['barang'];
        $jumlah_post = $_POST['jumlah'];
        $harga_jumlah_post = $harga * $jumlah_post;
        $insert_data = "insert into barang(nama_barang,harga,jumlah,harga_jumlah) values('$nama_barang_post','$harga','$jumlah_post','$harga_jumlah_post')";
        if($koneksi->query($insert_data) === true)

    ?>
   <?php } ?>
    <div class="kolom-2">
    <table>
        <tr>
            <th class="no">NO</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah Barang</th>
            <th>Harga * jumlah</th>
        </tr>

        <?php 
        
        $sql = "select harga_jumlah from barang";
        $result = mysqli_query($koneksi,$sql);
        $total = 0;
        while($row = mysqli_fetch_assoc($result)){

            $total += $row['harga_jumlah'];
        }

        ?>
        <?php  
        
        $sql = "select nama_barang, harga, jumlah, harga_jumlah from barang";
        $result = mysqli_query($koneksi,$sql);
        
        for($i =1;$row = mysqli_fetch_assoc($result);$i++){
            
            $nama_barang = $row['nama_barang'];
            $harga = $row['harga'];
            $jumlah = $row['jumlah'];
            $harga_jumlah = $row['harga_jumlah'];
            //$no++;
            ?>
            <?php
            $warna_garis = $i % 2;
            if($warna_garis != 0)
            { ?>
                <tr class="genap">
            <?php } else { ?>
                <tr class="ganjil">

            <?php } ?>
            ?>
                <td class="no"><?= $i; ?></td>
                <td><?= $nama_barang; ?></td>
                <td><?= rupiah($harga); ?></td>
                <td><?= $jumlah ?></td>
                <td><?= rupiah($harga_jumlah); ?></td>
            </tr>
            <?php  } ?>
            <tr>
                <td colspan="2" class="akhir">Total Keseluruhan</td>
                <td colspan="3" class="akhir"><?= rupiah($total) ?></td>
            </tr>
    </table>
    </div>
    <div class="tombol">
    <form method="post">
    <button name="hapus">hapus riwayat</button>
    </form>
    </div>
    
    <?php

        if(isset($_POST['hapus']))
        {
            $sql = "delete from barang";
            $simpan_hapus = $koneksi->query($sql);
        }

    ?>

    <?php
    
    foreach($barang as $key => $value)
    {
        echo $key.$value;
    }
    
    ?>
</body>
</html>