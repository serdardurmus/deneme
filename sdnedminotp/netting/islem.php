<?php 
ob_start();
session_start();
include 'baglan.php';





// BURASI LOGİNİ KONTROL EDEN KOD BLOĞU
if (isset($_POST['loggin'])) {
	
	$kullanici_kullaniciad=$_POST['kullanici_kullaniciad'];
	$kullanici_password=md5($_POST['kullanici_password']);

	if ($kullanici_kullaniciad && $kullanici_password) {
		
		$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_kullaniciad	=:kullanici_kullaniciad	 and kullanici_password=:kullanici_password");
		$kullanicisor->execute(array(
			'kullanici_kullaniciad' => $kullanici_kullaniciad,
			'kullanici_password' => $kullanici_password
			));
		$say=$kullanicisor->rowCount();

		if ($say>0) {
			$_SESSION['kullanici_kullaniciad']=$kullanici_kullaniciad;
			header('Location:../production/index.php');
		} else {header('Location:../production/login.php?durum=no');}
	}
}












// BURASI KULLANICI DÜZENLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['kullanicikaydet'])) {

	if ($_FILES['kullanici_resimyol']["size"] > 0) {
		$uploads_dir='../../sdimg/kullanici';
		@$tmp_name=$_FILES['kullanici_resimyol']["tmp_name"];
		@$name=$_FILES['kullanici_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE kullanici SET
			kullanici_kullaniciad=:kullanici_kullaniciad,
			kullanici_tcno=:kullanici_tcno,
			kullanici_telefon1=:kullanici_telefon1,
			kullanici_telefon2=:kullanici_telefon2,
			kullanici_email1=:kullanici_email1,
			kullanici_email2=:kullanici_email2,
			kullanici_kurumno=:kullanici_kurumno,
			kullanici_kademe=:kullanici_kademe,
			kullanici_brans=:kullanici_brans,
			kullanici_adsoyad=:adsoyad,
			kullanici_yetki=:yetki,
			kullanici_durum=:durum,
			kullanici_resimyol=:resimyol
			WHERE kullanici_id={$_POST['kullanici_id']}");

		$update=$duzenle->execute(array(
			'kullanici_kullaniciad' => $_POST['kullanici_kullaniciad'],
			'kullanici_tcno' => $_POST['kullanici_tcno'],
			'kullanici_telefon1' => $_POST['kullanici_telefon1'],
			'kullanici_telefon2' => $_POST['kullanici_telefon2'],
			'kullanici_email1' => $_POST['kullanici_email1'],
			'kullanici_email2' => $_POST['kullanici_email2'],
			'kullanici_kurumno' => $_POST['kullanici_kurumno'],
			'kullanici_kademe' => $_POST['kullanici_kademe'],
			'kullanici_brans' => $_POST['kullanici_brans'],
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'yetki' => $_POST['kullanici_yetki'],
			'durum' => $_POST['kullanici_durum'],
			'resimyol' => $refimgyol
			));
		$kullanici_id=$_POST['kullanici_id']; 
		if ($update) {
			
			$resimsilunlink=$_POST['kullanici_resimyol']; //fiziki dosyayı silmek için gerekli kod
			unlink("../../$resimsilunlink");				//fiziki dosyayı silmek için gerekli kod
			header("Location:../production/kullanici-profil.php?kullanici_id=$kullanici_id&durum=ok");

		} else {header("Location:../production/kullanici-profil.php?$kullanici_id&durum=no");}


	}  else {
		$duzenle=$db->prepare("UPDATE kullanici SET
			kullanici_kullaniciad=:kullanici_kullaniciad,
			kullanici_tcno=:kullanici_tcno,
			kullanici_telefon1=:kullanici_telefon1,
			kullanici_telefon2=:kullanici_telefon2,
			kullanici_email1=:kullanici_email1,
			kullanici_email2=:kullanici_email2,
			kullanici_kurumno=:kullanici_kurumno,
			kullanici_kademe=:kullanici_kademe,
			kullanici_brans=:kullanici_brans,
			kullanici_adsoyad=:adsoyad,
			kullanici_yetki=:yetki,
			kullanici_durum=:durum
			WHERE kullanici_id={$_POST['kullanici_id']}");

		$update=$duzenle->execute(array(
			'kullanici_kullaniciad' => $_POST['kullanici_kullaniciad'],
			'kullanici_tcno' => $_POST['kullanici_tcno'],
			'kullanici_telefon1' => $_POST['kullanici_telefon1'],
			'kullanici_telefon2' => $_POST['kullanici_telefon2'],
			'kullanici_email1' => $_POST['kullanici_email1'],
			'kullanici_email2' => $_POST['kullanici_email2'],
			'kullanici_kurumno' => $_POST['kullanici_kurumno'],
			'kullanici_kademe' => $_POST['kullanici_kademe'],
			'kullanici_brans' => $_POST['kullanici_brans'],
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'yetki' => $_POST['kullanici_yetki'],
			'durum' => $_POST['kullanici_durum']
			));
		$kullanici_id=$_POST['kullanici_id']; 
		if ($update) {
			header("Location:../production/kullanici-profil.php?kullanici_id=$kullanici_id&durum=ok");
		} else {header("Location:../production/kullanici-profil.php?$kullanici_id&durum=no");}
	}


}









// BURASI KULLANICI AYARLARI DÜZENLEMEDEN!!! İNDEX.PHP YE GERİ DÖNEN BUTONUDUR
if (isset($_POST['kullanicivazgec'])) {
	
	header("Location:../production/index.php?durum=no");	
}

// BURASI KULLANICI AYARLARI DÜZENLEMEDEN!!! İNDEX.PHP YE GERİ DÖNEN BUTONUDUR
if (isset($_POST['sifredegistirmeyok'])) {
	
	header("Location:../production/index.php?durum=no");	
}


// BURASI KULLANICI DÜZENLEMEDEN!!! kullanicilistesi.php YE GERİ DÖNEN BUTONUDUR
if (isset($_POST['kullaniciduzenleme'])) {
	
	header("Location:../production/kullanicilistesi.php?durum=no");	
}



// BURASI KULLANICI ŞİFRESİ DEĞİŞTİRMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['sifredegistir'])) {

	$kullanici_password=$_POST['kullanici_password'];
	$sifre2=$_POST['sifre2'];
	if (strlen($kullanici_password) ==0) {
		header("Location:../production/sifredegistir.php?$kullanici_id&durum=no");
	}
	elseif ($kullanici_password==$sifre2) {
		
		$kullanici_password=md5($_POST['kullanici_password']);
		$ayarkaydet=$db->prepare("UPDATE kullanici SET

			kullanici_password=:kullanici_password
			WHERE kullanici_id={$_POST['kullanici_id']}");

		$update=$ayarkaydet->execute(array(

			'kullanici_password' => $kullanici_password
			));
		$kullanici_id=$_POST['kullanici_id'];
		if ($update) {
			header("Location:../production/sifredegistir.php?kullanici_id=$kullanici_id&durum=ok");
		} else {header("Location:../production/sifredegistir.php?$kullanici_id&durum=no");}


	} elseif ($kullanici_password!=$sifre2) {
		header("Location:../production/sifredegistir.php?$kullanici_id&durum=no");
	}

}






// BURASI KULLANICI EKLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['kullaniciekle'])) {

	if ($_FILES['kullanici_resimyol']["size"] > 0) {
		$uploads_dir='../../sdimg/kullanici';
		@$tmp_name=$_FILES['kullanici_resimyol']["tmp_name"];
		@$name=$_FILES['kullanici_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$tarih=$_POST['kullanici_tarih'];
		$saat=$_POST['kullanici_saat'];
		$zaman=$tarih." ".$saat;
		$password=md5($_POST['kullanici_password']);
		$kaydet=$db->prepare("INSERT INTO kullanici SET
			kullanici_kullaniciad=:kullanici_kullaniciad,
			kullanici_zaman=:kullanici_zaman,
			kullanici_password=:kullanici_password,
			kullanici_tcno=:kullanici_tcno,
			kullanici_telefon1=:kullanici_telefon1,
			kullanici_telefon2=:kullanici_telefon2,
			kullanici_email1=:kullanici_email1,
			kullanici_email2=:kullanici_email2,
			kullanici_kurumno=:kullanici_kurumno,
			kullanici_kademe=:kullanici_kademe,
			kullanici_brans=:kullanici_brans,
			kullanici_adsoyad=:adsoyad,
			kullanici_yetki=:yetki,
			kullanici_durum=:durum,
			kullanici_resimyol=:resimyol
			");

		$insert=$kaydet->execute(array(
			'kullanici_kullaniciad' => $_POST['kullanici_kullaniciad'],
			'kullanici_zaman' => $zaman,
			'kullanici_password' => $password,
			'kullanici_tcno' => $_POST['kullanici_tcno'],
			'kullanici_telefon1' => $_POST['kullanici_telefon1'],
			'kullanici_telefon2' => $_POST['kullanici_telefon2'],
			'kullanici_email1' => $_POST['kullanici_email1'],
			'kullanici_email2' => $_POST['kullanici_email2'],
			'kullanici_kurumno' => $_POST['kullanici_kurumno'],
			'kullanici_kademe' => $_POST['kullanici_kademe'],
			'kullanici_brans' => $_POST['kullanici_brans'],
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'yetki' => $_POST['kullanici_yetki'],
			'durum' => $_POST['kullanici_durum'],
			'resimyol' => $refimgyol
			));

		if ($insert) {
			header("Location:../production/yenikullanici.php?durum=ok");
		} else {header("Location:../production/yenikullanici.php?durum=no");}


	} else {
		$tarih=$_POST['kullanici_tarih'];
		$saat=$_POST['kullanici_saat'];
		$zaman=$tarih." ".$saat;
		$refimgyol="sdimg\kullanici\logoyok.png";
		$password=md5($_POST['kullanici_password']);
		$kaydet=$db->prepare("INSERT INTO kullanici SET
			kullanici_kullaniciad=:kullanici_kullaniciad,
			kullanici_zaman=:kullanici_zaman,
			kullanici_password=:kullanici_password,
			kullanici_tcno=:kullanici_tcno,
			kullanici_telefon1=:kullanici_telefon1,
			kullanici_telefon2=:kullanici_telefon2,
			kullanici_email1=:kullanici_email1,
			kullanici_email2=:kullanici_email2,
			kullanici_kurumno=:kullanici_kurumno,
			kullanici_kademe=:kullanici_kademe,
			kullanici_brans=:kullanici_brans,
			kullanici_adsoyad=:adsoyad,
			kullanici_yetki=:yetki,
			kullanici_durum=:durum,
			kullanici_resimyol=:resimyol
			");

		$insert=$kaydet->execute(array(
			'kullanici_kullaniciad' => $_POST['kullanici_kullaniciad'],
			'kullanici_zaman' => $zaman,
			'kullanici_password' => $password,
			'kullanici_tcno' => $_POST['kullanici_tcno'],
			'kullanici_telefon1' => $_POST['kullanici_telefon1'],
			'kullanici_telefon2' => $_POST['kullanici_telefon2'],
			'kullanici_email1' => $_POST['kullanici_email1'],
			'kullanici_email2' => $_POST['kullanici_email2'],
			'kullanici_kurumno' => $_POST['kullanici_kurumno'],
			'kullanici_kademe' => $_POST['kullanici_kademe'],
			'kullanici_brans' => $_POST['kullanici_brans'],
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'yetki' => $_POST['kullanici_yetki'],
			'durum' => $_POST['kullanici_durum'],
			'resimyol' => $refimgyol
			));

		if ($insert) {
			header("Location:../production/yenikullanici.php?durum=ok");
		} else {header("Location:../production/yenikullanici.php?durum=no");}

	}

}






// BURASI KULLANICI DÜZENLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['kullaniciduzenle'])) {

	if ($_FILES['kullanici_resimyol']["size"] > 0) {
		$uploads_dir='../../sdimg/kullanici';
		@$tmp_name=$_FILES['kullanici_resimyol']["tmp_name"];
		@$name=$_FILES['kullanici_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE kullanici SET
			kullanici_kullaniciad=:kullanici_kullaniciad,
			kullanici_tcno=:kullanici_tcno,
			kullanici_telefon1=:kullanici_telefon1,
			kullanici_telefon2=:kullanici_telefon2,
			kullanici_email1=:kullanici_email1,
			kullanici_email2=:kullanici_email2,
			kullanici_kurumno=:kullanici_kurumno,
			kullanici_kademe=:kullanici_kademe,
			kullanici_brans=:kullanici_brans,
			kullanici_adsoyad=:adsoyad,
			kullanici_yetki=:yetki,
			kullanici_durum=:durum,
			kullanici_resimyol=:resimyol
			WHERE kullanici_id={$_POST['kullanici_id']}");

		$update=$duzenle->execute(array(
			'kullanici_kullaniciad' => $_POST['kullanici_kullaniciad'],
			'kullanici_tcno' => $_POST['kullanici_tcno'],
			'kullanici_telefon1' => $_POST['kullanici_telefon1'],
			'kullanici_telefon2' => $_POST['kullanici_telefon2'],
			'kullanici_email1' => $_POST['kullanici_email1'],
			'kullanici_email2' => $_POST['kullanici_email2'],
			'kullanici_kurumno' => $_POST['kullanici_kurumno'],
			'kullanici_kademe' => $_POST['kullanici_kademe'],
			'kullanici_brans' => $_POST['kullanici_brans'],
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'yetki' => $_POST['kullanici_yetki'],
			'durum' => $_POST['kullanici_durum'],
			'resimyol' => $refimgyol
			));
		$kullanici_id=$_POST['kullanici_id']; 
		if ($update) {
			
			$resimsilunlink=$_POST['kullanici_resimyol']; //fiziki dosyayı silmek için gerekli kod
			unlink("../../$resimsilunlink");				//fiziki dosyayı silmek için gerekli kod
			header("Location:../production/kullanicilistesi.php?kullanici_id=$kullanici_id&durum=ok");

		} else {header("Location:../production/kullanicilistesi.php?$kullanici_id&durum=no");}


	}  else {
		$duzenle=$db->prepare("UPDATE kullanici SET
			kullanici_kullaniciad=:kullanici_kullaniciad,
			kullanici_tcno=:kullanici_tcno,
			kullanici_telefon1=:kullanici_telefon1,
			kullanici_telefon2=:kullanici_telefon2,
			kullanici_email1=:kullanici_email1,
			kullanici_email2=:kullanici_email2,
			kullanici_kurumno=:kullanici_kurumno,
			kullanici_kademe=:kullanici_kademe,
			kullanici_brans=:kullanici_brans,
			kullanici_adsoyad=:adsoyad,
			kullanici_yetki=:yetki,
			kullanici_durum=:durum
			WHERE kullanici_id={$_POST['kullanici_id']}");

		$update=$duzenle->execute(array(
			'kullanici_kullaniciad' => $_POST['kullanici_kullaniciad'],
			'kullanici_tcno' => $_POST['kullanici_tcno'],
			'kullanici_telefon1' => $_POST['kullanici_telefon1'],
			'kullanici_telefon2' => $_POST['kullanici_telefon2'],
			'kullanici_email1' => $_POST['kullanici_email1'],
			'kullanici_email2' => $_POST['kullanici_email2'],
			'kullanici_kurumno' => $_POST['kullanici_kurumno'],
			'kullanici_kademe' => $_POST['kullanici_kademe'],
			'kullanici_brans' => $_POST['kullanici_brans'],
			'adsoyad' => $_POST['kullanici_adsoyad'],
			'yetki' => $_POST['kullanici_yetki'],
			'durum' => $_POST['kullanici_durum']
			));
		$kullanici_id=$_POST['kullanici_id']; 
		if ($update) {
			header("Location:../production/kullanicilistesi.php?kullanici_id=$kullanici_id&durum=ok");
		} else {header("Location:../production/kullanicilistesi.php?$kullanici_id&durum=no");}
	}


}






// BURASI KULLANICI SİLMEYE YARAYAN KOD BLOĞUDUR.
if ($_GET['kullanicisil']=="ok") {
	
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");
	$kontrol=$sil->execute(array(
		'kullanici_id' =>$_GET['kullanici_id']
		));
	if ($kontrol) {
		$resimsilunlink=$_GET['kullanici_resimyol'];  //fiziki dosyayı silmek için gerekli kod
		unlink("../../$resimsilunlink");			//fiziki dosyayı silmek için gerekli kod
		header("Location:../production/kullanicilistesi.php?durum=ok");
	} else {header("Location:../production/kullanicilistesi.php?durum=no");}
}






// BURASI KULLANICI ŞİFRE DEĞİŞTİRMEME
if (isset($_POST['kullanicisifredegistirmeyok'])) {
	
	header("Location:../production/kullanicilistesi.php?durum=no");	
}






// BURASI KULLANICI ŞİFRESİ DEĞİŞTİRMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['kullanicisifredegistir'])) {
	$kullanici_id=$_POST['kullanici_id'];
	$kullanici_password=$_POST['kullanici_password'];
	$sifre2=$_POST['sifre2'];
	if (strlen($kullanici_password) ==0) {
		
		header("Location:../production/kullanici-sifreduzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
	elseif ($kullanici_password==$sifre2) {
		
		$kullanici_password=md5($_POST['kullanici_password']);
		$ayarkaydet=$db->prepare("UPDATE kullanici SET

			kullanici_password=:kullanici_password
			WHERE kullanici_id={$_POST['kullanici_id']}");

		$update=$ayarkaydet->execute(array(

			'kullanici_password' => $kullanici_password
			));
		if ($update) {
			header("Location:../production/kullanici-sifreduzenle.php?kullanici_id=$kullanici_id&durum=ok");
		} else {header("Location:../production/kullanici-sifreduzenle.php?$kullanici_id&durum=no");}


	} elseif ($kullanici_password!=$sifre2) {
		header("Location:../production/kullanici-sifreduzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}








// CSV İLE KULLANICI EKLEME

if (isset($_POST['CSVilekullanicikaydet'])) { 

	if(isset($_FILES['file']))
	{
		if($_FILES['file']['error'] != 0)
		{
			if($_FILES['file']['size'] == 0)
				header("Location:../production/yenikullanicicoklu.php?excel=no1");
			else
				header("Location:../production/yenikullanicicoklu.php?excel=no2");
		}
		else
		{
			if($_FILES['file']['size'] > (1024*1024*10))
				header("Location:../production/yenikullanicicoklu.php?excel=no3");
			else
			{
				require_once 'baglan.php';
				$file=$_FILES["file"]["tmp_name"];
				$file_open=fopen($file,"r");
				while (($csv=fgetcsv($file_open,1000,",","charset=utf8"))!==false) {
					$kullanici_tcno=$csv[0];
					$kullanici_kullaniciad=$csv[1];
					$kullanici_adsoyad=$csv[2];
					$kullanici_password=$csv[3];
					$kullanici_telefon1=$csv[4];
					$kullanici_telefon2=$csv[5];
					$kullanici_email1=$csv[6];
					$kullanici_email2=$csv[7];
					$kullanici_kurumno=$csv[8];
					$kullanici_kademe=$csv[9];
					$kullanici_brans=$csv[10];
					$kullanici_durum=$csv[11];
					$kullanici_resimyol=$csv[12];
					$kullanici_yetki=$csv[13];
					$kullanici_zaman=$csv[14];

					$stmt=$db->prepare("INSERT INTO kullanici(kullanici_tcno,kullanici_kullaniciad,kullanici_adsoyad,kullanici_password,kullanici_telefon1,kullanici_telefon2,kullanici_email1,kullanici_email2,kullanici_kurumno,kullanici_kademe,kullanici_brans,kullanici_durum,kullanici_resimyol,kullanici_yetki,kullanici_zaman) VALUES (:kullanici_tcno,:kullanici_kullaniciad,:kullanici_adsoyad,:kullanici_password,:kullanici_telefon1,:kullanici_telefon2,:kullanici_email1,:kullanici_email2,:kullanici_kurumno,:kullanici_kademe,:kullanici_brans,:kullanici_durum,:kullanici_resimyol,:kullanici_yetki,:kullanici_zaman)

						");
					$stmt-> bindparam(':kullanici_tcno',$kullanici_tcno);
					$stmt-> bindparam(':kullanici_kullaniciad',$kullanici_kullaniciad);
					$stmt-> bindparam(':kullanici_adsoyad',$kullanici_adsoyad);
					$stmt-> bindparam(':kullanici_password',md5($kullanici_password));
					$stmt-> bindparam(':kullanici_telefon1',$kullanici_telefon1);
					$stmt-> bindparam(':kullanici_telefon2',$kullanici_telefon2);
					$stmt-> bindparam(':kullanici_email1',$kullanici_email1);
					$stmt-> bindparam(':kullanici_email2',$kullanici_email2);
					$stmt-> bindparam(':kullanici_kurumno',$kullanici_kurumno);
					$stmt-> bindparam(':kullanici_kademe',$kullanici_kademe);
					$stmt-> bindparam(':kullanici_brans',$kullanici_brans);
					$stmt-> bindparam(':kullanici_durum',$kullanici_durum);
					$stmt-> bindparam(':kullanici_resimyol',$kullanici_resimyol);
					$stmt-> bindparam(':kullanici_yetki',$kullanici_yetki);
					$stmt-> bindparam(':kullanici_zaman',$kullanici_zaman);
					$stmt->execute();
					
				}

				if ($stmt) {
					header("Location:../production/yenikullanicicoklu.php?durum=ok");
				} else {header("Location:../production/yenikullanicicoklu.php?durum=no");}
			}
		}

	}
}





// BURASI ÖĞRENCİ/VELİ LİST DÜZENLEMEDEN!!! kullanicilistesi.php YE GERİ DÖNEN BUTONUDUR
if (isset($_POST['ogrencilistduzenleme'])) {
	
	header("Location:../production/liste-ogrenci.php?durum=no");	
}





// BURASI ogrencilist DÜZENLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['ogrencilistduzenle'])) {

	if ($_FILES['ogrencilist_resimyol']["size"] > 0) {
		$uploads_dir='../../sdimg/ogrenci';
		@$tmp_name=$_FILES['ogrencilist_resimyol']["tmp_name"];
		@$name=$_FILES['ogrencilist_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE ogrencilist SET
			ogrencilist_kurumno=:ogrencilist_kurumno,
			ogrencilist_tcno=:ogrencilist_tcno,
			ogrencilist_sinif=:ogrencilist_sinif,
			ogrencilist_sube=:ogrencilist_sube,
			ogrencilist_cinsiyet=:ogrencilist_cinsiyet,
			ogrencilist_ad=:ogrencilist_ad,
			ogrencilist_soyad=:ogrencilist_soyad,
			ogrencilist_dogumtarihi=:ogrencilist_dogumtarihi,
			ogrencilist_ogrencitelefon=:ogrencilist_ogrencitelefon,
			ogrencilist_ogrencimail=:ogrencilist_ogrencimail,
			ogrencilist_veliadsoyad=:ogrencilist_veliadsoyad,
			ogrencilist_veliyakinlik=:ogrencilist_veliyakinlik,
			ogrencilist_velimeslek=:ogrencilist_velimeslek,
			ogrencilist_velievadresi=:ogrencilist_velievadresi,
			ogrencilist_veliisadresi=:ogrencilist_veliisadresi,
			ogrencilist_velitelefon1=:ogrencilist_velitelefon1,
			ogrencilist_velitelefon2=:ogrencilist_velitelefon2,
			ogrencilist_velitelefon3=:ogrencilist_velitelefon3,
			ogrencilist_velimail1=:ogrencilist_velimail1,
			ogrencilist_velimail2=:ogrencilist_velimail2,
			ogrencilist_anneadsoyad=:ogrencilist_anneadsoyad,
			ogrencilist_annemeslek=:ogrencilist_annemeslek,
			ogrencilist_anneevadresi=:ogrencilist_anneevadresi,
			ogrencilist_anneisadresi=:ogrencilist_anneisadresi,
			ogrencilist_annetelefon1=:ogrencilist_annetelefon1,
			ogrencilist_annetelefon2=:ogrencilist_annetelefon2,
			ogrencilist_annemail1=:ogrencilist_annemail1,
			ogrencilist_annemail2=:ogrencilist_annemail2,
			ogrencilist_babaadsoyad=:ogrencilist_babaadsoyad,
			ogrencilist_babameslek=:ogrencilist_babameslek,
			ogrencilist_babaevadresi=:ogrencilist_babaevadresi,
			ogrencilist_babaisadresi=:ogrencilist_babaisadresi,
			ogrencilist_babatelefon1=:ogrencilist_babatelefon1,
			ogrencilist_babatelefon2=:ogrencilist_babatelefon2,
			ogrencilist_babamail1=:ogrencilist_babamail1,
			ogrencilist_babamail2=:ogrencilist_babamail2,
			ogrencilist_ogrencibursdurumu=:ogrencilist_ogrencibursdurumu,
			ogrencilist_ogrencikardessayisi=:ogrencilist_ogrencikardessayisi,
			ogrencilist_ogrencilisansdurumu=:ogrencilist_ogrencilisansdurumu,
			ogrencilist_resimyol=:resimyol
			WHERE ogrencilist_id={$_POST['ogrencilist_id']}");

		$update=$duzenle->execute(array(
			'ogrencilist_kurumno' => $_POST['ogrencilist_kurumno'],
			'ogrencilist_tcno' => $_POST['ogrencilist_tcno'],
			'ogrencilist_sinif' => $_POST['ogrencilist_sinif'],
			'ogrencilist_sube' => $_POST['ogrencilist_sube'],
			'ogrencilist_cinsiyet' => $_POST['ogrencilist_cinsiyet'],
			'ogrencilist_ad' => $_POST['ogrencilist_ad'],
			'ogrencilist_soyad' => $_POST['ogrencilist_soyad'],
			'ogrencilist_dogumtarihi' => $_POST['ogrencilist_dogumtarihi'],
			'ogrencilist_ogrencitelefon' => $_POST['ogrencilist_ogrencitelefon'],
			'ogrencilist_ogrencimail' => $_POST['ogrencilist_ogrencimail'],
			'ogrencilist_veliadsoyad' => $_POST['ogrencilist_veliadsoyad'],
			'ogrencilist_veliyakinlik' => $_POST['ogrencilist_veliyakinlik'],
			'ogrencilist_velimeslek' => $_POST['ogrencilist_velimeslek'],
			'ogrencilist_velievadresi' => $_POST['ogrencilist_velievadresi'],
			'ogrencilist_veliisadresi' => $_POST['ogrencilist_veliisadresi'],
			'ogrencilist_velitelefon1' => $_POST['ogrencilist_velitelefon1'],
			'ogrencilist_velitelefon2' => $_POST['ogrencilist_velitelefon2'],
			'ogrencilist_velitelefon3' => $_POST['ogrencilist_velitelefon3'],
			'ogrencilist_velimail1' => $_POST['ogrencilist_velimail1'],
			'ogrencilist_velimail2' => $_POST['ogrencilist_velimail2'],
			'ogrencilist_anneadsoyad' => $_POST['ogrencilist_anneadsoyad'],
			'ogrencilist_annemeslek' => $_POST['ogrencilist_annemeslek'],
			'ogrencilist_anneevadresi' => $_POST['ogrencilist_anneevadresi'],
			'ogrencilist_anneisadresi' => $_POST['ogrencilist_anneisadresi'],
			'ogrencilist_annetelefon1' => $_POST['ogrencilist_annetelefon1'],
			'ogrencilist_annetelefon2' => $_POST['ogrencilist_annetelefon2'],
			'ogrencilist_annemail1' => $_POST['ogrencilist_annemail1'],
			'ogrencilist_annemail2' => $_POST['ogrencilist_annemail2'],
			'ogrencilist_babaadsoyad' => $_POST['ogrencilist_babaadsoyad'],
			'ogrencilist_babameslek' => $_POST['ogrencilist_babameslek'],
			'ogrencilist_babaevadresi' => $_POST['ogrencilist_babaevadresi'],
			'ogrencilist_babaisadresi' => $_POST['ogrencilist_babaisadresi'],
			'ogrencilist_babatelefon1' => $_POST['ogrencilist_babatelefon1'],
			'ogrencilist_babatelefon2' => $_POST['ogrencilist_babatelefon2'],
			'ogrencilist_babamail1' => $_POST['ogrencilist_babamail1'],
			'ogrencilist_babamail2' => $_POST['ogrencilist_babamail2'],
			'ogrencilist_ogrencibursdurumu' => $_POST['ogrencilist_ogrencibursdurumu'],
			'ogrencilist_ogrencikardessayisi' => $_POST['ogrencilist_ogrencikardessayisi'],
			'ogrencilist_ogrencilisansdurumu' => $_POST['ogrencilist_ogrencilisansdurumu'],
			'resimyol' => $refimgyol
			));
		$ogrencilist_id=$_POST['ogrencilist_id']; 
		if ($update) {
			
			$resimsilunlink=$_POST['ogrencilist_resimyol']; //fiziki dosyayı silmek için gerekli kod
			unlink("../../$resimsilunlink");				//fiziki dosyayı silmek için gerekli kod
			header("Location:../production/liste-ogrenci.php?ogrencilist_id=$ogrencilist_id&durum=ok");

		} else {header("Location:../production/liste-ogrenci.php?$ogrencilist_id&durum=no");}


	}  else {
		$duzenle=$db->prepare("UPDATE ogrencilist SET
			ogrencilist_kurumno=:ogrencilist_kurumno,
			ogrencilist_tcno=:ogrencilist_tcno,
			ogrencilist_sinif=:ogrencilist_sinif,
			ogrencilist_sube=:ogrencilist_sube,
			ogrencilist_cinsiyet=:ogrencilist_cinsiyet,
			ogrencilist_ad=:ogrencilist_ad,
			ogrencilist_soyad=:ogrencilist_soyad,
			ogrencilist_dogumtarihi=:ogrencilist_dogumtarihi,
			ogrencilist_ogrencitelefon=:ogrencilist_ogrencitelefon,
			ogrencilist_ogrencimail=:ogrencilist_ogrencimail,
			ogrencilist_veliadsoyad=:ogrencilist_veliadsoyad,
			ogrencilist_veliyakinlik=:ogrencilist_veliyakinlik,
			ogrencilist_velimeslek=:ogrencilist_velimeslek,
			ogrencilist_velievadresi=:ogrencilist_velievadresi,
			ogrencilist_veliisadresi=:ogrencilist_veliisadresi,
			ogrencilist_velitelefon1=:ogrencilist_velitelefon1,
			ogrencilist_velitelefon2=:ogrencilist_velitelefon2,
			ogrencilist_velitelefon3=:ogrencilist_velitelefon3,
			ogrencilist_velimail1=:ogrencilist_velimail1,
			ogrencilist_velimail2=:ogrencilist_velimail2,
			ogrencilist_anneadsoyad=:ogrencilist_anneadsoyad,
			ogrencilist_annemeslek=:ogrencilist_annemeslek,
			ogrencilist_anneevadresi=:ogrencilist_anneevadresi,
			ogrencilist_anneisadresi=:ogrencilist_anneisadresi,
			ogrencilist_annetelefon1=:ogrencilist_annetelefon1,
			ogrencilist_annetelefon2=:ogrencilist_annetelefon2,
			ogrencilist_annemail1=:ogrencilist_annemail1,
			ogrencilist_annemail2=:ogrencilist_annemail2,
			ogrencilist_babaadsoyad=:ogrencilist_babaadsoyad,
			ogrencilist_babameslek=:ogrencilist_babameslek,
			ogrencilist_babaevadresi=:ogrencilist_babaevadresi,
			ogrencilist_babaisadresi=:ogrencilist_babaisadresi,
			ogrencilist_babatelefon1=:ogrencilist_babatelefon1,
			ogrencilist_babatelefon2=:ogrencilist_babatelefon2,
			ogrencilist_babamail1=:ogrencilist_babamail1,
			ogrencilist_babamail2=:ogrencilist_babamail2,
			ogrencilist_ogrencibursdurumu=:ogrencilist_ogrencibursdurumu,
			ogrencilist_ogrencikardessayisi=:ogrencilist_ogrencikardessayisi,
			ogrencilist_ogrencilisansdurumu=:ogrencilist_ogrencilisansdurumu
			WHERE ogrencilist_id={$_POST['ogrencilist_id']}");

		$update=$duzenle->execute(array(
			'ogrencilist_kurumno' => $_POST['ogrencilist_kurumno'],
			'ogrencilist_tcno' => $_POST['ogrencilist_tcno'],
			'ogrencilist_sinif' => $_POST['ogrencilist_sinif'],
			'ogrencilist_sube' => $_POST['ogrencilist_sube'],
			'ogrencilist_cinsiyet' => $_POST['ogrencilist_cinsiyet'],
			'ogrencilist_ad' => $_POST['ogrencilist_ad'],
			'ogrencilist_soyad' => $_POST['ogrencilist_soyad'],
			'ogrencilist_dogumtarihi' => $_POST['ogrencilist_dogumtarihi'],
			'ogrencilist_ogrencitelefon' => $_POST['ogrencilist_ogrencitelefon'],
			'ogrencilist_ogrencimail' => $_POST['ogrencilist_ogrencimail'],
			'ogrencilist_veliadsoyad' => $_POST['ogrencilist_veliadsoyad'],
			'ogrencilist_veliyakinlik' => $_POST['ogrencilist_veliyakinlik'],
			'ogrencilist_velimeslek' => $_POST['ogrencilist_velimeslek'],
			'ogrencilist_velievadresi' => $_POST['ogrencilist_velievadresi'],
			'ogrencilist_veliisadresi' => $_POST['ogrencilist_veliisadresi'],
			'ogrencilist_velitelefon1' => $_POST['ogrencilist_velitelefon1'],
			'ogrencilist_velitelefon2' => $_POST['ogrencilist_velitelefon2'],
			'ogrencilist_velitelefon3' => $_POST['ogrencilist_velitelefon3'],
			'ogrencilist_velimail1' => $_POST['ogrencilist_velimail1'],
			'ogrencilist_velimail2' => $_POST['ogrencilist_velimail2'],
			'ogrencilist_anneadsoyad' => $_POST['ogrencilist_anneadsoyad'],
			'ogrencilist_annemeslek' => $_POST['ogrencilist_annemeslek'],
			'ogrencilist_anneevadresi' => $_POST['ogrencilist_anneevadresi'],
			'ogrencilist_anneisadresi' => $_POST['ogrencilist_anneisadresi'],
			'ogrencilist_annetelefon1' => $_POST['ogrencilist_annetelefon1'],
			'ogrencilist_annetelefon2' => $_POST['ogrencilist_annetelefon2'],
			'ogrencilist_annemail1' => $_POST['ogrencilist_annemail1'],
			'ogrencilist_annemail2' => $_POST['ogrencilist_annemail2'],
			'ogrencilist_babaadsoyad' => $_POST['ogrencilist_babaadsoyad'],
			'ogrencilist_babameslek' => $_POST['ogrencilist_babameslek'],
			'ogrencilist_babaevadresi' => $_POST['ogrencilist_babaevadresi'],
			'ogrencilist_babaisadresi' => $_POST['ogrencilist_babaisadresi'],
			'ogrencilist_babatelefon1' => $_POST['ogrencilist_babatelefon1'],
			'ogrencilist_babatelefon2' => $_POST['ogrencilist_babatelefon2'],
			'ogrencilist_babamail1' => $_POST['ogrencilist_babamail1'],
			'ogrencilist_babamail2' => $_POST['ogrencilist_babamail2'],
			'ogrencilist_ogrencibursdurumu' => $_POST['ogrencilist_ogrencibursdurumu'],
			'ogrencilist_ogrencikardessayisi' => $_POST['ogrencilist_ogrencikardessayisi'],
			'ogrencilist_ogrencilisansdurumu' => $_POST['ogrencilist_ogrencilisansdurumu']
			));
		$ogrencilist_id=$_POST['ogrencilist_id']; 
		if ($update) {
			header("Location:../production/liste-ogrenci.php?ogrencilist_id=$ogrencilist_id&durum=ok");
		} else {header("Location:../production/liste-ogrenci.php?$ogrencilist_id&durum=no");}
	}


}




// BURASI ÖĞRENCİ/VELİ BİLGİSİ SİLMEYE YARAYAN KOD BLOĞUDUR.
if ($_GET['ogrencilistsil']=="ok") {
	
	$sil=$db->prepare("DELETE from ogrencilist where ogrencilist_id=:ogrencilist_id");
	$kontrol=$sil->execute(array(
		'ogrencilist_id' =>$_GET['ogrencilist_id']
		));
	if ($kontrol) {
		$resimsilunlink=$_GET['ogrencilist_resimyol'];  //fiziki dosyayı silmek için gerekli kod
		unlink("../../$resimsilunlink");			//fiziki dosyayı silmek için gerekli kod
		header("Location:../production/liste-ogrenci.php?durum=ok");
	} else {header("Location:../production/liste-ogrenci.php?durum=no");}
}







// BURASI TEK ÖĞRENCİ BİLGİSİ EKLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['ogrencilistkaydet'])) {

	if ($_FILES['ogrencilist_resimyol']["size"] > 0) {
		$uploads_dir='../../sdimg/ogrenci';
		@$tmp_name=$_FILES['ogrencilist_resimyol']["tmp_name"];
		@$name=$_FILES['ogrencilist_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$kaydet=$db->prepare("INSERT INTO ogrencilist SET
			ogrencilist_kurumno=:ogrencilist_kurumno,
			ogrencilist_tcno=:ogrencilist_tcno,
			ogrencilist_sinif=:ogrencilist_sinif,
			ogrencilist_sube=:ogrencilist_sube,
			ogrencilist_cinsiyet=:ogrencilist_cinsiyet,
			ogrencilist_ad=:ogrencilist_ad,
			ogrencilist_soyad=:ogrencilist_soyad,
			ogrencilist_dogumtarihi=:ogrencilist_dogumtarihi,
			ogrencilist_ogrencitelefon=:ogrencilist_ogrencitelefon,
			ogrencilist_ogrencimail=:ogrencilist_ogrencimail,
			ogrencilist_veliadsoyad=:ogrencilist_veliadsoyad,
			ogrencilist_veliyakinlik=:ogrencilist_veliyakinlik,
			ogrencilist_velimeslek=:ogrencilist_velimeslek,
			ogrencilist_velievadresi=:ogrencilist_velievadresi,
			ogrencilist_veliisadresi=:ogrencilist_veliisadresi,
			ogrencilist_velitelefon1=:ogrencilist_velitelefon1,
			ogrencilist_velitelefon2=:ogrencilist_velitelefon2,
			ogrencilist_velitelefon3=:ogrencilist_velitelefon3,
			ogrencilist_velimail1=:ogrencilist_velimail1,
			ogrencilist_velimail2=:ogrencilist_velimail2,
			ogrencilist_anneadsoyad=:ogrencilist_anneadsoyad,
			ogrencilist_annemeslek=:ogrencilist_annemeslek,
			ogrencilist_anneevadresi=:ogrencilist_anneevadresi,
			ogrencilist_anneisadresi=:ogrencilist_anneisadresi,
			ogrencilist_annetelefon1=:ogrencilist_annetelefon1,
			ogrencilist_annetelefon2=:ogrencilist_annetelefon2,
			ogrencilist_annemail1=:ogrencilist_annemail1,
			ogrencilist_annemail2=:ogrencilist_annemail2,
			ogrencilist_babaadsoyad=:ogrencilist_babaadsoyad,
			ogrencilist_babameslek=:ogrencilist_babameslek,
			ogrencilist_babaevadresi=:ogrencilist_babaevadresi,
			ogrencilist_babaisadresi=:ogrencilist_babaisadresi,
			ogrencilist_babatelefon1=:ogrencilist_babatelefon1,
			ogrencilist_babatelefon2=:ogrencilist_babatelefon2,
			ogrencilist_babamail1=:ogrencilist_babamail1,
			ogrencilist_babamail2=:ogrencilist_babamail2,
			ogrencilist_ogrencibursdurumu=:ogrencilist_ogrencibursdurumu,
			ogrencilist_ogrencikardessayisi=:ogrencilist_ogrencikardessayisi,
			ogrencilist_ogrencilisansdurumu=:ogrencilist_ogrencilisansdurumu,
			ogrencilist_resimyol=:resimyol
			");

		$insert=$kaydet->execute(array(
			'ogrencilist_kurumno' => $_POST['ogrencilist_kurumno'],
			'ogrencilist_tcno' => $_POST['ogrencilist_tcno'],
			'ogrencilist_sinif' => $_POST['ogrencilist_sinif'],
			'ogrencilist_sube' => $_POST['ogrencilist_sube'],
			'ogrencilist_cinsiyet' => $_POST['ogrencilist_cinsiyet'],
			'ogrencilist_ad' => $_POST['ogrencilist_ad'],
			'ogrencilist_soyad' => $_POST['ogrencilist_soyad'],
			'ogrencilist_dogumtarihi' => $_POST['ogrencilist_dogumtarihi'],
			'ogrencilist_ogrencitelefon' => $_POST['ogrencilist_ogrencitelefon'],
			'ogrencilist_ogrencimail' => $_POST['ogrencilist_ogrencimail'],
			'ogrencilist_veliadsoyad' => $_POST['ogrencilist_veliadsoyad'],
			'ogrencilist_veliyakinlik' => $_POST['ogrencilist_veliyakinlik'],
			'ogrencilist_velimeslek' => $_POST['ogrencilist_velimeslek'],
			'ogrencilist_velievadresi' => $_POST['ogrencilist_velievadresi'],
			'ogrencilist_veliisadresi' => $_POST['ogrencilist_veliisadresi'],
			'ogrencilist_velitelefon1' => $_POST['ogrencilist_velitelefon1'],
			'ogrencilist_velitelefon2' => $_POST['ogrencilist_velitelefon2'],
			'ogrencilist_velitelefon3' => $_POST['ogrencilist_velitelefon3'],
			'ogrencilist_velimail1' => $_POST['ogrencilist_velimail1'],
			'ogrencilist_velimail2' => $_POST['ogrencilist_velimail2'],
			'ogrencilist_anneadsoyad' => $_POST['ogrencilist_anneadsoyad'],
			'ogrencilist_annemeslek' => $_POST['ogrencilist_annemeslek'],
			'ogrencilist_anneevadresi' => $_POST['ogrencilist_anneevadresi'],
			'ogrencilist_anneisadresi' => $_POST['ogrencilist_anneisadresi'],
			'ogrencilist_annetelefon1' => $_POST['ogrencilist_annetelefon1'],
			'ogrencilist_annetelefon2' => $_POST['ogrencilist_annetelefon2'],
			'ogrencilist_annemail1' => $_POST['ogrencilist_annemail1'],
			'ogrencilist_annemail2' => $_POST['ogrencilist_annemail2'],
			'ogrencilist_babaadsoyad' => $_POST['ogrencilist_babaadsoyad'],
			'ogrencilist_babameslek' => $_POST['ogrencilist_babameslek'],
			'ogrencilist_babaevadresi' => $_POST['ogrencilist_babaevadresi'],
			'ogrencilist_babaisadresi' => $_POST['ogrencilist_babaisadresi'],
			'ogrencilist_babatelefon1' => $_POST['ogrencilist_babatelefon1'],
			'ogrencilist_babatelefon2' => $_POST['ogrencilist_babatelefon2'],
			'ogrencilist_babamail1' => $_POST['ogrencilist_babamail1'],
			'ogrencilist_babamail2' => $_POST['ogrencilist_babamail2'],
			'ogrencilist_ogrencibursdurumu' => $_POST['ogrencilist_ogrencibursdurumu'],
			'ogrencilist_ogrencikardessayisi' => $_POST['ogrencilist_ogrencikardessayisi'],
			'ogrencilist_ogrencilisansdurumu' => $_POST['ogrencilist_ogrencilisansdurumu'],
			'resimyol' => $refimgyol
			));

		if ($insert) {
			header("Location:../production/liste-ogrenci.php?durum=ok");
		} else {header("Location:../production/liste-ogrenci.php?durum=no");}


	} else {
		
		$refimgyol="sdimg\ogrencilist\logoyok.png";
		
		$kaydet=$db->prepare("INSERT INTO ogrencilist SET
			ogrencilist_kurumno=:ogrencilist_kurumno,
			ogrencilist_tcno=:ogrencilist_tcno,
			ogrencilist_sinif=:ogrencilist_sinif,
			ogrencilist_sube=:ogrencilist_sube,
			ogrencilist_cinsiyet=:ogrencilist_cinsiyet,
			ogrencilist_ad=:ogrencilist_ad,
			ogrencilist_soyad=:ogrencilist_soyad,
			ogrencilist_dogumtarihi=:ogrencilist_dogumtarihi,
			ogrencilist_ogrencitelefon=:ogrencilist_ogrencitelefon,
			ogrencilist_ogrencimail=:ogrencilist_ogrencimail,
			ogrencilist_veliadsoyad=:ogrencilist_veliadsoyad,
			ogrencilist_veliyakinlik=:ogrencilist_veliyakinlik,
			ogrencilist_velimeslek=:ogrencilist_velimeslek,
			ogrencilist_velievadresi=:ogrencilist_velievadresi,
			ogrencilist_veliisadresi=:ogrencilist_veliisadresi,
			ogrencilist_velitelefon1=:ogrencilist_velitelefon1,
			ogrencilist_velitelefon2=:ogrencilist_velitelefon2,
			ogrencilist_velitelefon3=:ogrencilist_velitelefon3,
			ogrencilist_velimail1=:ogrencilist_velimail1,
			ogrencilist_velimail2=:ogrencilist_velimail2,
			ogrencilist_anneadsoyad=:ogrencilist_anneadsoyad,
			ogrencilist_annemeslek=:ogrencilist_annemeslek,
			ogrencilist_anneevadresi=:ogrencilist_anneevadresi,
			ogrencilist_anneisadresi=:ogrencilist_anneisadresi,
			ogrencilist_annetelefon1=:ogrencilist_annetelefon1,
			ogrencilist_annetelefon2=:ogrencilist_annetelefon2,
			ogrencilist_annemail1=:ogrencilist_annemail1,
			ogrencilist_annemail2=:ogrencilist_annemail2,
			ogrencilist_babaadsoyad=:ogrencilist_babaadsoyad,
			ogrencilist_babameslek=:ogrencilist_babameslek,
			ogrencilist_babaevadresi=:ogrencilist_babaevadresi,
			ogrencilist_babaisadresi=:ogrencilist_babaisadresi,
			ogrencilist_babatelefon1=:ogrencilist_babatelefon1,
			ogrencilist_babatelefon2=:ogrencilist_babatelefon2,
			ogrencilist_babamail1=:ogrencilist_babamail1,
			ogrencilist_babamail2=:ogrencilist_babamail2,
			ogrencilist_ogrencibursdurumu=:ogrencilist_ogrencibursdurumu,
			ogrencilist_ogrencikardessayisi=:ogrencilist_ogrencikardessayisi,
			ogrencilist_ogrencilisansdurumu=:ogrencilist_ogrencilisansdurumu,
			ogrencilist_resimyol=:resimyol
			");

		$insert=$kaydet->execute(array(
			'ogrencilist_kurumno' => $_POST['ogrencilist_kurumno'],
			'ogrencilist_tcno' => $_POST['ogrencilist_tcno'],
			'ogrencilist_sinif' => $_POST['ogrencilist_sinif'],
			'ogrencilist_sube' => $_POST['ogrencilist_sube'],
			'ogrencilist_cinsiyet' => $_POST['ogrencilist_cinsiyet'],
			'ogrencilist_ad' => $_POST['ogrencilist_ad'],
			'ogrencilist_soyad' => $_POST['ogrencilist_soyad'],
			'ogrencilist_dogumtarihi' => $_POST['ogrencilist_dogumtarihi'],
			'ogrencilist_ogrencitelefon' => $_POST['ogrencilist_ogrencitelefon'],
			'ogrencilist_ogrencimail' => $_POST['ogrencilist_ogrencimail'],
			'ogrencilist_veliadsoyad' => $_POST['ogrencilist_veliadsoyad'],
			'ogrencilist_veliyakinlik' => $_POST['ogrencilist_veliyakinlik'],
			'ogrencilist_velimeslek' => $_POST['ogrencilist_velimeslek'],
			'ogrencilist_velievadresi' => $_POST['ogrencilist_velievadresi'],
			'ogrencilist_veliisadresi' => $_POST['ogrencilist_veliisadresi'],
			'ogrencilist_velitelefon1' => $_POST['ogrencilist_velitelefon1'],
			'ogrencilist_velitelefon2' => $_POST['ogrencilist_velitelefon2'],
			'ogrencilist_velitelefon3' => $_POST['ogrencilist_velitelefon3'],
			'ogrencilist_velimail1' => $_POST['ogrencilist_velimail1'],
			'ogrencilist_velimail2' => $_POST['ogrencilist_velimail2'],
			'ogrencilist_anneadsoyad' => $_POST['ogrencilist_anneadsoyad'],
			'ogrencilist_annemeslek' => $_POST['ogrencilist_annemeslek'],
			'ogrencilist_anneevadresi' => $_POST['ogrencilist_anneevadresi'],
			'ogrencilist_anneisadresi' => $_POST['ogrencilist_anneisadresi'],
			'ogrencilist_annetelefon1' => $_POST['ogrencilist_annetelefon1'],
			'ogrencilist_annetelefon2' => $_POST['ogrencilist_annetelefon2'],
			'ogrencilist_annemail1' => $_POST['ogrencilist_annemail1'],
			'ogrencilist_annemail2' => $_POST['ogrencilist_annemail2'],
			'ogrencilist_babaadsoyad' => $_POST['ogrencilist_babaadsoyad'],
			'ogrencilist_babameslek' => $_POST['ogrencilist_babameslek'],
			'ogrencilist_babaevadresi' => $_POST['ogrencilist_babaevadresi'],
			'ogrencilist_babaisadresi' => $_POST['ogrencilist_babaisadresi'],
			'ogrencilist_babatelefon1' => $_POST['ogrencilist_babatelefon1'],
			'ogrencilist_babatelefon2' => $_POST['ogrencilist_babatelefon2'],
			'ogrencilist_babamail1' => $_POST['ogrencilist_babamail1'],
			'ogrencilist_babamail2' => $_POST['ogrencilist_babamail2'],
			'ogrencilist_ogrencibursdurumu' => $_POST['ogrencilist_ogrencibursdurumu'],
			'ogrencilist_ogrencikardessayisi' => $_POST['ogrencilist_ogrencikardessayisi'],
			'ogrencilist_ogrencilisansdurumu' => $_POST['ogrencilist_ogrencilisansdurumu'],
			'resimyol' => $refimgyol
			));

		if ($insert) {
			header("Location:../production/liste-ogrenci.php?durum=ok");
		} else {header("Location:../production/liste-ogrenci.php?durum=no");}

	}

}









// CSV İLE ÖĞRENCİ EKLEME

if (isset($_POST['CSVileogrencikaydet'])) { 

	if(isset($_FILES['file']))
	{
		if($_FILES['file']['error'] != 0)
		{
			if($_FILES['file']['size'] == 0)
				header("Location:../production/liste-ogrencieklecsv.php?excel=no1");
			else
				header("Location:../production/liste-ogrencieklecsv.php?excel=no2");
		}
		else
		{
			if($_FILES['file']['size'] > (1024*1024*10))
				header("Location:../production/liste-ogrencieklecsv.php?excel=no3");
			else
			{
				require_once 'baglan.php';
				$file=$_FILES["file"]["tmp_name"];
				$file_open=fopen($file,"r");
				while (($csv=fgetcsv($file_open,1000,",","charset=utf8"))!==false) {
					$ogrencilist_kullaniciid=$csv[0];
					$ogrencilist_kurumno=$csv[1];
					$ogrencilist_resimyol=$csv[2];
					$ogrencilist_tcno=$csv[3];
					$ogrencilist_sinif=$csv[4];
					$ogrencilist_sube=$csv[5];
					$ogrencilist_cinsiyet=$csv[6];
					$ogrencilist_ad=$csv[7];
					$ogrencilist_soyad=$csv[8];
					$ogrencilist_dogumtarihi=$csv[9];
					$ogrencilist_ogrencitelefon=$csv[10];
					$ogrencilist_ogrencimail=$csv[11];
					$ogrencilist_veliadsoyad=$csv[12];
					$ogrencilist_veliyakinlik=$csv[13];
					$ogrencilist_velimeslek=$csv[14];
					$ogrencilist_velievadresi=$csv[15];
					$ogrencilist_veliisadresi=$csv[16];
					$ogrencilist_velitelefon1=$csv[17];
					$ogrencilist_velitelefon2=$csv[18];
					$ogrencilist_velitelefon3=$csv[19];
					$ogrencilist_velimail1=$csv[20];
					$ogrencilist_velimail2=$csv[21];
					$ogrencilist_anneadsoyad=$csv[22];
					$ogrencilist_annemeslek=$csv[23];
					$ogrencilist_anneevadresi=$csv[24];
					$ogrencilist_anneisadresi=$csv[25];
					$ogrencilist_annetelefon1=$csv[26];
					$ogrencilist_annetelefon2=$csv[27];
					$ogrencilist_annemail1=$csv[28];
					$ogrencilist_annemail2=$csv[29];
					$ogrencilist_babaadsoyad=$csv[30];
					$ogrencilist_babameslek=$csv[31];
					$ogrencilist_babaevadresi=$csv[32];
					$ogrencilist_babaisadresi=$csv[33];
					$ogrencilist_babatelefon1=$csv[34];
					$ogrencilist_babatelefon2=$csv[35];
					$ogrencilist_babamail1=$csv[36];
					$ogrencilist_babamail2=$csv[37];
					$ogrencilist_ogrencibursdurumu=$csv[38];
					$ogrencilist_ogrencikardessayisi=$csv[39];
					$ogrencilist_ogrencilisansdurumu=$csv[40];
					$ogrencilist_yedek1=$csv[41];
					$ogrencilist_yedek2=$csv[42];
					

					$stmt=$db->prepare("INSERT INTO ogrencilist (ogrencilist_kullaniciid,ogrencilist_kurumno,ogrencilist_resimyol,ogrencilist_tcno,ogrencilist_sinif,ogrencilist_sube,ogrencilist_cinsiyet,ogrencilist_ad,ogrencilist_soyad,ogrencilist_dogumtarihi,ogrencilist_ogrencitelefon,ogrencilist_ogrencimail,ogrencilist_veliadsoyad,ogrencilist_veliyakinlik,ogrencilist_velimeslek,ogrencilist_velievadresi,ogrencilist_veliisadresi,ogrencilist_velitelefon1,ogrencilist_velitelefon2,ogrencilist_velitelefon3,ogrencilist_velimail1,ogrencilist_velimail2,ogrencilist_anneadsoyad,ogrencilist_annemeslek,ogrencilist_anneevadresi,ogrencilist_anneisadresi,ogrencilist_annetelefon1,ogrencilist_annetelefon2,ogrencilist_annemail1,ogrencilist_annemail2,ogrencilist_babaadsoyad,ogrencilist_babameslek,ogrencilist_babaevadresi,ogrencilist_babaisadresi,ogrencilist_babatelefon1,ogrencilist_babatelefon2,ogrencilist_babamail1,ogrencilist_babamail2,ogrencilist_ogrencibursdurumu,ogrencilist_ogrencikardessayisi,ogrencilist_ogrencilisansdurumu,ogrencilist_yedek1,ogrencilist_yedek2) 
						VALUES (:ogrencilist_kullaniciid,:ogrencilist_kurumno,:ogrencilist_resimyol,:ogrencilist_tcno,:ogrencilist_sinif,:ogrencilist_sube,:ogrencilist_cinsiyet,:ogrencilist_ad,:ogrencilist_soyad,:ogrencilist_dogumtarihi,:ogrencilist_ogrencitelefon,:ogrencilist_ogrencimail,:ogrencilist_veliadsoyad,:ogrencilist_veliyakinlik,:ogrencilist_velimeslek,:ogrencilist_velievadresi,:ogrencilist_veliisadresi,:ogrencilist_velitelefon1,:ogrencilist_velitelefon2,:ogrencilist_velitelefon3,:ogrencilist_velimail1,:ogrencilist_velimail2,:ogrencilist_anneadsoyad,:ogrencilist_annemeslek,:ogrencilist_anneevadresi,:ogrencilist_anneisadresi,:ogrencilist_annetelefon1,:ogrencilist_annetelefon2,:ogrencilist_annemail1,:ogrencilist_annemail2,:ogrencilist_babaadsoyad,:ogrencilist_babameslek,:ogrencilist_babaevadresi,:ogrencilist_babaisadresi,:ogrencilist_babatelefon1,:ogrencilist_babatelefon2,:ogrencilist_babamail1,:ogrencilist_babamail2,:ogrencilist_ogrencibursdurumu,:ogrencilist_ogrencikardessayisi,:ogrencilist_ogrencilisansdurumu,:ogrencilist_yedek1,:ogrencilist_yedek2)

						");
					$stmt-> bindparam(':ogrencilist_kullaniciid',$ogrencilist_kullaniciid);
					$stmt-> bindparam(':ogrencilist_kurumno',$ogrencilist_kurumno);
					$stmt-> bindparam(':ogrencilist_resimyol',$ogrencilist_resimyol);
					$stmt-> bindparam(':ogrencilist_tcno',$ogrencilist_tcno);
					$stmt-> bindparam(':ogrencilist_sinif',$ogrencilist_sinif);
					$stmt-> bindparam(':ogrencilist_sube',$ogrencilist_sube);
					$stmt-> bindparam(':ogrencilist_cinsiyet',$ogrencilist_cinsiyet);
					$stmt-> bindparam(':ogrencilist_ad',$ogrencilist_ad);
					$stmt-> bindparam(':ogrencilist_soyad',$ogrencilist_soyad);
					$stmt-> bindparam(':ogrencilist_dogumtarihi',$ogrencilist_dogumtarihi);
					$stmt-> bindparam(':ogrencilist_ogrencitelefon',$ogrencilist_ogrencitelefon);
					$stmt-> bindparam(':ogrencilist_ogrencimail',$ogrencilist_ogrencimail);
					$stmt-> bindparam(':ogrencilist_veliadsoyad',$ogrencilist_veliadsoyad);
					$stmt-> bindparam(':ogrencilist_veliyakinlik',$ogrencilist_veliyakinlik);
					$stmt-> bindparam(':ogrencilist_velimeslek',$ogrencilist_velimeslek);
					$stmt-> bindparam(':ogrencilist_velievadresi',$ogrencilist_velievadresi);
					$stmt-> bindparam(':ogrencilist_veliisadresi',$ogrencilist_veliisadresi);
					$stmt-> bindparam(':ogrencilist_velitelefon1',$ogrencilist_velitelefon1);
					$stmt-> bindparam(':ogrencilist_velitelefon2',$ogrencilist_velitelefon2);
					$stmt-> bindparam(':ogrencilist_velitelefon3',$ogrencilist_velitelefon3);
					$stmt-> bindparam(':ogrencilist_velimail1',$ogrencilist_velimail1);
					$stmt-> bindparam(':ogrencilist_velimail2',$ogrencilist_velimail2);
					$stmt-> bindparam(':ogrencilist_anneadsoyad',$ogrencilist_anneadsoyad);
					$stmt-> bindparam(':ogrencilist_annemeslek',$ogrencilist_annemeslek);
					$stmt-> bindparam(':ogrencilist_anneevadresi',$ogrencilist_anneevadresi);
					$stmt-> bindparam(':ogrencilist_anneisadresi',$ogrencilist_anneisadresi);
					$stmt-> bindparam(':ogrencilist_annetelefon1',$ogrencilist_annetelefon1);
					$stmt-> bindparam(':ogrencilist_annetelefon2',$ogrencilist_annetelefon2);
					$stmt-> bindparam(':ogrencilist_annemail1',$ogrencilist_annemail1);
					$stmt-> bindparam(':ogrencilist_annemail2',$ogrencilist_annemail2);
					$stmt-> bindparam(':ogrencilist_babaadsoyad',$ogrencilist_babaadsoyad);
					$stmt-> bindparam(':ogrencilist_babameslek',$ogrencilist_babameslek);
					$stmt-> bindparam(':ogrencilist_babaevadresi',$ogrencilist_babaevadresi);
					$stmt-> bindparam(':ogrencilist_babaisadresi',$ogrencilist_babaisadresi);
					$stmt-> bindparam(':ogrencilist_babatelefon1',$ogrencilist_babatelefon1);
					$stmt-> bindparam(':ogrencilist_babatelefon2',$ogrencilist_babatelefon2);
					$stmt-> bindparam(':ogrencilist_babamail1',$ogrencilist_babamail1);
					$stmt-> bindparam(':ogrencilist_babamail2',$ogrencilist_babamail2);
					$stmt-> bindparam(':ogrencilist_ogrencibursdurumu',$ogrencilist_ogrencibursdurumu);
					$stmt-> bindparam(':ogrencilist_ogrencikardessayisi',$ogrencilist_ogrencikardessayisi);
					$stmt-> bindparam(':ogrencilist_ogrencilisansdurumu',$ogrencilist_ogrencilisansdurumu);
					$stmt-> bindparam(':ogrencilist_yedek1',$ogrencilist_yedek1);
					$stmt-> bindparam(':ogrencilist_yedek2',$ogrencilist_yedek2);
					$stmt->execute();
					
				}

				if ($stmt) {
					header("Location:../production/liste-ogrencieklecsv.php?durum=ok");
				} else {header("Location:../production/liste-ogrencieklecsv.php?durum=no");}
			}
		}

	}
}





// BURASI DUYURU EKLEMEDEN GERİ DÖNEN BUTONUDUR
if (isset($_POST['duyuruvazgec'])) {
	
	header("Location:../production/index.php?durum=no");	
}



// BURASI DUYURU EKLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['duyuruekle'])) {	

	$refimg=$_POST['kullanici_resimyol'];
	$refid=$_POST['kullanici_id'];
	$refadsoyad=$_POST['kullanici_adsoyad'];
	if ($_POST['duyuru_admin']=="on") { echo $admin=1; } else {echo $admin=0;}
	if ($_POST['duyuru_yonetici']=="on") { echo $yonetici=1; } else {echo $yonetici=0;}
	if ($_POST['duyuru_ogretmen']=="on") { echo $ogretmen=1; } else {echo $ogretmen=0;}
	if ($_POST['duyuru_veli']=="on") { echo $veli=1; } else {echo $veli=0;}
	if ($_POST['duyuru_ogrenci']=="on") { echo $ogrenci=1; } else {echo $ogrenci=0;}
	if ($_POST['duyuru_personel']=="on") { echo $personel=1; } else {echo $personel=0;}
	if ($_POST['duyuru_muhasebe']=="on") { echo $muhasebe=1; } else {echo $muhasebe=0;}

	$kaydet=$db->prepare("INSERT INTO duyuru SET
		duyuru_kullaniciid=:duyuru_kullaniciid,
		duyuru_kullaniciresimyol=:duyuru_kullaniciresimyol,
		duyuru_kullaniciad=:duyuru_kullaniciad,
		duyuru_duyuru=:duyuru_duyuru,

		duyuru_admin=:duyuru_admin,
		duyuru_yonetici=:duyuru_yonetici,
		duyuru_ogretmen=:duyuru_ogretmen,
		duyuru_veli=:duyuru_veli,
		duyuru_ogrenci=:duyuru_ogrenci,
		duyuru_personel=:duyuru_personel,
		duyuru_muhasebe=:duyuru_muhasebe
		");

	$insert=$kaydet->execute(array(
		'duyuru_kullaniciid' => $refid,
		'duyuru_kullaniciresimyol' => $refimg,
		'duyuru_kullaniciad' => $refadsoyad,
		'duyuru_duyuru' => $_POST['duyuru_duyuru'],

		'duyuru_admin' => $admin,
		'duyuru_yonetici' => $yonetici,
		'duyuru_ogretmen' => $ogretmen,
		'duyuru_veli' => $veli,
		'duyuru_ogrenci' => $ogrenci,
		'duyuru_personel' => $personel,
		'duyuru_muhasebe' => $muhasebe
		));

	if ($insert) {
		header("Location:../production/duyuru.php?durum=ok");
	} else {header("Location:../production/duyuru.php?durum=no");}
}




// BURASI DUYURU SİLMEYE YARAYAN KOD BLOĞUDUR.
if ($_GET['duyurusil']=="ok") {
	
	$sil=$db->prepare("DELETE from duyuru where duyuru_id=:duyuru_id");
	$kontrol=$sil->execute(array(
		'duyuru_id' =>$_GET['duyuru_id']
		));
	if ($kontrol) {
		header("Location:../production/duyurulistesi.php?durum=ok");
	} else {header("Location:../production/duyurulistesi.php?durum=no");}
}



// BURASI DUYURU DÜZENLEMEDEN GERİ DÖNEN BUTONUDUR
if (isset($_POST['duyuruduzenlevazgec'])) {
	
	header("Location:../production/duyurulistesi.php?durum=no");	
}





// BURASI DUYURU DÜZENLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['duyuruduzenle'])) {

	if ($_POST['duyuru_admin']=="on") { echo $admin=1; } else {echo $admin=0;}
	if ($_POST['duyuru_yonetici']=="on") { echo $yonetici=1; } else {echo $yonetici=0;}
	if ($_POST['duyuru_ogretmen']=="on") { echo $ogretmen=1; } else {echo $ogretmen=0;}
	if ($_POST['duyuru_veli']=="on") { echo $veli=1; } else {echo $veli=0;}
	if ($_POST['duyuru_ogrenci']=="on") { echo $ogrenci=1; } else {echo $ogrenci=0;}
	if ($_POST['duyuru_personel']=="on") { echo $personel=1; } else {echo $personel=0;}
	if ($_POST['duyuru_muhasebe']=="on") { echo $muhasebe=1; } else {echo $muhasebe=0;}

	$ayarkaydet=$db->prepare("UPDATE duyuru SET
		duyuru_duyuru=:duyuru_duyuru,
		duyuru_admin=:duyuru_admin,
		duyuru_yonetici=:duyuru_yonetici,
		duyuru_ogretmen=:duyuru_ogretmen,
		duyuru_veli=:duyuru_veli,
		duyuru_ogrenci=:duyuru_ogrenci,
		duyuru_personel=:duyuru_personel,
		duyuru_muhasebe=:duyuru_muhasebe
		WHERE duyuru_id={$_POST['duyuru_id']}");

	$update=$ayarkaydet->execute(array(
		'duyuru_duyuru' => $_POST['duyuru_duyuru'],
		'duyuru_admin' => $admin,
		'duyuru_yonetici' => $yonetici,
		'duyuru_ogretmen' => $ogretmen,
		'duyuru_veli' => $veli,
		'duyuru_ogrenci' => $ogrenci,
		'duyuru_personel' => $personel,
		'duyuru_muhasebe' => $muhasebe
		));

	if ($update) {
		header("Location:../production/duyurulistesi.php?durum=ok");
	} else {header("Location:../production/duyurulistesi.php?durum=no");}


}




// BURASI GÖREVLİST DÜZENLEMEYE YARAYAN KOD BLOĞUDUR.
if (isset($_POST['gorevlistduzenle'])) {

	if ($_POST['gorevlist_1']=="on") { echo $gorevlist_1=1; } else {echo $gorevlist_1=0;}
	if ($_POST['gorevlist_2']=="on") { echo $gorevlist_2=1; } else {echo $gorevlist_2=0;}
	if ($_POST['gorevlist_3']=="on") { echo $gorevlist_3=1; } else {echo $gorevlist_3=0;}
	if ($_POST['gorevlist_4']=="on") { echo $gorevlist_4=1; } else {echo $gorevlist_4=0;}
	if ($_POST['gorevlist_5']=="on") { echo $gorevlist_5=1; } else {echo $gorevlist_5=0;}
	if ($_POST['gorevlist_6']=="on") { echo $gorevlist_6=1; } else {echo $gorevlist_6=0;}
	if ($_POST['gorevlist_7']=="on") { echo $gorevlist_7=1; } else {echo $gorevlist_7=0;}
	if ($_POST['gorevlist_8']=="on") { echo $gorevlist_8=1; } else {echo $gorevlist_8=0;}
	if ($_POST['gorevlist_9']=="on") { echo $gorevlist_9=1; } else {echo $gorevlist_9=0;}
	if ($_POST['gorevlist_10']=="on") { echo $gorevlist_10=1; } else {echo $gorevlist_10=0;}
	if ($_POST['gorevlist_11']=="on") { echo $gorevlist_11=1; } else {echo $gorevlist_11=0;}
	if ($_POST['gorevlist_12']=="on") { echo $gorevlist_12=1; } else {echo $gorevlist_12=0;}

	$ayarkaydet=$db->prepare("UPDATE gorevlist SET
		gorevlist_1=:gorevlist_1,
		gorevlist_2=:gorevlist_2,
		gorevlist_3=:gorevlist_3,
		gorevlist_4=:gorevlist_4,
		gorevlist_5=:gorevlist_5,
		gorevlist_6=:gorevlist_6,
		gorevlist_7=:gorevlist_7,
		gorevlist_8=:gorevlist_8,
		gorevlist_9=:gorevlist_9,
		gorevlist_10=:gorevlist_10,
		gorevlist_11=:gorevlist_11,
		gorevlist_12=:gorevlist_12
		WHERE gorevlist_id=1");

	$update=$ayarkaydet->execute(array(
		'gorevlist_1' => $gorevlist_1,
		'gorevlist_2' => $gorevlist_2,
		'gorevlist_3' => $gorevlist_3,
		'gorevlist_4' => $gorevlist_4,
		'gorevlist_5' => $gorevlist_5,
		'gorevlist_6' => $gorevlist_6,
		'gorevlist_7' => $gorevlist_7,
		'gorevlist_8' => $gorevlist_8,
		'gorevlist_9' => $gorevlist_9,
		'gorevlist_10' => $gorevlist_10,
		'gorevlist_11' => $gorevlist_11,
		'gorevlist_12' => $gorevlist_12
		));

	if ($update) {
		header("Location:../production/index.php?durum=ok");
	} else {header("Location:../production/index.php?durum=no");}


}
?>