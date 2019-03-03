<?php 
/*---------------------------------------------------------------------


$metin1 ve $metin2 içerisinde verilen 2 string'in(karakter katarı) içinde geçen ve birbirinden boşluk karakteriyle ayrılmış kelimelerin küme bileşimini, farkını ve kesişimini dizi olarak döndüren kelimeBirlesim($kume1, $kume2), kelimefark($kume1, $kume2), kelimeKesisim($kume1, $kume2) fonksiyonlarını yazınız. İki metni klavyeden okuyarak bunların bileşimini, farkını ve kesişimini yukardaki fonksiyonlarını çağırarak bulan ve sonuçlarını ekrana yazdıran programı veriniz. String'i kelimelerine ayırmak için substr haricinde hazır fonksiyon kullanmayınız.

Örnek senaryo:

Birinci metni giriniz?
istanbul üniversitesi
İkinci metni giriniz?
cerrahpaşa üniversitesi
Küme birleşimi: istanbul üniversitesi cerrahpaşa
Küme kesişim: üniversitesi
Küme farkı: istanbul  


----------------------------------------------------------------------*/

echo "lutfen birinci metini giriniz: ";
$metin1 = trim(fgets(STDIN));
echo "lutfen ikinci metini giriniz: ";
$metin2 = trim(fgets(STDIN));
$birlesim = kelimeBirlesim($metin1, $metin2);
$fark = kelimeFark($metin1, $metin2);
$kesisim = kelimeKesisim($metin1, $metin2);
yaz($birlesim,$fark,$kesisim);


/*---------------------------------------------------------------------
verilen stringlerdeki kelimelerin birlesim kumesini bulur
----------------------------------------------------------------------*/
function kelimeBirlesim($kume1, $kume2){
	$dizi1 = explode(' ', $kume1); //$dizi1 e $kume1 deki sitrigin kelimelerini atar
	$dizi2 = explode(' ', $kume2); //$dizi2 e $kume2 deki sitrigin kelimelerini atar
	$birlesim = array();
	for($i = 0; $i < count($dizi1); $i++){//$dizi1 i birlesim dizisine atar
		$birlesim[] = $dizi1[$i];
	}	
	for($j = 0; $j < count($dizi2); $j++){
		if(icindeVar(($dizi2[$j]), $birlesim) == 0){ //dizi2 deki kelimeler birlesim 
			$birlesim[] = $dizi2[$j];  //dizisinde yok ise onlari birlesim dizisine atar
		}
	}
	return $birlesim;	
}


/*---------------------------------------------------------------------
verilen karakter $dizi icinde yok ise sifir var ise bir döndürür
----------------------------------------------------------------------*/
function icindeVar($karakter , $dizi){
	$flag = 0;
	for($k = 0; $k < count($dizi); $k++){
		if($karakter == $dizi[$k]){
			$flag = 1;
		}
	}
	return $flag;
}


/*---------------------------------------------------------------------
verilen stringleri dizilere koyup fark kumesini bulur
----------------------------------------------------------------------*/
function kelimeFark($kume1, $kume2){
	$dizi1 = explode(' ', $kume1);
	$dizi2 = explode(' ', $kume2);
	$fark = array();
	
	for($j = 0; $j < count($dizi1); $j++){
		$fark[] = $dizi1[$j];
	}
	for($i = 0; $i < count($fark); $i++){	
        if(icindeVar($fark[$i],$dizi2) == 1)//$fark daki karakterler $dizi2 de
			unset($fark[$i]);         // geçiyorsa o karakteri $fark dan siler
	}
	
	$farkSon = array();
	for($i = 0; $i < count($fark); $i++){
		if ($fark[$i] != NULL)    //$fark daki degerlerden NULL olmayanları 
			$farkSon[] = $fark[$i]; //$farkSon dizisine atar
	}	
	return $farkSon; 
}


function kelimeKesisim($kume1, $kume2){
	$dizi1 = explode(' ', $kume1);
	$dizi2 = explode(' ', $kume2);
	
	$kesisim = array(); 
	for($i = 0; $i < count($dizi1); $i++){
		for($j = 0; $j < count($dizi2); $j++){
			if($dizi1[$i] == $dizi2[$j]){  // $dizi1[$i]karakteri her iki stringde de geçiyorsa,
                if(icindeVar($dizi1[$i],$kesisim) == 0)//$dizi1[$i] karakteri $kesisim sonucunda geçmiyorsa
					$kesisim[]= $dizi1[$i];  //$dizi1[$i] karakterini  $kesisim'e ekle 
			}
		}
	}
	return $kesisim;	
	
}

/*--------------------------------------------------------------------- 
verilen parametrelerle metnin birlesim fark ve kesisim kumesini ekrana yazar
----------------------------------------------------------------------*/
function yaz($birles, $fark, $kesisim){
	
	print "birlesimleri: \n";
	for($i = 0;$i < count($birles);$i++){
		print $birles[$i]." ";
	}
	
	print "\nfarklari: \n";
	for($i = 0;$i < count($fark);$i++){
		print $fark[$i];
	}
	print "\nkesisimleri: \n";
	for($i=0;$i<count($kesisim);$i++){
		print $kesisim[$i];
	} 
	
}

?>
