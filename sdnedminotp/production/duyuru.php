<?php 
include 'header.php';
 ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>ÖĞRENCİ TAKİP PROGRAMI <br> DUYURU İŞLEMLERİ</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
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
                <div align="right" class="clearfix"><a href="duyurulistesi.php"><button class="btn btn-success"><i class="fa fa-list" aria-hidden="true"></i>  Duyuru Listesi</button></a></div>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı ID <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" required="required" name="kullanici_id"  value="<?php echo $kullanicicek['kullanici_id']; ?>" class="form-control col-md-7 col-xs-12">
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Duyuru <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="col-md-12 col-sm-12 col-xs-12" name="duyuru_duyuru" placeholder="Duyurunuzu giriniz. (max.3000 karakter)"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Duyurunun Gösterileceği Yerler <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_admin" checked /> Admin
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_yonetici" checked /> Yöneticiler
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_ogretmen"  /> Öğretmenler
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_veli"  /> Veliler
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_ogrenci"  /> Öğrenciler
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_personel"  /> Muhasebe
                            </label>
                          </div>
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="duyuru_muhasebe"  /> Personel
                            </label>
                          </div>
                        </div>
                    </div>
                    

                 
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="duyuruvazgec" class="btn btn-primary">Vazgeç</button>
                        <button type="submit" name="duyuruekle" class="btn btn-success">Duyuruyu Gir</button>
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