<?php 
include 'header.php';

include '../netting/baglan.php';

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $duyurusor=$db->prepare("select * from duyuru where duyuru_kullaniciad LIKE '%$aranan%' order by duyuru_kullaniciad ASC, duyuru_id ASC");
  $duyurusor->execute();
  $say=$duyurusor->rowCount();
  $geridon=1;

} else {

  $duyurusor=$db->prepare("select * from duyuru order by duyuru_kullaniciad ASC, duyuru_id ASC");
  $duyurusor->execute();
  $say=$duyurusor->rowCount();
  $geridon=0;

}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Duyuru Listesi</h3>
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
                <a href="duyuru.php"><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>  Yeni Duyuru Ekle</button></a></div>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div class="table-responsive">
                  <table  id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr class="headings">

                        <th width="100" class="column-title">Duyuruyu Yapan </th>
                        <th width="110" class="column-title">Kullanıcı ID </th>
                        <th width="120" class="column-title">Kullanıcı Ad Soyad </th>
                        <th class="column-title">Duyuru </th>
                        


                        <th width="50" class="column-title">Düzenle</th>
                        <th width="20" class="column-title">Sil </th>

                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                      
                      while ($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr >
                          
                          <td class=" "><img width="120px" src="../../<?php echo $duyurucek['duyuru_kullaniciresimyol']; ?>"></td>
                          <td class=" "><?php echo $duyurucek['duyuru_kullaniciid']; ?></td>
                          <td class=" "><?php echo $duyurucek['duyuru_kullaniciad']; ?></td>
                          <td class=" "><?php echo $duyurucek['duyuru_duyuru']; ?></td>
                          

                           <td class=""><a href="duyuruduzenle.php?duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>

                           <td class=""><a href="../netting/islem.php?duyurusil=ok&duyuru_id=<?php echo $duyurucek['duyuru_id']; ?>""><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> Sil</button></a></td>



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