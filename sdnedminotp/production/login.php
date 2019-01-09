<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Yönetim Paneli </title>
    <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="../netting/islem.php" method="POST">
              <h1>Yönetim Paneli</h1>

              <div>
                <input type="text" name="kullanici_kullaniciad" class="form-control" placeholder="Kullanıcı adı" required="" />
              </div>
              <div>
                <input type="password" name="kullanici_password" class="form-control" placeholder="Şifre" required="" />
              </div>
              <div>
                
                <button style="width: 100%; background-color: #73878A; color: white;" type="submit" name="loggin" class="btn btn-default">Giriş Yap</button>
              </div>

              <div class="clearfix"></div>


              <?php
              if ($_GET['durum']=="no") {
                echo "Kullanıcı bulunamadı...";
              } elseif ($_GET['durum']=="exit") {
                echo "Başarıyla çıkış yaptınız.";
              }


              ?>



              <div class="separator">
                <p class="change_link">Yönetim için şifre talep et: 
                  <a href="#signup" class="to_register"> Kullanıcı Ekle </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-user"></i> Öğrenci Takip Programı</h1>
                  <p>© 2018 Tüm hakları saklıdır. | SD Yazılım. Design by SD</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Yeni Kullanıcı</h1>
              <div>
                <input type="text" class="form-control" placeholder="Kullanıcı Adınız" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="E-mail" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Şifre" required="" />
              </div>
              <div>
                <button style="width: 100%; background-color: #73878A; color: white;" type="submit" name="logginregister" class="btn btn-default">Gönder</button>                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Şifren zaten var mı ?
                  <a href="#signin" class="to_register"> Giriş Yap </a>

                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-user"></i> Öğrenci Takip Programı</h1>
                  <p>© 2018 Tüm hakları saklıdır. | SD Yazılım. Design by SD</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
