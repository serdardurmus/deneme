<?php 

try{

	$db=new PDO("mysql:host=localhost; dbname=mbotp;charset=utf8", 'root','qqwb7tym83');
	// echo "Veri tabanı bağlantısı yapıldı...";

}

catch (PDOExpception $e){
	echo $e->getMessage();
}
 

 ?>
