<?php 
/*
Bu yazılım aksoyhlc.net | satis.aksoyhlc.net tarafından geliştirilmiştir.

Özel script, yazılım ve mobil uygulama işlemleriniz için
aksoyhlc.net/iletisim iletişim formundan 

0850 305 9257 Whatsapp destek hattından 

iletişime geçebilirsiniz.
*/


require_once 'config.php';
oturum();
?>
<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dosyalar/<?php echo $ayarcek['site_logo'] ?>">

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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">AKSOYHLC</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home"></i>
                    <span>Ana Sayfa</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">





                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#musteri_menu"
                    aria-expanded="true" aria-controls="musteri_menu">
                    <i class="fas fa-users"></i>
                    <span>Müşteriler</span>
                </a>
                <div id="musteri_menu" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Müşteri İşlemleri:</h6>
                    <a class="collapse-item" href="musteriekle.php">Müşteri Ekle</a>
                    <a class="collapse-item" href="musteriler.php">Müşterileri Listele</a>
                    <a class="collapse-item" href="musteri_yukle.php">Müşteri Yükle</a>
                </div>
            </div>
        </li>




        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#randevu_menu"
            aria-expanded="true" aria-controls="randevu_menu">
            <i class="fas fa-calendar-alt"></i>
            <span>Randevular</span>
        </a>
        <div id="randevu_menu" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Randevu İşlemleri:</h6>
            <a class="collapse-item" href="randevuolustur.php">Randevu Ekle</a>
            <a class="collapse-item" href="randevular.php">Randevuları Listele</a>
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link" href="profil.php">
        <i class="fas fa-user"></i>
        <span>Profil</span></a>
    </li>

<li class="nav-item">
    <a class="nav-link" href="ayarlar.php">
        <i class="fas fa-cogs"></i>
        <span>Ayarlar</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>




</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['kul_isim'] ?></span>

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Çıkış Yap
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
