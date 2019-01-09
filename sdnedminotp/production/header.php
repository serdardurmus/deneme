<?php 
ob_start();
session_start();

include '../netting/baglan.php';

$ayarsor=$db->prepare("SELECT * from slider where slider_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_kullaniciad=:ad");
$kullanicisor->execute(array(
  'ad' => $_SESSION['kullanici_kullaniciad']
  ));

// http://localhost/porto/nedmin/production/ girişleri engelliyor
$say=$kullanicisor->rowCount();
if ($say==0) {
  header ("Location: login.php?izinsizgiris");
  exit();
}

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

date_default_timezone_set('Europe/Istanbul');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <script src="../../js/ckeditor/ckeditor.js"></script>

    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Öğrenci Takip Programı</title>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-user"></i> <span>Öğrenci Takip Prg.</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="

                <?php 
                      if (strlen($kullanicicek['kullanici_resimyol'])>0) { ?>
                        ../../<?php echo $kullanicicek['kullanici_resimyol'] ?>
                      
                       <?php } else { ?>
                        ../../sdimg/kullanici/logoyok.png
                        <?php } ?>

                " alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2><?php echo $_SESSION['kullanici_kullaniciad'] ?></h2>
                <?php 
                if ($kullanicicek['kullanici_yetki']=="Yönetici") {
                  echo "Yetki: Yönetici";
                } elseif ($kullanicicek['kullanici_yetki']=="Öğretmen") {
                  echo "Yetki: Öğretmen";
                } elseif ($kullanicicek['kullanici_yetki']=="Veli") {
                  echo "Yetki: Veli";
                } elseif ($kullanicicek['kullanici_yetki']=="Öğrenci") {
                  echo "Yetki: Öğrenci";
                }elseif ($kullanicicek['kullanici_yetki']=="Admin") {
                  echo "Yetki: Admin";
                }
                 ?>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

<?php 
include 'sidebar.php';
 ?>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Siteyi Gör" href="../../index" target="_blank">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Profil Ayarları" href="kullanici-profil.php">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              
              <a data-toggle="tooltip" data-placement="top" title="Mesajlar">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Güvenli Çıkış" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php 
                      if (strlen($kullanicicek['kullanici_resimyol'])>0) { ?>
                        ../../<?php echo $kullanicicek['kullanici_resimyol'] ?>
                      
                       <?php } else { ?>
                        ../../sdimg/kullanici/logoyok.png
                        <?php } ?>" alt=""><?php echo $_SESSION['kullanici_kullaniciad'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="kullanici-profil.php">
                        <span class="pull-right"><i class="fa fa-user"></i></span>
                        <span>Kullanıcı Profili</span>
                      </a>
                    </li>
                    <li>
                      <a href="sifredegistir.php">
                        <span class="badge bg-red pull-right"><i class="fa fa-key"></i></span>
                        <span>Şifre Değiştir</span>
                      </a>
                    </li>
                    <li><a href="sss.php"><span class="badge bg-dark pull-right">S.S.S</span>Yardım</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış</a></li>
                  </ul>
                </li>


                <!--
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->