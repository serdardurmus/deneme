<?php 
include 'header.php';

include '../netting/baglan.php';


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yeni Kullanıcı Ekleme İşlemleri</h3>
      </div>      
    </div>


    <div class="clearfix"></div>


    <body>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
          <div class="x_title">
              <h2>Üye Adı: <?php echo $kullanicicek['kullanici_adsoyad']; ?> | Kullanıcı Adı: <?php echo $kullanicicek['kullanici_kullaniciad']; ?><small>
                <?php
                if ($_GET['durum']=='ok') { ?>
                <b style="color:green;">Güncelleme Başarılı...</b>
                <?php } elseif ($_GET['durum']=='no') { ?> 
                <b style="color:red;">Güncelleme Yapılamadı...</b>
                <?php } ?></small></h2>
                <div align="right" class="clearfix">
              <a href="yenikullanici.php"><button class="btn btn-info"><i class="fa fa-user" aria-hidden="true"></i>  Tek Kullanıcı Ekle</button></a>
              <a href="kullanicilistesi.php"><button class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i>  Kullanıcı Listesi</button></a></div>
                <div class="clearfix"></div>
              </div>
          
              <div class="">
                <?php  
                if ($_GET['excel']=='no1') { ?>
                <b style="color:red;"> Bir Excel Dosyası Seçiniz</b>
                <?php } elseif ($_GET['excel']=='no2') { ?> 
                <b style="color:red;">Yükleme İşlemi Başarısız...</b>
                <?php } elseif ($_GET['excel']=='no3') { ?> ?>
                <b style="color:red;">8MB dan Büyük Dosya Atmaya Çalışıyonuz....</b>
                <?php } ?>
                <form action="../netting/islem.php" id="form1" name="form1" method="post"   enctype="multipart/form-data">
                <br>
                 <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">CSV Dosyasını Seç <span class="required"></span>
                  </label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="file" name="file" id="file" class="form-control col-md-7 col-xs-12">
                  </div>
                  <button class="btn-primary btn" name="CSVilekullanicikaydet" type="submit">CSV İle Aktar</button>
                </div>

              </form>
              CSV ile dosyalarınızı tek seferde içeri aktarabilirsiniz. <br>
              Eklenecek satırlardaki her bir veri virgül ile ayrılmalıdır.
              <p style="color: blue;">CSV dosyanızda, Türkçe karakter sorunu yaşamamak için; dosyanızı hazırladıktan sonra Notepad ile açıp kodlamasını UTF-8 yapıp kaydetmelisiniz.</p>
              <p style="color: red;">Örnek bir dosya için .xlsx dosyasını inceleyiniz. <a href="../../sdimg/dosya/kullanicilistesi.xlsx"><button class="btn-default btn btn-xs" type="submit">Örnek Dosya İndir</button></p></a>

            </div>
            
                

            </div></div></div></div>

          </body>
        </div>
      </div>
      <!-- /page content -->

      <?php 
      include 'footer.php';
      ?>