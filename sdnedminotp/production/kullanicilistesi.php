<?php 
include 'header.php';

include '../netting/baglan.php';

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $kullanicisor=$db->prepare("select * from kullanici where kullanici_adsoyad LIKE '%$aranan%' order by kullanici_kullaniciad ASC, kullanici_adsoyad ASC");
  $kullanicisor->execute();
  $say=$kullanicisor->rowCount();
  $geridon=1;

} else {

  $kullanicisor=$db->prepare("select * from kullanici order by kullanici_kullaniciad ASC, kullanici_adsoyad ASC");
  $kullanicisor->execute();
  $say=$kullanicisor->rowCount();
  $geridon=0;

}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Kurum Kullanıcı Listesi</h3>
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
                <div align="right" class="clearfix"><a href="yenikullanici.php"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Kullanıcı Ekle</button></a></div>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div class="table-responsive">
                  <table  id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr class="headings">

                        <th class="column-title">Kullanıcı ID </th>
                        <th class="column-title">TC Kimlik No </th>
                        <th class="column-title">Kullanıcı Adı </th>
                        <th class="column-title">Kullanıcı Ad Soyad </th>
                        <th class="column-title">Kullanıcı Yetkisi </th>
                        <th class="column-title">Durum </th>
                        <th width="50" class="column-title">Şifre Değiştir</th>
                        <th width="50" class="column-title">Düzenle</th>
                        <th width="20" class="column-title">Sil </th>

                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                      
                      while ($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr >
                          
                          <td class=" "><?php echo $kullanicicek['kullanici_id']; ?></td>
                          <td class=" "><?php echo $kullanicicek['kullanici_tcno']; ?></td>
                          <td class=" "><?php echo $kullanicicek['kullanici_kullaniciad']; ?></td>
                          <td class=" "><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
                          <td class=" "><?php echo $kullanicicek['kullanici_yetki']; ?></td>
                          <td class="text-left"><?php
                          if ($kullanicicek['kullanici_durum']=="1") {echo "AKTİF"; } else {echo "PASİF";} ?></td>
                                                     
                           <td class=""><a href="kullanici-sifreduzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Şifre Değiştir</button></a></td>

                           <td class=""><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>

                           <td class=""><a href="../netting/islem.php?kullanicisil=ok&kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanici_resimyol=<?php echo $kullanicicek['kullanici_resimyol']; ?>""><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Sil</button></a></td>



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