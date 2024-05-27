<?php 
require 'proses.php';
if(isset($_POST["btn"])){
    $nama = $_POST["nama"];
    $waktuHari = $_POST["waktuJam"];
    $jenisMotor = $_POST["jenisMotor"];
    $rental = new Rental($nama, $waktuHari, $jenisMotor);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0X6mBbQoL5mIy2Q7pFqku2v08PCpzZ45v+L8+4U3hXt/4FFdhDTCpFVRb3m9s" crossorigin="anonymous">
    <style>
        /* Custom CSS */
        .form-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
        }
        .result-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container bg-light">
            <h2 class="mb-4">Sewa Motor</h2>
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="waktuJam" class="form-label">Waktu Sewa (hari)</label>
                    <input type="number" class="form-control" id="waktuJam" name="waktuJam" required>
                </div>
                <div class="mb-3">
                    <label for="jenisMotor" class="form-label">Jenis Motor</label>
                    <select class="form-select" id="jenisMotor" name="jenisMotor" required>
                        <option value="supra">Supra</option>
                        <option value="mx">MX</option>
                        <option value="vespa">Vespa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="btn">Hitung</button>
            </form>
        </div>
        <?php if(isset($rental)) :?>
            <div class="result-container">
                <?php if($rental->isMember()) :?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Selamat!</h4>
                        <p>Hai <?= htmlspecialchars($nama); ?> Terimakasih Telah Menjadi Member Dirental zackyroad, Karna Anda member Anda mendapatkan diskon sebesar 5%. Jadi total yang harus Anda bayar adalah Rp <?= number_format($rental->setPajak());?></p>
                    </div>
                <?php else :?>
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Info</h4>
                        <p>Hai <?= htmlspecialchars($nama); ?> Total yang harus dibayar adalah Rp <?= number_format($rental->setPajak());?></p>
                    </div>
                <?php endif ;?>
            </div>
        <?php endif ;?>
    </div>
    <!-- Link Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENsSMZVfLXqz+3llZ1hi/CZJBf5CmwKqK+5G1fK1J5EDdtd+I8TS6gkz2+X+3Og9" crossorigin="anonymous"></script>
</body>
</html>
