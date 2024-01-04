<?php

$hostname = "localhost";
$username = "root";
$paassword = "";
$database = "kasir";

$koneksi = mysqli_connect($hostname,$username,$paassword,$database);

//cek koneksi
if($koneksi->connect_error){
    die("koneksi gagal : " . $koneksi->connect_error);
}