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
            <form method="post" action="proses.php">
                <div class="form-group">
                    <label for="exampleInputName">Nama</label>
                    <input name="nama" type="text" class="form-control"  placeholder="Nama Mahasiswa" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputUts">Nilai UTS</label>
                    <input name="uts" type="text" class="form-control" placeholder="Nilai UTS" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputUas">Nilai UAS</label>
                    <input name="uas" type="text" class="form-control" placeholder="Nilai UAS" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputTugas">Nilai Tugas</label>
                    <input name="tugas" type="text" class="form-control" placeholder="Nilai Tugas" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputHadir">Persentase Kehadiran (%)</label>
                    <input name="hadir" type="text" class="form-control" placeholder="Persentase" required>
                </div>
                
                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
            </form>
        </div>
        <div class="col-sm">

            <div class="card text-center">
                <div class="card-header bg-dark" style="color:#fff;">
                    Informasi Terkait
                </div>
                <div class="card-body">
                    <h5 class="card-title">Spesial Data</h5>
                    <p class="card-text">Dengan support data akan disimpan sementara :)</p>
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