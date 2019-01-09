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
        <h3>Kullanıcı Profil İşlemleri</h3>
      </div>

      
    </div>

    <div class="clearfix"></div>

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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mevcut Kullanıcı Resmi <span class="required"></span>
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php 
                        if (strlen($kullanicicek['kullanici_resimyol'])>0) { ?>
                        <img width="150px" src="../../<?php echo $kullanicicek['kullanici_resimyol']; ?>">

                        <?php } else { ?>
                        <img width="150px" src="../../sdimg/kullanici/logoyok.png">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim Değiştir <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" name="kullanici_resimyol" class="form-control col-md-7 col-xs-12">
                        <input type="hidden" name="kullanici_resimyol" value="<?php echo $kullanicicek['kullanici_resimyol']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Üyelik Tarihi <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" disabled="" name="kullanici_zaman" value="<?php echo $kullanicicek['kullanici_zaman']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Adı <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_kullaniciad"  value="<?php echo $kullanicicek['kullanici_kullaniciad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Ad Soyad <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_adsoyad"  value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı TC Kimlik No <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_tcno"  value="<?php echo $kullanicicek['kullanici_tcno']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Telefon -1 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_telefon1"  value="<?php echo $kullanicicek['kullanici_telefon1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Telefon -2 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_telefon2"  value="<?php echo $kullanicicek['kullanici_telefon2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı E-mail -1 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_email1"  value="<?php echo $kullanicicek['kullanici_email1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı E-mail -2 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_email2"  value="<?php echo $kullanicicek['kullanici_email2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Kurum Numarası <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_kurumno"  value="<?php echo $kullanicicek['kullanici_kurumno']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div> 


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Kademe <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="first-name" class="form-control" name="kullanici_kademe" required>

                          <option value="<?php echo $kullanicicek['kullanici_kademe'] ?>"><?php echo $kullanicicek['kullanici_kademe'] ?></option>
                          <option value="<?php echo $kullanicicek['kullanici_kademe'] ?>">-</option>
                          <option value="Anaokulu">Anaokulu</option>
                          <option value="İlkokul">İlkokul</option>
                          <option value="Ortaokul">Ortaokul</option>
                          <option value="Anadolu Lisesi">Anadolu Lisesi</option>
                          <option value="Fen Lisesi">Fen Lisesi</option>
                          <option value="Yaz Okulu">Yaz Okulu</option>
                          <option value="Personel">Personel</option>
                          <option value="Muhasebe">Muhasebe</option>
                          <?php 
                          if ($kullanicicek['kullanici_yetki']=="Admin") { ?>
                          <option value="Admin">Admin</option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Branş <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="first-name" class="form-control" name="kullanici_brans" required>

                          <option value="<?php echo $kullanicicek['kullanici_brans'] ?>"><?php echo $kullanicicek['kullanici_brans'] ?></option>
                          <option value="<?php echo $kullanicicek['kullanici_brans'] ?>">-</option>
                          <option value="Genel Müdür">Genel Müdür</option>
                          <option value="Müdür">Müdür</option>
                          <option value="Başmüdür Yardımcısı">Başmüdür Yardımcısı</option>
                          <option value="Müdür Yardımcısı">Müdür Yardımcısı</option>
                          <option value="Öğretmen">Öğretmen</option>
                          <option value="Yardımcı Öğretmen">Yardımcı Öğretmen</option>
                          <option value="Veli">Veli</option>
                          <option value="Öğrenci">Öğrenci</option>
                          <option value="Personel">Personel</option>
                          <option value="Muhasebe">Muhasebe</option>
                          <?php 
                          if ($kullanicicek['kullanici_yetki']=="Admin") { ?>
                          <option value="Admin">Admin</option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Yetki <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="first-name" class="form-control" name="kullanici_yetki" required>

                          <option value="<?php echo $kullanicicek['kullanici_yetki'] ?>"><?php echo $kullanicicek['kullanici_yetki'] ?></option>
                          <option value="<?php echo $kullanicicek['kullanici_yetki'] ?>">-</option>
                          <option value="Yönetici">Yönetici</option>
                          <option value="Öğretmen">Öğretmen</option>
                          <option value="Veli">Veli</option>
                          <option value="Öğrenci">Öğrenci</option>
                          <option value="Personel">Personel</option>
                          <option value="Muhasebe">Muhasebe</option>
                          <?php 
                          if ($kullanicicek['kullanici_yetki']=="Admin") { ?>
                          <option value="Admin">Admin</option><?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Durum <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="first-name" class="form-control" name="kullanici_durum" required>
                          <?php 
                          if ($kullanicicek['kullanici_durum']==1) { ?>
                          <option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                          <?php } elseif ($kullanicicek['kullanici_durum']==0) { ?> 
                          <option value="0">Pasif</option>
                          <option value="1">Aktif</option>
                          <?php 
                        }?>
                      </select>
                    </div>
                  </div>



                 
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="kullaniciduzenleme" class="btn btn-primary">Vazgeç</button>
                        <button type="submit" name="kullaniciduzenle" class="btn btn-success">Güncelle</button>
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