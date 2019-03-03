<?php 
 /*---------------------------------------------------------------------
Verilen bir dizinin medyanını döndüren diziMedyani fonksiyonu yazınız 
(Medyan yani orta elemanını bulma: Dizideki sayılar küçükten büyüğe sıralanır.
 Dizideki eleman sayısı n tek sayıysa, orta eleman tamsayı bölmeyle n/2. elemandır.
 Eleman sayısı çift sayıysa, orta eleman dizinin ortasındaki 2 elemanın yani 
 (n/2)-1. eleman ve n/2. elemanın ortalamasıdır.) Verilen bir dizideki sayıları 
 önce diziOku fonksiyonunu çağırarak okuyan, sonra bu diziyi diziMedyani fonsiyonunu
 çağırarak medyanını bulan ve ekrana diziYaz ile yazdıran programı veriniz.
 diziMedyani fonksiyonu siralama için hazır sort fonksiyonunu kullanabilir.

----------------------------------------------------------------------*/


 print "lutfen sayi giriniz (sifir girince dizi biter)\n";
 $dizim = diziOku();
 $ortanca = diziMedyani($dizim);
 print  "girdiginiz sayilarin ortancasi(medyan) : \n".$ortanca;
 
/*-------------------------------------------------------------- 
verilen dizinin medyanini bulur
--------------------------------------------------------------*/
 function diziMedyani($dizi){   
	$elemanSayisi = count($dizi);
	sort($dizi);       // diziyi sıralar
	
	if(($elemanSayisi % 2) == 1){		 // dizideki eleman sayisinin tek ise
		$x = $elemanSayisi / 2;
		$medyan = $dizi[$x] ; // dizinin orta elemanını dizideki eleman sayisini ikiye bolerek bulur
	}
	else{		 //dizideki eleman sayisi cift ise
		$x = ((($elemanSayisi / 2) - 1) + ($elemanSayisi / 2)) / 2;
		$medyan = $dizi[$x]; //orta elemanı ortadaki iki elemanin ortalamasi ile bulur 
	}
	return $medyan;
 }
 

 /*-------------------------------------------------------------- 
kulanicidan girilen degerleri hafizaya alır ve diziye yazar
--------------------------------------------------------------*/
 function diziOku(){       
	 $i = 0;
	 $dizi = array() ;        //bos dizi tanımlar
	 do{
		 $deger = (int)fgets(STDIN);
		 if($deger == 0)        //$deger sifira esitse donguden cıkar
			 break;
		 $dizi[$i] = $deger;
		 $i++;
		 
	 }while($deger);
	return $dizi;
 }
 ?>
