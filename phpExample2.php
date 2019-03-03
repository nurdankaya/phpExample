<?php
/*---------------------------------------------------------------------
Verilen iki dizinin bir döngüyle karşılıklı elemanları toplamı, çarpımını bir dizi olarak döndüren
 toplama($kume1, $kume2), carpma($kume1, $kume2), cikarma($kume1, $kume2) fonksiyonlarını yazınız.
 İki dizideki elemanları diziOku fonksiyonunu çağırarak okuyan sonra bu dizilerin toplam, çarpım ve
 farklarını ilgili fonksiyonlarını çağırarak bulan ve diziYaz fonksiyonuyla ekrana yazdıran
 programı veriniz.
----------------------------------------------------------------------*/

print "lutfen birinci diziyi giriniz (sifir girinice dizi biter)\n";
$dizi1 = diziOku();
print "lutfen ikinci diziyi giriniz (sifir girinice dizi biter)\n";
$dizi2 = diziOku();
$arti = toplama($dizi1, $dizi2);
$eksi = cikarma($dizi1, $dizi2);
$carpi = carpma($dizi1, $dizi2);
diziyaz($arti, $eksi, $carpi);


/*-------------------------------------------------------------- 
$kume1 ve $kume2 dizilerindeki karsilikli elemanlari toplar
--------------------------------------------------------------*/
function toplama($kume1, $kume2){  
	for($i = 0; $i < count($kume1); $i++){ //$kume1 ve $kume2 dizilerindeki karsilikli 
		$toplam[$i] = $kume1[$i] + $kume2[$i];//elemanlari tolamini $toplam disine atar
	}
	return $toplam;
}
function cikarma($kume1, $kume2){
	for($i = 0; $i < count($kume1); $i++){
		if($kume1[$i] >= $kume2[$i])//eger $kume1[$i] daha buyukse pozitif sonuc icin
			$fark[$i] = $kume1[$i] - $kume2[$i];//buyukten kucugu cıkarir
		else
			$fark[$i] = $kume2[$i] - $kume1[$i];
	}    //eger $kume1[$i] daha buyukse pozitif sonuc icin buyukten kucugu cıkarir
	return $fark;
}


/*-------------------------------------------------------------- 
$kume1 ve $kume2 dizilerindeki karsilikli elemanlari carpar
--------------------------------------------------------------*/
function carpma($kume1, $kume2){               
	for($i=0;$i<count($kume1);$i++){
		$carpim[$i]=$kume1[$i]*$kume2[$i];
	}
	return $carpim;
}


/*-------------------------------------------------------------- 
kullanici tarafindan girilen diziyi hafizaya alir
--------------------------------------------------------------*/
function diziOku(){  
	$i = 0;
	$dizi = array();    //bos bir $dizi adinda dizi tanımlama
	do{
		$temp = (int)fgets(STDIN);
		if ($temp == 0)  //eger kullanici sifir girerse döngüyü sonlandırır
			break;
		$dizi[$i] = $temp; //$temp adli elemanı  $dizi adli dizinin sonuna ekle
		$i++;
	}while($temp);
	return $dizi;
}



/*-------------------------------------------------------------- 
diziYaz fonksiyonu $dizi1 ve $dizi2 nin karşılıklı degerlerinin 
toplamini, farkini ve carpimini ekrana yazdirir
--------------------------------------------------------------*/
function diziYaz($top, $cik, $carp){ 
	print "dizilerde karsılıklı elemanlarin toplami: \n";		
	for($i = 0; $i < count($top); $i++)
		print $top[$i]."\n";
	
	print "dizilerde karsılıklı elemanlarin farki: \n";
	for($i = 0; $i < count($cik); $i++)
		print $cik[$i]."\n";
	
	print "dizilerde karsılıklı elemanlarin carpimi: \n";
	for($i = 0; $i < count($carp); $i++)
		print $carp[$i]."\n";
}
 ?>
