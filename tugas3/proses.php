<?php
error_reporting(false);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tria Bagus</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tria Bagus" />
    <!-- boostrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="#"><h5><i class="fas fa-user-graduate"></i> Nilai Mahasiswa</h5></a>
    </nav>
    <div class="container">
    <!-- Content here -->
        <div class="row" >
        <div class="col-sm">
            
            <?php
                // Ambil data dari session
                if (isset($_SESSION['tmpnama'])) {
                $tmpnama = $_SESSION['tmpnama'];
                }
                if (isset($_SESSION['tmputs'])) {
                $tmputs = $_SESSION['tmputs'];
                }
                if (isset($_SESSION['tmpuas'])) {
                    $tmpuas = $_SESSION['tmpuas'];
                }
                if (isset($_SESSION['tmptugas'])) {
                    $tmptugas = $_SESSION['tmptugas'];
                }
                if (isset($_SESSION['tmphadir'])) {
                    $tmphadir = $_SESSION['tmphadir'];
                }
                if (isset($_SESSION['tmpgrade'])) {
                    $tmpgrade = $_SESSION['tmpgrade'];
                }
                // End ambil data dari session

                // Tambahkan array (hasil dari data session tadi) dengan data inputan yang baru
                $tmpnama[] = $_POST['nama'];
                $tmputs[] = $_POST['uts'];
                $tmpuas[] = $_POST['uas'];
                $tmptugas[] = $_POST['tugas'];
                $tmphadir[] = $_POST['hadir'];
                $rata  = $_POST['uts'] + $_POST['uas'] + $_POST['tugas'] + $_POST['hadir'];
                $hasil = $rata / 4;
                $tmpgrade[] = $hasil;


                // End script tambah ke array

                // Simpan data array yang baru ke session
                $_SESSION['tmpnama'] = $tmpnama;
                $_SESSION['tmputs'] = $tmputs;
                $_SESSION['tmpuas'] = $tmpuas;
                $_SESSION['tmptugas'] = $tmptugas;
                $_SESSION['tmphadir'] = $tmphadir;
                $_SESSION['tmpgrade'] = $tmpgrade;
                // End script simpan ke session
                ?>

                <?php
                if(isset($_POST['kirim'])){
                ?>
                <table class="table table-hover">
                <thead>
                <tr class="table-dark">
                    <th class="bg-dark">Nama</th>
                    <th class="bg-dark">Nilai uts</th>
                    <th class="bg-dark">Nilai uas</th>
                    <th class="bg-dark">Nilai tugas</th>
                    <th class="bg-dark">Kehadiran</th>
                    <th class="bg-dark">Grade</th>
                </tr>
                </thead>
                <?php

                    // Ambil data dari session
                if (isset($_SESSION['tmpnama'])) {
                    $tmpnama = $_SESSION['tmpnama'];
                }
                if (isset($_SESSION['tmputs'])) {
                    $tmputs = $_SESSION['tmputs'];
                }
                if (isset($_SESSION['tmpuas'])) {
                    $tmpuas = $_SESSION['tmpuas'];
                    }
                if (isset($_SESSION['tmptugas'])) {
                    $tmptugas = $_SESSION['tmptugas'];
                    }
                if (isset($_SESSION['tmphadir'])) {
                    $tmphadir = $_SESSION['tmphadir'];
                    }
                    if (isset($_SESSION['tmpgrade'])) {
                        $tmpgrade = $_SESSION['tmpgrade'];
                    }
                // End ambil data dari session
                
                // Cetak dengan cara uraikan isi arraynya
                for ($i=0; $i < count($tmpnama); $i++) {
                    $myfile = fopen("data.txt", "w") or die("Unable to open file!");
                    $txt = "Nama Mahasiswa :".$tmpnama[$i]."\n";
                    fwrite($myfile, $txt);
                    $txt = "Nilai UTS :".$tmputs[$i]."\n";
                    fwrite($myfile, $txt);
                    $txt = "Nilai UAS :".$tmpuas[$i]."\n";
                    fwrite($myfile, $txt);
                    $txt = "Nilai Tugas :".$tmptugas[$i]."\n";
                    fwrite($myfile, $txt);
                    $txt = "Persentase Kehadiran :".$tmphadir[$i]."\n";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                ?>
                <tr>
                <?php
                    if($tmputs[$i] < 0 || $tmputs[$i] > 100){
                        echo "<td colspan='6'>Nilai UTS tidak valid</td>";
                    }elseif($tmpuas[$i] < 0 || $tmpus[$i] > 100){
                        echo "<td colspan='6'>Nilai UAS tidak valid</td>";
                    }elseif($tmptugas[$i] < 0 || $tmptugas[$i] > 100){
                        echo "<td colspan='6'>Nilai Tugas tidak valid</td>";
                    }elseif($tmphadir[$i] < 0 || $tmphadir[$i] > 100){
                        echo "<td colspan='6'>Persentase kehadiran tidak valid</td>";
                    }else{
                        if($tmphadir[$i] < 80){
                ?>
                        <td><?= $tmpnama[$i];?></td>
                        <td><?= $tmputs[$i];?></td>
                        <td><?= $tmpuas[$i];?></td>
                        <td><?= $tmptugas[$i];?></td>
                        <td><?= $tmphadir[$i];?></td>
                        <td><?php
                                echo"E";
                            ?>
                        </td>
                <?php        
                        }else{
                ?>
                        <td><?= $tmpnama[$i];?></td>
                        <td><?= $tmputs[$i];?></td>
                        <td><?= $tmpuas[$i];?></td>
                        <td><?= $tmptugas[$i];?></td>
                        <td><?= $tmphadir[$i];?></td>
                        <td><?php 
                            if($tmpgrade[$i] == 0){
                                echo "";
                            }elseif($tmpgrade[$i] >= 85 && $tmpgrade[$i] <= 100){
                                echo"A";
                            }elseif($tmpgrade[$i] >= 70 && $tmpgrade[$i] < 85){
                                echo"B";
                            }elseif($tmpgrade[$i] >= 60 && $tmpgrade[$i] < 70){
                                echo"C";
                            }elseif($tmpgrade[$i] >= 55 && $tmpgrade[$i] < 60){
                                echo"D";
                            }elseif($tmpgrade[$i] < 55){
                                echo"E";
                            }
                            ?>
                        </td>
                <?php
                        } 
                    }
                ?>
                    </tr>

                <?php    
                    } 

                }
                ?>
                </table>
            </div>
            <div class="col-sm">

                <div class="card text-center mb-3">
                    <div class="card-header bg-dark" style="color:#fff;">
                        Option
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="index.php">Tambah Mahasiswa</a>
                        <a class="btn btn-danger" href="destroy.php">Clear</a>
                    </div>
                    <div class="card-footer text-muted">
                        Copyright: Tria Bagus , <?= date('Y');?>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-header bg-dark" style="color:#fff;">
                        Data File Terbaca
                    </div>
                    <div class="card-body">
                    <?php
                        $myfile = fopen("data.txt", "r") or die("Unable to open file!");
                        // Output one line until end-of-file
                        while(!feof($myfile)) {
                            echo fgets($myfile) . "<br>";
                        }
                        fclose($myfile);
                    ?>
                    </div>
                    <div class="card-footer text-muted">
                        Copyright: Tria Bagus , <?= date('Y');?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>