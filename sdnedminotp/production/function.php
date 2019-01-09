<?php 

ob_start();
session_start();

$ipadres=$_SERVER['REMOTE_ADDR'];
$site=$_SERVER["HTTP_HOST"];


$lisans="localhost";
// Bir sitem varsa: $lisans="serdardurmus.com.tr";   şeklinde yazılacak. başında HTTP OLMAYACA!!!!!!!!


if ($lisans!=$site) { header('Location:lisanssorunu.php'); ?>
	
	<center><b style="color: red;">Lisanssız site.</b></center>
	<center><b style="color: red;">İP Adresiniz (<?php echo $ipadres; ?>) tarafımızca kaydedilmiştir.</b></center>
<?php }




$footer="footer.php";
$footerboyut=filesize($footer);


if ($footerboyut!=5497) {  ?>
	
	<center><b style="color: red;">Lisanssız site.</b></center>
	<center><b style="color: red;">Footer değiştirilmiş. Eski haline geri getiriniz.</b></center>
<?php }


/*
function giriskontrol() {

	$admin_kadi=$_SESSION['admin_kadi'];

	$adminsor=mysql_query("select * from admin where admin_kadi='$admin_kadi'");
	$adminsay=mysql_num_rows($adminsor);

	if ($adminsay==0) {
		header('Location: login.php');
	}

}

function yetkikontrol() {

	$admin_kadi=$_SESSION['admin_kadi'];

	$adminsor=mysql_query("select * from admin where admin_kadi='$admin_kadi' and admin_yetki='0'");
	$adminsay=mysql_num_rows($adminsor);

	if ($adminsay==0) {
		header('Location: yetkiyok.php');
	}
}

*/
function seo($s) {
	$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',' ',',','?');
	$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
	$s = str_replace($tr,$eng,$s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = preg_replace('/#/', '', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}


function tcevir($tarih){

	$tr = explode("-", $tarih);
	$tarih1 = $tr[2]."-".$tr[1]."-".$tr[0];
	return $tarih1;
}


 ?>