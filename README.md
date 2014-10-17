smsApi
======

kurecell.com.tr için hazırladığım sms api sınıfı 

Kullanımı 



<?php
	include  ("smsApi.class.php");
	$user = ""; // kullanıcı adınız 
	$pass = ""; // şifreniz
	 
	$sms = new smsApi($user,$pass);
	
	
	// çoklu sms gönderme 
	$baslik = "Vehbi"; // sms başlığı
	$icerik = "sms içeriği"; // sms içeriği 
	$numaralar = array(); //tek veya birden fazla numara girebilirsin
	 $rapor = $sms->cokluSms($baslik,$icerik,$numaralar); 
	
	
	
	
	// 
	$kontor = $sms->kontorMiktari(); // kontör miktarı
	echo "<h3>Kontör Miktarı </h3>";
	foreach($kontor as $baslik =>$icerik) {
		echo "$baslik : $icerik<br/>";
	}
	
	// 
	$mesajlar = $sms->tanimliMesajBasliklari(); // Mesaj Başlıklarınız 
	echo "<h3>Tanımlı Mesaj Başlıkları </h3>";
	foreach($mesajlar as $baslik =>$icerik) {
		echo "$baslik : $icerik<br/>";
	}
	
	// 
	$mesajId = "2690734"; // mesaj ıd si 
	$rapor = $sms->mesajRaporlari($mesajId); // Mesaj Raporları 	
	echo "<h3>Mesaj Raporu </h3>";
	foreach( $rapor[0] as $r => $value)
		echo "$r: $value<br/>";
	
	
	// 
	

?>
