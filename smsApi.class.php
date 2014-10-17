<?php
/* 
	Bu PHP Dosyasi Vehbi Akdogan Tarafindan Kodlanmistir.
	E-Posta: mf.leqelyy@gmail.com
	Web: vehbiakdogan.com
*/



class smsApi {
	private $kullaniciAdi;
	private $sifre;
	public function __construct($kullaniciAdi="",$sifre=""){
		if(empty($kullaniciAdi) || empty($sifre)) {
			echo" Geçersiz Giriş İşlemi";
			exit();
		}else {
			$this->kullaniciAdi = $kullaniciAdi;
			$this->sifre = $sifre;
		}
	}
	/**
	* 
	* @param array $strRequest
	* 
	* @return string 
	* Yardımcı Sms Gönderme Fonksiyonu
	*/
	private function smsGonder($strRequest){
		$ch=curl_init();
		$veri = http_build_query($strRequest);
		curl_setopt($ch, CURLOPT_URL, "http://kurecell.com.tr/kurecellapiV2/api-center/");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1) ;
		curl_setopt($ch, CURLOPT_POSTFIELDS,$veri);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
		 
	 
	/**
     * @param string $baslik
     * @param string $mesaj
     * @param array $numaralar
     * @return array
     *
     * Çoklu sms gönderir.
     */
    
     
	public function cokluSms($baslik,$mesaj,$numaralar){
		
		$veriler = array(
			'apiNo' =>'1',
			'user' =>$this->kullaniciAdi,
			'pass' =>$this->sifre,
			'mesaj'=>$mesaj,
			'numaralar' =>$numaralar,
			'baslik' =>$baslik,
			);
			return $this->smsGonder($veriler);
	}
	
	

	/**
	* 
	* 
	* @return jSon array
	* Bu Fonksiyon Kontor Miktarınızın jSon olarak size verir.
	*/
	public function kontorMiktari(){
		$veriler = array(
			'apiNo' =>'2',
			'user' =>$this->kullaniciAdi,
			'pass' =>$this->sifre
		);
		return json_decode($this->smsGonder($veriler));
	}
	
	
	/**
	* 
	* 
	* @return Json array
	* Bu Fonksiyon kurecell.com.tr deki mevcut başlıklarınızı json olarak size verir.
	*/
	
	public function tanimliMesajBasliklari(){
		$veriler = array(
			'apiNo' =>'3',
			'user' =>$this->kullaniciAdi,
			'pass' =>$this->sifre
		);
		return json_decode($this->smsGonder($veriler));
	}
	
	/**
	* 
	* 
	* @return json Array
	* Bu Fonksiyon Mesaj Raporlarınızı json çıktısı olarak size verir.
	*/
	
	
	public function mesajRaporlari($mesajId) {
		$veriler = array(
			'apiNo' =>'4',
			'user' =>$this->kullaniciAdi,
			'pass' =>$this->sifre,
			'id' => $mesajId
		);
		return json_decode($this->smsGonder($veriler));
	}
	
	
}
?>
