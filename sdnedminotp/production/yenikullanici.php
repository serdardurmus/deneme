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

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Üye Adı: <?php echo $kullanicicek['kullanici_adsoyad']; ?> | Kullanıcı Adı: <?php echo $kullanicicek['kullanici_kullaniciad']; ?><small>
                <?php
                if ($_GET['durum']=='ok') { ?>
                <b style="color:green;">Kayıt Başarılı...</b>
                <?php } elseif ($_GET['durum']=='no') { ?> 
                <b style="color:red;">Kayıt Yapılamadı...</b>
                <?php } ?></small></h2>
                <div align="right" class="clearfix">
                <a href="yenikullanicicoklu.php"><button class="btn btn-info"><i class="fa fa-user" aria-hidden="true"></i>  CSV ile Kullanıcı Ekle</button></a>
                <a href="kullanicilistesi.php"><button class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i>  Kullanıcı Listesi</button></a></div>
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
                  <b style="color:red;">
                    <?php if ($kullanicicek['kullanici_yetki']=="Öğrenci") {echo "Öğrencilerimiz, bu sayfada değişiklik yapma yetkisine sahip değildir."; echo "<br>"."<br>";} ?></b>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim Seç <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="first-name" name="kullanici_resimyol" class="form-control col-md-7 col-xs-12">
                        <input type="hidden" name="kullanici_resimyol" value="<?php echo $kullanicicek['kullanici_resimyol']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Üyelik Tarihi <span class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="date" id="first-name" required="required" name="kullanici_tarih" value="<?php echo date('Y-m-d'); ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="time" id="first-name" required="required" name="kullanici_saat" value="<?php echo date('H:i:s'); ?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Adı <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" placeholder="Kullanıcı adını giriniz" name="kullanici_kullaniciad" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Ad Soyad <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_adsoyad"  placeholder="Kullanıcı adını ve soyadını giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Şifre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="first-name" required="required" name="kullanici_password"  placeholder="Kullanıcı şifresini giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı TC Kimlik No <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" required="required" name="kullanici_tcno"  placeholder="Kullanıcı TC kimlik numarasını giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Telefon -1 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" required="required" name="kullanici_telefon1"  placeholder="Cep telefon numarasını giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Telefon -2 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" required="required" name="kullanici_telefon2"  placeholder="Cep telefon numarasını giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı E-mail -1 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="first-name" required="required" name="kullanici_email1"  placeholder="E-mail adresini giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı E-mail -2 <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="first-name" required="required" name="kullanici_email2"  placeholder="E-mail adresini giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Kurum Numarası <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="first-name" required="required" name="kullanici_kurumno"  placeholder="Kurum numarasını giriniz" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div> 

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Kademe <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="first-name" class="form-control" name="kullanici_kademe" required>
                          <option></option>
                          <option value="Anaokulu">Anaokulu</option>
                          <option value="İlkokul">İlkokul</option>
                          <option value="Ortaokul">Ortaokul</option>
                          <option value="Anadolu Lisesi">Anadolu Lisesi</option>
                          <option value="Fen Lisesi">Fen Lisesi</option>
                          <option value="Yaz Okulu">Yaz Okulu</option>
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

                         <option></option>
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

                          <option></option>
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
                        <option></option>
                          <option value="1">Aktif</option>
                          <option value="0">Pasif</option>
                          </select>
                    </div>
                  </div>
                  



                  <?php 
                  if ($kullanicicek['kullanici_yetki']!="Öğrenci") {
                    ?>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Güncelle</button>

                  <div align="left" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 style="color: red;" class="modal-title" id="myModalLabel2">Uyarı!</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Kullanıcı adınızı ve şifrenizi sisteme giriş yaparken kullanacaksınız. <br>
                          Bu yüzden kullanıcı adınızı ve şifrenizi unutmamalısınız.</h4>
                        </div><div class="modal-body">
                          <h4>Yeni kullanıcı eklemek istiyor musunuz?</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Geri Dön & Kontrol Et</button>
                          <button type="submit" name="kullaniciekle" class="btn btn-success">Evet</button>
                        </div>

                      </div>
                    </div>
                  </div>
                        </div>
                      </div>
                    <?php } ?>
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