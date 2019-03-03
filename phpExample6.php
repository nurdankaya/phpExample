<?php
/*---------------------------------------------------------------------


$metin1 ve $metin2 içerisinde verilen 2 string'in(karakter katarı) içinde geçen karakterlerin (harf, rakam, sembol vs.) küme bileşimini, farkını ve kesişimini string olarak döndüren metinBirlesim($metin1, $metin2), metinfark($metin1, $metin2), metinKesisim($metin1, $metin2) fonksiyonlarını yazınız. İki metni klavyeden okuyarak bunların bileşimini, farkını ve kesişimini yukardaki fonksiyonlarını çağırarak bulan ve sonuçlarını ekrana yazdıran programı veriniz.

//  verilen bir metnin karakterlerini her satıra bir karakter yazan örnek bir program
<?php
print "Bir metin giriniz? ";
$metin1 = fgets(STDIN);
for($i=0; $i < strlen($metin1); $i = $i + 1){
	print substr($metin1, $i, 1) ."\n";
	print $metin1[$i]. "\n";
}
?>

Örnek senaryo:

Birinci metni giriniz?
istanbul
İkinci metni giriniz?
üniversitesi
Küme birleşimi: istanbulüver
Küme kesişim: istn
Küme farkı: abul



----------------------------------------------------------------------*/

echo "birinci metini giriniz: ";
$metin1 = trim(fgets(STDIN));

echo "ikinci metini giriniz: ";
$metin2 = trim(fgets(STDIN));

$b = metinBirlesim($metin1, $metin2);
$f = metinFark($metin1, $metin2);
$k = metinKesisim($metin1, $metin2);
yaz($b, $f, $k);


/*--------------------------------------------------------------------- 
verilen metinlerdeki harflerin birlesim kumesini bulur
----------------------------------------------------------------------*/
function metinBirlesim($metin1 , $metin2){
	for($i = 0; $i < strlen($metin1); $i++){  //$metin1 string inin karakterlerini $m1 dizisine atar
		$m1[$i] = substr($metin1,$i,1);
	}
	for($i = 0; $i < strlen($metin2); $i++){  //$metin2 string inin karakterlerini $m2 dizisine atar
		$m2[$i] = substr($metin2,$i,1);
	}
	
	$birlesim = array();
	for($i = 0; $i < count($m1); $i++){ //$m1 dizisindekileri $birlesim dizisine atar
		$birlesim[] = $m1[$i];
	}
	for($i = 0; $i < count($m2); $i++){	 
		if(icindenGeciyorsa($m2[$i], $birlesim) == 0){//$m2 disindeki karakterler
			$birlesim[] = $m2[$i];                //birlesim dizisinde geçmiyorsa
		}										//o karakteri birlesime atar
	}
	return $birlesim;
	
}

/*--------------------------------------------------------------------- 
verilen metinlerdeki harflerin fark kumesini bulur
----------------------------------------------------------------------*/
function metinFark($metin1,$metin2){
	
	for($i = 0; $i < strlen($metin1); $i++){ //$metin1 string indeki elemanları $m1 dizisine atar
		$m1[$i] = substr($metin1,$i,1);
	}
	for($i = 0; $i < strlen($metin2); $i++){ //$metin2 string indeki elemanları $m2 dizisine atar
		$m2[$i] = substr($metin2,$i,1);
	}
	
	for($i = 0; $i < count($m1); $i++){	
        if(icindenGeciyorsa($m1[$i], $m2) == 1)//$m1 deki karakterler $m2 de geçiyorsa
			unset($m1[$i]);          // o karakteri $m1 den siler
	}
	$fark = array();
	for($i = 0; $i < strlen($metin1); $i++){
		if ($m1[$i] != NULL)    //$m1 deki degerlerden NULL olmayanları $fark dizisine atar
			$fark[] = $m1[$i];
	}							
	return $fark;   // m1 den m2 de olan elemanlari silince farki bulmus olduk ve return ettik
}

/*--------------------------------------------------------------------- 
verilen metinlerdeki ortak harfleri(kesisim) bulur
----------------------------------------------------------------------*/
function metinKesisim($metin1, $metin2){
	for($i = 0; $i < strlen($metin1); $i++){ //$metin1 stringini $m1 dizisine atar
		$m1[$i] = substr($metin1,$i,1);
	}
	for($i = 0; $i < strlen($metin2); $i++){//$metin2 stringini $m2 dizisine atar
		$m2[$i] = substr($metin2,$i,1);
	}
	
	$kesisim = array(); 
	for($i = 0; $i < count($m1); $i++){
		for($j = 0; $j < count($m2); $j++){
			if($m1[$i] == $m2[$j]){  // $metin1[$i]karakteri her iki stringde de geçiyorsa,
                if(icindenGeciyorsa($m1[$i],$kesisim) == 0)//$metin1[$i] karakteri $kesisim sonucunda geçmiyorsa
					$kesisim[]= $m1[$i];  //$metin1[$i] karakterini  $kesisim'e ekle 
			}
		}
	}	
	return $kesisim;	
}


/*--------------------------------------------------------------------- 
verilen karakterin metinde gecip gecmedigini kontrol eder
----------------------------------------------------------------------*/
function icindenGeciyorsa($karakter, $metin){
	$flag = 0;
	for($i = 0; $i < count($metin); $i++){
		if($karakter == $metin[$i]){//$karakter metinde geçiyorsa,
			$flag = 1; //$flag 1 olur ve fonksiyon 1 döndürür(return ile)
		}
	}
	return $flag;
}

/*--------------------------------------------------------------------- 
verilen parametrelerle metnin birlesim fark ve kesisim kumesini ekrana yazar
----------------------------------------------------------------------*/
function yaz($birles, $fark, $kesisim){
	
	print "birlesimleri: \n";
	for($i = 0;$i < count($birles);$i++){
		print $birles[$i];
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
