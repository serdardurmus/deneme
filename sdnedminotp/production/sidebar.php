
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h3 align="center">SD Yazılım | ANKARA</h3>
		<ul class="nav side-menu">

			<li><a href="index.php"><i class="fa fa-home"></i> Anasayfa <span class="label label-success pull-right"></span></a></li>

			<!-- ________________ Admin _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Admin") { ?>
			<li><a><i class="fa fa-list-ul"></i> Liste İşlemleri <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="kullanicilistesi.php"> Kullanıcı Listesi <span class="label label-success pull-right"></span></a></li>
					
					<li><a href="liste-ogrenci.php"> Öğrenci/Veli Listesi <span class="label label-success pull-right"></span></a></li>
					
				</ul>
			</li>
			
			<li><a href="duyuru.php"><i class="fa fa-bullhorn"></i> Anasayfaya Duyuru Gir <span class="label label-success pull-right"></span></a></li>
			<hr>
			<li><a href="menu.php"><i class="fa fa-user"></i> Öğrenciye Özel Bilgi <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-pagelines"></i> Davranış - Gözlem <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-comments-o"></i> Rehberlik <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bullhorn"></i> Duyurular <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-university"></i> Okul Faaliyetleri <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-edit"></i> Ödevler <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-book"></i> Kitaplar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-envelope-o"></i> Mesajlar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bar-chart"></i> Karne ve Raporlar <span class="label label-success pull-right"></span></a></li>
			<?php } ?>

			<!-- ________________ Yönetici _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Yönetici") { ?>
			<li><a href="menu.php"><i class="fa fa-user"></i> Profil Tanımla İşlemleri <span class="label label-success pull-right"></span></a></li>
			<li><a><i class="fa fa-list-ul"></i> Liste İşlemleri <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="kullanicilistesi.php"> Kullanıcı Listesi <span class="label label-success pull-right"></span></a></li>
					
					<li><a href="liste-ogrenci.php"> Öğrenci/Veli Listesi <span class="label label-success pull-right"></span></a></li>
					
				</ul>
			</li>
			
			<li><a href="duyuru.php"><i class="fa fa-bullhorn"></i> Anasayfaya Duyuru Gir <span class="label label-success pull-right"></span></a></li>
			<hr>
			<li><a href="menu.php"><i class="fa fa-user"></i> Öğrenciye Özel Bilgi <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-pagelines"></i> Davranış - Gözlem <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-comments-o"></i> Rehberlik <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bullhorn"></i> Duyurular <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-university"></i> Okul Faaliyetleri <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-edit"></i> Ödevler <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-book"></i> Kitaplar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-envelope-o"></i> Mesajlar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bar-chart"></i> Karne ve Raporlar <span class="label label-success pull-right"></span></a></li>
			<?php } ?>

			<!-- ________________ Öğretmen _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Öğretmen") { ?>
			<li><a href="menu.php"><i class="fa fa-user"></i> Profil Tanımla İşlemleri <span class="label label-success pull-right"></span></a></li>
			
			<hr>
			<li><a href="menu.php"><i class="fa fa-user"></i> Öğrenciye Özel Bilgi <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-pagelines"></i> Davranış - Gözlem <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-comments-o"></i> Rehberlik <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bullhorn"></i> Duyurular <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-university"></i> Okul Faaliyetleri <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-edit"></i> Ödevler <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-book"></i> Kitaplar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-envelope-o"></i> Mesajlar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bar-chart"></i> Karne ve Raporlar <span class="label label-success pull-right"></span></a></li>
			<?php } ?>

			<!-- ________________ Veli _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Veli") { ?>
			
			<li><a href="menu.php"><i class="fa fa-user"></i> Öğrenciye Özel Bilgi <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-pagelines"></i> Davranış - Gözlem <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-comments-o"></i> Rehberlik <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bullhorn"></i> Duyurular <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-university"></i> Okul Faaliyetleri <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-edit"></i> Ödevler <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-book"></i> Kitaplar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-envelope-o"></i> Mesajlar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bar-chart"></i> Karne ve Raporlar <span class="label label-success pull-right"></span></a></li>
			<?php } ?>

			<!-- ________________ Öğrenci _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Öğrenci") { ?>
			
			<li><a href="menu.php"><i class="fa fa-user"></i> Öğrenciye Özel Bilgi <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-pagelines"></i> Davranış - Gözlem <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-comments-o"></i> Rehberlik <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bullhorn"></i> Duyurular <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-university"></i> Okul Faaliyetleri <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-edit"></i> Ödevler <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-book"></i> Kitaplar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-envelope-o"></i> Mesajlar <span class="label label-success pull-right"></span></a></li>
			<li><a href="menu.php"><i class="fa fa-bar-chart"></i> Karne ve Raporlar <span class="label label-success pull-right"></span></a></li>
			<?php } ?>

			<!-- ________________ Personel _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Personel") { ?>
			<li><a><i class="fa fa-user"></i> Yönetici Özel Menü <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="kullanicilistesi.php"> Yemek Listesi <span class="label label-success pull-right"></span></a></li>
				</ul>
			</li>
			<?php } ?>

			<!-- ________________ Muhasebe _________________________ -->
			<?php 
			if ($kullanicicek['kullanici_yetki']=="Muhasebe") { ?>
			<li><a><i class="fa fa-user"></i> Yönetici Özel Menü <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="kullanicilistesi.php"> Yemek Listesi <span class="label label-success pull-right"></span></a></li>
				</ul>
			</li>
			<?php } ?>


		</ul>
	</div>

</div>
            <!-- /sidebar menu -->