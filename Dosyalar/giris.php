<?php 
require_once 'config.php';

if (isset($_POST['girisyap'])) {
    echo md5($_POST['sifre']);

    $sorgu=$db->prepare("SELECT * FROM kullanicilar WHERE kul_mail=? AND kul_sifre=?");
    $sorgu->execute(array(
        $_POST['mail'],md5($_POST['sifre'])
    ));
    $kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);
    $sonuc=$sorgu->rowcount();
    if ($sonuc==0) {
        header("location:giris.php?basarisiz");
    } else {
        foreach ($kullanici as $key => $value) {
            $_SESSION[$key]=$value;
        }

        header("location:index.php?basarili");
    }

}


?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $ayarcek['site_baslik'] ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold text-primary text-center">Giriş Yap</h3>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST" accept-charset="utf-8">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Mail Adresiniz</label>
                                    <input required="" type="email" name="mail" placeholder="Mail Adresiniz" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Şifreniz</label>
                                    <input required="" type="password" name="sifre" placeholder="Şifreniz" class="form-control">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="girisyap" class="btn btn-primary btn-lg">Giriş Yap</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>