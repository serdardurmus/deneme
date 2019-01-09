<?php 
include 'header.php';

$duyurusor=$db->prepare("select * from duyuru order by duyuru_id DESC, duyuru_kullaniciad ASC");
$duyurusor->execute();

$gorevlistsor=$db->prepare("select * from gorevlist");
$gorevlistsor->execute();
$gorevlistcek=$gorevlistsor->fetch(PDO::FETCH_ASSOC)

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>ÖĞRENCİ TAKİP PROGRAMI <br> YÖNETİM PANELİ</h3>
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
              <h2>SD Yazılım <small>Design by SD</small></h2>

              <div class="clearfix"></div>
            </div>

            <div class="x_content">


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Duyurular</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Görev Listesi</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Hakkımızda</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_title">
                            <h2>Öğrenci Takip Programı ve Okul hakkında tüm duyurular:</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">


                            <?php 

                            while ($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                              <ul class="list-unstyled msg_list">
                                <li>
                                  <a>
                                    <span class="image">
                                      <img style="width: 120px;" src="../../<?php echo $duyurucek['duyuru_kullaniciresimyol']; ?>" alt="img" />
                                    </span>
                                    <span style="font-style: italic; color: red;">Duyuru Yapan: <?php echo $duyurucek['duyuru_kullaniciad']; ?><br></span>
                                    <span class="">
                                      <?php echo $duyurucek['duyuru_duyuru']; ?>
                                    </span>
                                  </a>
                                </li>
                              </ul>
                              <?php } ?>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <div class="x_title">
                              <h2>Haftalık Görev Listesi <small style="color: red;">İşlerinizi bu listeden takip edebilirsiniz.</small></h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                             <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                              
                              <button type="submit" name="gorevlistduzenle" class="btn btn-primary btn-xs">Değişiklikleri Kaydet</button>


                              <div class="">
                                <ul class="to_do">
                                  Tüm Öğretmenler - Check List
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_1']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_1" class="flat"> Öğrenciye özel bilgileri girdim. </p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_2']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_2" class="flat"> Davranış - Gözlem bilgilerini girdim.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_3']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_3" class="flat"> Yapmam gereken DUYURULARI yaptım.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_4']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_4" class="flat"> Ev ödevlerini girdim</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_5']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_5" class="flat"> Ödev kontrollerini girdim.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_6']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_6" class="flat"> Kitap okuma bilgilerini girdim.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_7']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_7" class="flat"> Karne ve Raporlar ile girdiğim bilgileri kontrol ettim.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_8']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_8" class="flat"> Mesaj kutumu kontrol ettim.</p></li>
                                  <br>

                                  PDR Servisi - Check List
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_9']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_9" class="flat"> Rehberlik notlarını girdim</p></li>
                                  <br>

                                  İdare - Check List
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_10']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_10" class="flat"> Okul duyurularını girdim.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_11']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_11" class="flat"> Okul faaliyetlerini girdim.</p></li>
                                  <li><p><input type="checkbox" <?php if ($gorevlistcek['gorevlist_12']==1) { echo "checked";} else {echo "unchecked";} ?> name="gorevlist_12" class="flat"> Karne ve Raporlar ile karnelerin genel kontrollerini yaptım.</p></li>
                                </ul>
                              </div></form>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>Öğrenci Takip programı V1.0</p>
                            <p>İletişim: sdyazili@gmail.com</p>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
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