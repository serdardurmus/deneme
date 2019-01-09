<?php 
include 'header.php';

include '../netting/baglan.php';

$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_id=:kullanici_id");
  $kullanicisor->execute(array(
    'kullanici_id' =>$_GET['kullanici_id']
    ));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kullanıcı Şifre İşlemleri</h3>
      </div>

      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Üye Adı: <?php echo $kullanicicek['kullanici_adsoyad']; ?> | Kullanıcı Adı: <?php echo $kullanicicek['kullanici_kullaniciad']; ?>
                <small>
                <?php
                if ($_GET['durum']=='ok') { ?>
                <b style="color:green;">Güncelleme Başarılı...</b>
                <?php } elseif ($_GET['durum']=='no') { ?> 
                <b style="color:red;">Güncelleme Yapılamadı...</b>
                <?php } ?></small>
              </h2>

                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div class="x_content">
                  <br />
                  <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">



                    <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                    <input type="hidden" name="kullanici_kullaniciad" value="<?php echo $kullanicicek['kullanici_kullaniciad']; ?>">

                  <!-- FİZİKİ DOSYAYI SİLMEK İÇİN KULLANIYORUZ
                  islem.php de UNLİNK KOMUTU YAZDIK -->
                  <input type="hidden" name="kullanici_resimyol" value="<?php echo $kullanicicek['kullanici_resimyol']; ?>">
                  
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span>
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php 
                        if (strlen($kullanicicek['kullanici_resimyol'])>0) { ?>
                        <img width="150px" src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>">

                        <?php } else { ?>
                        <img width="150px" src="../../dimg/kullanici/logoyok.png">
                        <?php } ?>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Adı <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" disabled="" name=""  value="<?php echo $kullanicicek['kullanici_kullaniciad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Şifre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="first-name" required="required" disabled="" name=""  value="<?php echo $kullanicicek['kullanici_password']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Yeni Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="kullanici_password"  placeholder="Şifreniz, Büyük/Küçük harf, rakam ve semboller içermelidir." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Şifrenizi tekrar giriniz <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="sifre2"  placeholder="Şifrenizi tekrar giriniz" class="form-control col-md-7 col-xs-12"><br>
                          <small>
                <?php
                if ($_GET['durum']=='ok') { ?>
                <b style="color:green;">Şifrenizi başarıyla değiştirdiniz.</b>
                <?php } elseif ($_GET['durum']=='no') { ?> 
                <b style="color:red;">Şifre değiştirme işlemi gerçekleşmedi. Şifreler uyuşmuyor olabilir...</b>
                <?php } ?></small>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="kullanicisifredegistirmeyok" class="btn btn-primary">Vazgeç</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Şifre Değiştir</button>

                  <div align="left" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 style="color: red;" class="modal-title" id="myModalLabel2">Uyarı!</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Şifre değişikliği işlemini yapmak istiyor musunuz?</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Hayır</button>
                          <button type="submit" name="kullanicisifredegistir" class="btn btn-success">Evet</button>
                        </div>

                      </div>
                    </div>
                  </div>
                        </div>
                      </div>
                    </form>
                  </div>



                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

    <?php 
    include 'footer.php';
    ?>