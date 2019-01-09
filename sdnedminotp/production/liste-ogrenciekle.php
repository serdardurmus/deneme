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
  <div class="page-title">
    <div class="title_left">
      <h3>Yeni Öğrenci Bilgisi Ekle </h3>
    </div>


  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">

        <div class="x_content">
          
          <div align="left" class="clearfix">
            <a href="liste-ogrencieklecsv.php"><button class="btn btn-info"><i class="fa fa-user" aria-hidden="true"></i>  CSV ile Öğrenci Listesi Ekle</button></a>
            <a href="liste-ogrenci.php"><button class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i>  Öğrenci Listesine Geri Dön</button></a></div>
            <div class="clearfix"></div>
            <br />
            <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
              <input type="hidden" name="ogrencilist_id" value="<?php echo $ogrencilistcek['ogrencilist_id']; ?>">
              <input type="hidden" name="ogrencilist_ad" value="<?php echo $ogrencilistcek['ogrencilist_ad']; ?>">

                  <!-- FİZİKİ DOSYAYI SİLMEK İÇİN KULLANIYORUZ
                  islem.php de UNLİNK KOMUTU YAZDIK -->
                  <input type="hidden" name="ogrencilist_resimyol" value="<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>">
                  <h2 style="color: blue;">Öğrenci Bilgisi Ekle</h2>


                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Resim Ekle <span class="required"></span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="file" id="first-name" name="ogrencilist_resimyol" class="form-control col-md-7 col-xs-12">
                      <input type="hidden" name="ogrencilist_resimyol" placeholder="<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Kullanıcı ID <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name"  name="ogrencilist_kullaniciid"  placeholder="Kullanıcı ID giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Kurum No <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_kurumno"  placeholder="Kurum No giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >TC Kimlik No <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_tcno"  placeholder="TC Kimlik No giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Sınıf & Şube  & Cinsiyet<span class="required">*</span>
                    </label>
                    <div class="col-md-1 col-sm-1 col-xs-12">
                      <select id="heard" class="form-control" name="ogrencilist_sinif" required>
                        <option></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="Hazırlık">Hazırlık</option>
                        <option value="AnadoluLisesi 9">AnadoluLisesi 9</option>
                        <option value="AnadoluLisesi 10">AnadoluLisesi 10</option>
                        <option value="AnadoluLisesi 11">AnadoluLisesi 11</option>
                        <option value="AnadoluLisesi 12">AnadoluLisesi 12</option>
                        <option value="Fen Lisesi 9">Fen Lisesi 9</option>
                        <option value="Fen Lisesi 10">Fen Lisesi 10</option>
                        <option value="Fen Lisesi 11">Fen Lisesi 11</option>
                        <option value="Fen Lisesi 12">Fen Lisesi 12</option>
                        <option value="4 Yaş">4 Yaş</option>
                        <option value="5 Yaş">5 Yaş</option>
                        <option value="6 Yaş">6 Yaş</option>
                        <option value="Yaz Okulu">Yaz Okulu</option>
                      </select>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-12">
                      <select id="heard" class="form-control" name="ogrencilist_sube" required>
                        <option></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                        <option value="I">I</option>
                        <option value="J">J</option>
                        <option value="K">K</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="N">N</option>
                        <option value="O">O</option>
                        <option value="P">P</option>
                        <option value="R">R</option>
                        <option value="S">S</option>
                        <option value="T">T</option>
                        <option value="U">U</option>
                        <option value="V">V</option>
                        <option value="Y">Y</option>
                        <option value="Z">Z</option>
                        <option value="Q">Q</option>
                        <option value="W">W</option>
                        <option value="X">X</option>
                      </select>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <select id="heard" class="form-control" name="ogrencilist_cinsiyet" required>
                        <option></option>
                        <option value="Erkek">Erkek</option>
                        <option value="Kız">Kız</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Öğrenci Ad Soyad <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_ad"  placeholder="Öğrenci Ad giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_soyad"  placeholder="Öğrenci Soyad giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Doğum Tarihi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="date" id="first-name" required="required" name="ogrencilist_dogumtarihi"  placeholder="Doğum Tarihi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Öğrenci Telefon <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_ogrencitelefon"  placeholder="Öğrenci Telefon giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Öğrenci Mail <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_ogrencimail"  placeholder="Öğrenci Mail giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <h2 style="color: blue;">Veli Bilgisi Ekle</h2>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Ad Soyad <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_veliadsoyad"  placeholder="Veli Ad Soyad giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Yakınlık <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_veliyakinlik"  placeholder="Veli Yakınlık giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Ev Adresi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velievadresi"  placeholder="Veli Ev Adresi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Telefon <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velitelefon1"  placeholder="Veli Telefon giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Meslek <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velimeslek"  placeholder="Veli Meslek giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli İş Adresi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_veliisadresi"  placeholder="Veli İş Adresi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Telefon (2) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velitelefon2"  placeholder="Veli Telefon (2) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Telefon (3)<span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velitelefon3"  placeholder="Veli Telefon (3) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Mail (1) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velimail1"  placeholder="Veli Mail (1) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Veli Mail (2)<span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_velimail2"  placeholder="Veli Mail (2) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <h2 style="color: blue;">Anne Bilgisi Ekle</h2>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Ad Soyad <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_anneadsoyad"  placeholder="Anne Ad Soyad giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Meslek <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_annemeslek"  placeholder="Anne Meslek giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Ev Adresi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_anneevadresi"  placeholder="Anne Ev Adresi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne İş Adresi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_anneisadresi"  placeholder="Anne İş Adresi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Telefon (1) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_annetelefon1"  placeholder="Anne Telefon (1) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Telefon (2) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_annetelefon2"  placeholder="Anne Telefon (2) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Mail (1) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_annemail1"  placeholder="Anne Mail (1) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Anne Mail (2)<span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_annemail2"  placeholder="Anne Mail (2) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                  <div class="ln_solid"></div>
                  <h2 style="color: blue;">Baba Bilgisi Ekle</h2>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Ad Soyad <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babaadsoyad"  placeholder="Baba Ad Soyad giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Meslek <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babameslek"  placeholder="Baba Meslek giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Ev Adresi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babaevadresi"  placeholder="Baba Ev Adresi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba İş Adresi <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babaisadresi"  placeholder="Baba İş Adresi giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Telefon (1) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babatelefon1"  placeholder="Baba Telefon (1) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Telefon (2) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babatelefon2"  placeholder="Baba Telefon (2) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Mail (1) <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babamail1"  placeholder="Baba Mail (1) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Baba Mail (2)<span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_babamail2"  placeholder="Baba Mail (2) giriniz" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <h2 style="color: blue;">Genel Bilgiler</h2>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Burs Durumu <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <input type="text" id="first-name" required="required" name="ogrencilist_ogrencibursdurumu"  placeholder="Öğrenci Burs Durumu" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Kardeş Sayısı <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <select id="heard" class="form-control" name="ogrencilist_ogrencikardessayisi" required>
                        <option></option>
                        <option value="0">0</option>                        
                        <option value="1">1</option>                        
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="10+">10+</option>
                      </select>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Lisans Durumu <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                      <select id="heard" class="form-control" name="ogrencilist_ogrencilisansdurumu" required>
                        <option></option>
                        <option value="Lisans Yok">Lisans Yok</option>                        
                        <option value="Basketbol">Basketbol</option>                        
                        <option value="Eskrim">Eskrim</option>
                        <option value="Futbol">Futbol</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Voleybol">Satranç</option>
                        <option value="Voleybol">Voleybol</option>
                        <option value="Yüzme">Yüzme</option>
                      </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div align="right" class="col-md-1 col-sm-1 col-xs-12">
                      <button type="submit" name="ogrencilistkaydet" class="btn btn-primary">Kaydet</button>
                    </div>
                  </div>
                </form>
              </div>



            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <?php 
      include 'footer.php';
      ?>
