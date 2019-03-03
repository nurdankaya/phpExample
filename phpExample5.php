<?php
 /*---------------------------------------------------------------------
 
Verilen iki diziyi küme kabul ederek küme bileşimini, farkını ve kesişimini dizi
 olarak döndüren birlesim($kume1, $kume2), fark($kume1, $kume2), kesisim($kume1, $kume2) 
 fonksiyonlarını yazınız. İki kümedeki elemanları diziOku fonksiyonunu çağırarak okuyan
 sonra bu dizilerin bileşimini, farkını ve kesişimini yukardaki fonksiyonlarını çağırarak 
 bulan ve diziYaz fonksiyonuyla ekrana yazdıran programı veriniz.

----------------------------------------------------------------------*/

print "lutfen birinci diziyi giriniz: (sifir girince biter) \n";
$dizi1 = diziOku();
print "lutfen ikinci diziyi giriniz: (sifir girince biter) \n";
$dizi2 = diziOku();
$birlesim = birlesim($dizi1, $dizi2);
$fark = fark($dizi1,$dizi2);
$kesisim = kesisim($dizi1, $dizi2);
diziYaz($birlesim, $fark, $kesisim);


/*-------------------------------------------------------------- 
Verilen $kume1 ve $kume2 dizilerinin birlesim kumesini dizi olarak verir.
--------------------------------------------------------------*/
function  birlesim($kume1, $kume2){  
	for($i = 0; $i < count($kume2); $i++){	//$kume2 de bulunan elemanlardan
		if((icindenGeciyorsa($kume2[$i], $kume1)) == 0){ //kume1 de geçmeyenlerini
			$kume1[] = $kume2[$i];   //kume1 e atar boylece tekrarsiz birlesim kumesini bulur
	    }
	}
	return $kume1;
}


/*-------------------------------------------------------------- 
Verilen $kume1 ve $kume2 dizilerinin fark kumesini dizi olarak verir.
--------------------------------------------------------------*/ 
function fark($kume1, $kume2){
	$fark = array();
	for($i = 0; $i < count($kume2); $i++){  	//$kume1 de ve $kume2 de esit olan elemani
		if(icindenGeciyorsa($kume1[$i], $kume2) == 1) //$kume1 den unset ile siler
			unset($kume1[$i]);		
	}
	for($n = 0; $n < count($kume1); $n++){
		if($kume1[$n] != NULL) //bos olmayan kume1 elemanlarini fark dizisine atar
			$fark[] = $kume1[$n];
	}
	return $fark; 
}


/*-------------------------------------------------------------- 
Verilen $kume1 ve $kume2 dizilerinin kesisim kumesini dizi olarak verir.
--------------------------------------------------------------*/
function kesisim($kume1, $kume2){
	$kesisim = array();
	for($i = 0; $i < count($kume1); $i++){   //$kume1 dizisindeki sayilardan 
	   if((icindenGeciyorsa($kume1[$i], $kume2)) == 1){ //$kume2 de olanlari
			$kesisim[] = $kume1[$i];        //$kesisim dizisine atar
		}
	}
	return $kesisim;
}

/*-------------------------------------------------------------- 
verilen sayinin bir dizide gecip gecmedigine karar verir
--------------------------------------------------------------*/
function icindenGeciyorsa($sayi, $dizi){
	$flag = 0;
	for($i = 0; $i < count($dizi); $i++){
		if($sayi == $dizi[$i]){//$sayi dizide geciyorsa,
			$flag = 1; //$flag 1 olur ve fonksiyon 1 döndürür(return ile)
		}
	}
	return $flag;
}	

/*-------------------------------------------------------------- 
Kullanici tarafindan girilen sayıla ile dizi olusturur
--------------------------------------------------------------*/
function diziOku(){
	$i = 0;
	$dizi = array();        //bos array  tanımlar
	do{
		$deger = (int)fgets(STDIN);
		if ($deger == 0)     //$deger sifira esit ise donguden cıkar
			break;
		$dizi[$i] = $deger;     //$deger icideki degeri diziye ekler 
		$i++;
	}while($deger);         //$deger false (sifir) olana kadar dongu calisir
	return $dizi;

}


/*-------------------------------------------------------------- 
Verilen $birlesim, $fark ve $kesisim dizilerini ekrana yazar.
--------------------------------------------------------------*/
function diziYaz($birlesim, $fark, $kesisim){
	print "birlesim kumesi: \n";
	for($i = 0; $i < count($birlesim); $i++){
		print $birlesim[$i]."\n";
	}
	
	print "fark kumesi: \n"; //foreach ile fark dizindeki elemanları yazar
	foreach($fark as $f){
		print $f."\n";
	}
	print "kesisim kumesi: \n";
	for($i = 0; $i < count($kesisim); $i++){
		print $kesisim[$i]."\n";
	}
}

?>
