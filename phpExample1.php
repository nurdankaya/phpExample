<?php 

/*----------------------------------------------
 print reverse of the array while enter 0
 
 
 
 Verilen bir dizinin eleman sırasını tersine çevirip bir dizi olarak döndüren diziTersi($dizi1, $dizi2) 
 fonksiyonu yazınız. Sıfır(0) sayısı girilinceye kadar klavyeden girilen sayıları bir diziye 
 yerleştiren ve bu diziyi döndüren diziOku fonksiyonunu yazınız. Verilen bir diziyi her satıra
 bir sayı gelecek şekilde ekrana yazdıran diziYaz fonksiyonunu yazınız. Verilen bir dizideki 
 sayıları önce diziOku fonksiyonunu çağırarak okuyan, sonra bu diziyi diziTersi fonsiyonunu 
 çağırarak tersine çeviren ve diziYaz fonsiyonunun çağırarak ekrana yazdıran programı veriniz. 

Örnek çalışma senaryosu:
--------------------------------------
Sayıları giriniz (sıfırla bitiriniz)
2
3
4
0
Dizinin tersi:
4
3
2
 
 -----------------------------------------------*/ 

$dizi = diziOku();
$sonuc = diziTersi($dizi);
print "Dizinin tersi\n";
diziYaz($sonuc);

function diziTersi(){
	
	return;
}
function diziYaz(){
	
	for($i = 0; $i < count($x); $i++){
		print $dizi[$i] . "\n";
	}
	return;
}
function diziOku(){
	
	$i = 0;
	$temp = array();		// bos array tanımla
	// klavyeden sayıları oku ve $temp dizisine sakla
	do{
		$deger = (int)fgets(STDIN);	// bir sayi oku
		if($deger == 0)		// eger girilen sayi sıfırsa
			break;			// donguden cik
		$temp[$i] = $deger;	// $deger'i $temp dizisine ekle
		//$temp[] = $deger; şeklinde de yazılabilir
		$i++;
	}while($deger)			// eger $deger sıfırdan(false) farklıysa
	return $temp;
}
?>