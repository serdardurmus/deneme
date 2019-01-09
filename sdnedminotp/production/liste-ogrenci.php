<?php 
include 'header.php';

include '../netting/baglan.php';

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $ogrencilistsor=$db->prepare("select * from ogrencilist where ogrencilist_tcno LIKE '%$aranan%' order by ogrencilist_ad ASC, ogrencilist_soyad ASC");
  $ogrencilistsor->execute();
  $say=$ogrencilistsor->rowCount();
  $geridon=1;

} else {

  $ogrencilistsor=$db->prepare("select * from ogrencilist order by ogrencilist_ad ASC, ogrencilist_soyad ASC");
  $ogrencilistsor->execute();
  $say=$ogrencilistsor->rowCount();
  $geridon=0;

}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Kurum Öğrenci/Veli Listesi</h3>
      </div>

      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <small>
                <?php
                if ($_GET['durum']=='ok') { ?>
                <b style="color:green;">Güncelleme Başarılı...</b>
                <?php } elseif ($_GET['durum']=='no') { ?> 
                <b style="color:red;">Güncelleme Yapılamadı...</b>
                <?php } ?></small>
                <div align="right" class="clearfix">
                <a href="liste-ogrencieklecsv.php"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>  CSV ile Çoklu Kullanıcı Ekle</button></a>
                <a href="liste-ogrenciekle.php"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Kullanıcı Ekle</button></a></div>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div class="table-responsive">
                  <table  id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr class="headings">

                        <th width="120" class="column-title">Öğrenci Resmi </th>
                        <th class="column-title">TC Kimlik No </th>
                        <th class="column-title">Sınıf </th>
                        <th class="column-title">Şb. </th>
                        <th class="column-title">C. </th>
                        <th class="column-title">Ad </th>
                        <th class="column-title">Soyad</th>
                        <th class="column-title">Velisi</th>
                        <th class="column-title">Yakınlık</th>

                        <!-- GİZLİ SÜTUNLAR-->
                        <th class="column-title hidden">Kurum No</th>
                        <th class="column-title hidden">Doğum Tarihi</th>
                        <th class="column-title hidden">Öğrenci Telefon</th>
                        <th class="column-title hidden">Öğrenci Mail</th>
                        <th class="column-title hidden">Veli Meslek</th>
                        <th class="column-title hidden">Veli Ev Adresi</th>
                        <th class="column-title hidden">Veli İş Adresi</th>
                        <th class="column-title hidden">Veli Telefon 1</th>
                        <th class="column-title hidden">Veli Telefon 2</th>
                        <th class="column-title hidden">Veli Telefon 3</th>
                        <th class="column-title hidden">Veli Mail 1</th>
                        <th class="column-title hidden">Veli Mail 2</th>
                        <th class="column-title hidden">Anne Ad Soyad</th>
                        <th class="column-title hidden">Anne Meslek</th>
                        <th class="column-title hidden">Anne Ev Adresi</th>
                        <th class="column-title hidden">Anne İş Adresi</th>
                        <th class="column-title hidden">Anne Telefon 1</th>
                        <th class="column-title hidden">Anne Telefon 2</th>
                        <th class="column-title hidden">Anne Mail 1</th>
                        <th class="column-title hidden">Anne Mail 2</th>
                        <th class="column-title hidden">Baba Ad Soyad</th>
                        <th class="column-title hidden">Baba Meslek</th>
                        <th class="column-title hidden">Baba Ev Adresi</th>
                        <th class="column-title hidden">Baba İş Adresi</th>
                        <th class="column-title hidden">Baba Telefon 1</th>
                        <th class="column-title hidden">Baba Telefon 2</th>
                        <th class="column-title hidden">Baba Mail 1</th>
                        <th class="column-title hidden">Baba Mail 2</th>
                        <th class="column-title hidden">Öğrenci Burs Durumu</th>
                        <th class="column-title hidden">Öğrenci Kardeş Sayısı</th>
                        <th class="column-title hidden">Öğrenci Lisans Durumu</th>
                        <th class="column-title hidden">Yedek Veri 1</th>
                        <th class="column-title hidden">Yedek Veri 2</th>
                        <!-- GİZLİ SÜTUNLAR-->


                        <th width="50" class="column-title">Düzenle</th>
                        <th width="20" class="column-title">Sil </th>

                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                      
                      while ($ogrencilistcek=$ogrencilistsor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr >
                          
                          <td class=" "><img width="150px" src="../../<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>"></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_tcno']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_sinif']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_sube']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_cinsiyet']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_ad']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_soyad']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_veliadsoyad']; ?></td>
                          <td class=" "><?php echo $ogrencilistcek['ogrencilist_veliyakinlik']; ?></td>

                          <!-- GİZLİ SÜTUNLAR-->
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_kurumno']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_dogumtarihi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_ogrencitelefon']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_ogrencimail']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velimeslek']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velievadresi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_veliisadresi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velitelefon1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velitelefon2']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velitelefon3']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velimail1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_velimail2']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_anneadsoyad']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_annemeslek']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_anneevadresi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_anneisadresi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_annetelefon1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_annetelefon2']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_annemail1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_annemail2']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babaadsoyad']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babameslek']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babaevadresi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babaisadresi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babatelefon1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babatelefon2']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babamail1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_babamail2']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_ogrencibursdurumu']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_ogrencikardessayisi']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_ogrencilisansdurumu']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_yedek1']; ?></td>
                          <td class="hidden"><?php echo $ogrencilistcek['ogrencilist_yedek2']; ?></td>
                          <!-- GİZLİ SÜTUNLAR-->

                           <td class=""><a href="liste-ogrenciduzenle.php?ogrencilist_id=<?php echo $ogrencilistcek['ogrencilist_id']; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>

                           <td class=""><a href="../netting/islem.php?ogrencilistsil=ok&ogrencilist_id=<?php echo $ogrencilistcek['ogrencilist_id']; ?>&ogrencilist_resimyol=<?php echo $ogrencilistcek['ogrencilist_resimyol']; ?>""><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Sil</button></a></td>



                         </tr>
                         <?php } ?>
                       </tbody>
                     </table>
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