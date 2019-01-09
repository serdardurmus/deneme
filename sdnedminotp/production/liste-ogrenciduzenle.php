<?php 
include 'header.php';

include '../netting/baglan.php';

$ogrencilistsor=$db->prepare("SELECT * from ogrencilist where ogrencilist_id=:ogrencilist_id");
  $ogrencilistsor->execute(array(
    'ogrencilist_id' =>$_GET['ogrencilist_id']
    ));
$ogrencilistcek=$ogrencilistsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Öğrenci Bilgileri Düzenleme</h3>
      </div>

      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Düzenlenecek Kişi: <?php echo $ogrencilistcek['ogrencilist_ad']; ?>&nbsp<?php echo $ogrencilistcek['ogrencilist_soyad']; ?> | Sınıfı: <?php echo $ogrencilistcek['ogrencilist_sinif']; ?><?php echo $ogrencilistcek['ogrencilist_sube']; ?><small>
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



                    <input type="hidden" name="ogrencilist_id" value="<?php echo $ogrencilistcek['ogrencilist_id']; ?>">
                    <input type="hidden" name="ogrencilist_ad" value="<?php echo $ogrencilistcek['ogrencilist_ad']; ?>">

                  <!-- FİZİKİ DOSYAYI SİLMEK İÇİN KULLANIYORUZ
                  islem.php de UNLİNK KOMUTU YAZDIK -->
                  <input type="hidden" name="ogrencilist_resimyol" value="<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>">
                    <h2 style="color: blue;">Öğrenci Bilgileri</h2>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Mevcut Öğrenci Resmi <span class="required"></span>
                      </label>

                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <?php 
                        if (strlen($ogrencilistcek['ogrencilist_resimyol'])>0) { ?>
                        <img width="150px" src="../../<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>">

                        <?php } else { ?>
                        <img width="150px" src="../../sdimg/ogrenci/logoyok.png">
                        <?php } ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Resim Değiştir <span class="required"></span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="file" id="first-name" name="ogrencilist_resimyol" class="form-control col-md-7 col-xs-12">
                        <input type="hidden" name="ogrencilist_resimyol" value="<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Kullanıcı ID <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_kullaniciid"  value="<?php echo $ogrencilistcek['ogrencilist_kullaniciid']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Kurum No <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_kurumno"  value="<?php echo $ogrencilistcek['ogrencilist_kurumno']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >TC Kimlik No <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_tcno"  value="<?php echo $ogrencilistcek['ogrencilist_tcno']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Sınıf & Şube  & Cinsiyet<span class="required">*</span>
                      </label>
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_sinif"  value="<?php echo $ogrencilistcek['ogrencilist_sinif']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-1 col-sm-1 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_sube"  value="<?php echo $ogrencilistcek['ogrencilist_sube']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_cinsiyet"  value="<?php echo $ogrencilistcek['ogrencilist_cinsiyet']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Öğrenci Ad Soyad <span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_ad"  value="<?php echo $ogrencilistcek['ogrencilist_ad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_soyad"  value="<?php echo $ogrencilistcek['ogrencilist_soyad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Doğum Tarihi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="date" id="first-name" required="required" name="ogrencilist_dogumtarihi"  value="<?php echo $ogrencilistcek['ogrencilist_dogumtarihi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Öğrenci Telefon <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_ogrencitelefon"  value="<?php echo $ogrencilistcek['ogrencilist_ogrencitelefon']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Öğrenci Mail <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_ogrencimail"  value="<?php echo $ogrencilistcek['ogrencilist_ogrencimail']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <h2 style="color: blue;">Veli Bilgileri</h2>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Ad Soyad <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_veliadsoyad"  value="<?php echo $ogrencilistcek['ogrencilist_veliadsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Yakınlık <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_veliyakinlik"  value="<?php echo $ogrencilistcek['ogrencilist_veliyakinlik']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Ev Adresi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velievadresi"  value="<?php echo $ogrencilistcek['ogrencilist_velievadresi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Telefon <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velitelefon1"  value="<?php echo $ogrencilistcek['ogrencilist_velitelefon1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Meslek <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velimeslek"  value="<?php echo $ogrencilistcek['ogrencilist_velimeslek']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli İş Adresi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_veliisadresi"  value="<?php echo $ogrencilistcek['ogrencilist_veliisadresi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Telefon (2) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velitelefon2"  value="<?php echo $ogrencilistcek['ogrencilist_velitelefon2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Telefon (3)<span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velitelefon3"  value="<?php echo $ogrencilistcek['ogrencilist_velitelefon3']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Mail (1) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velimail1"  value="<?php echo $ogrencilistcek['ogrencilist_velimail1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Mail (2)<span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_velimail2"  value="<?php echo $ogrencilistcek['ogrencilist_velimail2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>


                    <div class="ln_solid"></div>
                    <h2 style="color: blue;">Anne Bilgileri</h2>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Ad Soyad <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_anneadsoyad"  value="<?php echo $ogrencilistcek['ogrencilist_anneadsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Meslek <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_annemeslek"  value="<?php echo $ogrencilistcek['ogrencilist_annemeslek']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Ev Adresi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_anneevadresi"  value="<?php echo $ogrencilistcek['ogrencilist_anneevadresi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne İş Adresi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_anneisadresi"  value="<?php echo $ogrencilistcek['ogrencilist_anneisadresi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Telefon (1) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_annetelefon1"  value="<?php echo $ogrencilistcek['ogrencilist_annetelefon1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Telefon (2) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_annetelefon2"  value="<?php echo $ogrencilistcek['ogrencilist_annetelefon2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Mail (1) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_annemail1"  value="<?php echo $ogrencilistcek['ogrencilist_annemail1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Mail (2)<span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_annemail2"  value="<?php echo $ogrencilistcek['ogrencilist_annemail2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    

                    <div class="ln_solid"></div>
                    <h2 style="color: blue;">Baba Bilgileri</h2>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Ad Soyad <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babaadsoyad"  value="<?php echo $ogrencilistcek['ogrencilist_babaadsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Meslek <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babameslek"  value="<?php echo $ogrencilistcek['ogrencilist_babameslek']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Ev Adresi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babaevadresi"  value="<?php echo $ogrencilistcek['ogrencilist_babaevadresi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba İş Adresi <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babaisadresi"  value="<?php echo $ogrencilistcek['ogrencilist_babaisadresi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Telefon (1) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babatelefon1"  value="<?php echo $ogrencilistcek['ogrencilist_babatelefon1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Telefon (2) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babatelefon2"  value="<?php echo $ogrencilistcek['ogrencilist_babatelefon2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Mail (1) <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babamail1"  value="<?php echo $ogrencilistcek['ogrencilist_babamail1']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Mail (2)<span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_babamail2"  value="<?php echo $ogrencilistcek['ogrencilist_babamail2']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <h2 style="color: blue;">Genel Bilgiler</h2>
                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Burs Durumu <span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_ogrencibursdurumu"  value="<?php echo $ogrencilistcek['ogrencilist_ogrencibursdurumu']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Kardeş Sayısı <span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_ogrencikardessayisi"  value="<?php echo $ogrencilistcek['ogrencilist_ogrencikardessayisi']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" >Lisans Durumu <span class="required">*</span>
                      </label>
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="text" id="first-name" required="required" name="ogrencilist_ogrencilisansdurumu"  value="<?php echo $ogrencilistcek['ogrencilist_ogrencilisansdurumu']; ?>" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                 
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-4 col-sm-4 col-xs-12 col-md-offset-3">
                        <button type="submit" name="ogrencilistduzenleme" class="btn btn-primary">Vazgeç</button>
                        <button type="submit" name="ogrencilistduzenle" class="btn btn-success">Güncelle</button>
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