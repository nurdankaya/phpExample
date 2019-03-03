 <?php
 /*---------------------------------------------------------------------
Verilen bir dizinin elemanlarını küçükten büyüğe sıralayan diziSirala fonksiyonu yazınız. 
sort gibi hazır fonksiyon kullanmayınız. Verilen bir dizideki sayıları
 önce diziOku fonksiyonunu çağırarak okuyan, sonra bu diziyi diziSirala fonsiyonunu 
 çağırarak sıralayan ve diziYaz fonsiyonunun çağırarak ekrana yazdıran programı veriniz.
----------------------------------------------------------------------*/
 print "lutfen siralamak istediginiz sayilari giriniz: \n";
 $dizi = diziOku();
 $sonuc = diziSirala($dizi);
 diziYaz($sonuc);
 
 
 /*-------------------------------------------------------------- 
$dizim adli dizideki elemanları kucukten buyuge siralar
--------------------------------------------------------------*/
function diziSirala($dizim){          
	for($i = 0; $i < count($dizim); $i++){    //  dizideki sirali iki terimi karsılastirir ve
		for($j = 0; $j <= count($dizim)-1; $j++){
			if($dizim[$j] > $dizim[$i]){      //  kucuk olani bir değiskende saklayarak
				$temp = $dizim[$j];           //  yerlerini degistirir.
				$dizim[$j] = $dizim[$i];
				$dizim[$i] = $temp;
			}
		}
	}
	return $dizim;
}


 /*-------------------------------------------------------------- 
diziOku adli fonksiyon kullanicidan dizi icin girilen degerleri alir
--------------------------------------------------------------*/
function diziOku(){       
	$i = 0;
	$dizi = array();           //$dizi adinda bos dizi tanimlar
	do{
		$deger = (int)fgets(STDIN);
		if($deger == 0)       //$deger sifir olursa donguden cık
			break;
		$dizi[$i] = $deger;
		$i++;
	}while($deger);          //$deger false olunca donguden cıkar
	
	return $dizi;
}



/*-------------------------------------------------------------- 
$siralidizi adli dizideki değerleri ekrana yazdırır
--------------------------------------------------------------*/
function diziYaz($siralidizi){
	print "girdiginiz sayilarin kucukten buyuge sırasi : \n";
	for($i = 0; $i < count($siralidizi); $i++)    
		print $siralidizi[$i]."\n";
	
}

?>
