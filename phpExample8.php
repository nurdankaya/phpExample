<?php 
/*---------------------------------------------------------------------


(i) Klavyeden girilen kitap adı ve fiyatlarını dizi(ler)de saklayıp (kitap adı boş girilince bilgi girişi biter), 
(ii) en pahalı ve en ucuz hariç tutularak hesaplanan ortalama kitap fiyatına en yakın kitap(lar)ın ismini yazdıran, 
(iii) ortalama fiyata olan fiyat uzaklıkların ortalamasını (yani fiyatların standart sapması) bulup yazdıran, 

Bu programı (soru 8) test ederken en az üç farklı fiyat girilecek. Sedece iki veya bir farklı fiyat girilirse program, heaplama yapmayıp yeniden en az 3 farklı kitap/fiyat bilgi girişini baştan talep edecektir. En ucuz ve en pahalı kitap birden fazla varsa onların tamamını ortalama hesabının dışında tutacaksınız.


Örnek senaryo:

Kitap adi? safahat
Kitap fiyati? 25
Kitap adi? Serguzest
Kitap fiyati? 35
Kitap adi? Calikusu
Kitap fiyati? 10
Kitap adi? 
ortalamaya en yakın kitapların fiyatları:
Serguzest 25TL
Standart sapma: 7,5


----------------------------------------------------------------------*/
$ad = array();
$fiyat = array();
$i = 0;
do{      // ad ve fiyat bilgisini $ad bos girilene kadar alir
	echo "lutfen kitabin adini giriniz: ";
	
	$deger1 = trim(fgets(STDIN));   //trim $deger1 içindeki \n karakterini siler
	if($deger1 == ''){     // bos girilince donguden cıkar.
		break;
	}
	$ad[$i] = $deger1;   //alinan $deger1 degerlerini $ad dizisine atar
	echo "lutfen kitabin fiyatini giriniz :";//alinan $deger1 degerlerini $ad dizisine atar
	
	$deger2 = (int)fgets(STDIN);
	$fiyat[$i] = $deger2;  //alinan $deger2 degerlerini $fiyat dizisine atar
	 $i++;
}while($deger1);

	if(count($ad) < 3){    //ort en yakin kitabi basmak icin en az uc deger girilmeli
			echo "lutfen en az uc deger giriniz!!";
	}
ortYakinKitaplar($ad, $fiyat);
standartSapma($fiyat);


/*--------------------------------------------------------------------- 
verilen fiyat dizisinde ortalamaya en yakin kitabi verir
----------------------------------------------------------------------*/
function ortYakinKitaplar($ad, $fiyat){
	for($i = 0; $i < count($fiyat); $i++){  //$fiyat icindekileri kucukten buyuge siralar
		for($j = 0; $j < count($fiyat); $j++){
			if($fiyat[$i] < $fiyat[$j]){
				$temp = $fiyat[$i];
				$fiyat[$i] = $fiyat[$j];
				$fiyat[$j] = $temp;
			}
		}
	}
	$toplam = 0;
	for($n = 1; $n < count($fiyat)-1; $n++){ //$fiyat ın ilk ve son (en kucuk ve en buyuk)
		$toplam += $fiyat[$n];                //degerleri haric fiyatlari toplar
	}
	$ort = ($toplam / (count($fiyat)-2));   //ortalamayi $ort ye atar
	$fark = array();
	for($i = 1; $i < count($fiyat)-1; $i++){ // $fiyat ve $ort arasindaki farklari 
		if($fiyat[$i] > $ort){                //pozitif olarak fark dizisine atar
			$fark[$i] = $fiyat[$i] - $ort;
		}else{
			$fark[$i] = $ort - $fiyat[$i];
		}
	}
	print_r($fark);
	$enk = 0;
	for($i = 1; $i < count($fark)-1; $i++){ // en kucuk fark degerini bulur $enk e atar
			if($fark[$i+1] < $fark[$i]){
				$enk = $fark[$i+1];
			}
	}
	echo "en kucukkk".$enk;
	echo "ort kitap fiyatina en yakin kitap(lar): (en pahali ve en ucuz haric)\n";
	for($i = 1; $i < count($fiyat)-1; $i++){     //farklari $enk'e esit olanlari yazdir 
		if($fark[$i] == $enk){                     // yazdirir
			echo $ad[$i]." kitabi ".$fiyat[$i]."TL\n";
		}
	}
}

/*--------------------------------------------------------------------- 
ortalama fiyata olan fiyat uzaklıkların ortalamasını 
(yani fiyatların standart sapması) bulup yazdırır
----------------------------------------------------------------------*/
function standartSapma($fiyat){
	$toplam = 0;
	for($n = 0; $n < count($fiyat); $n++){ //$fiyat dizisindeki degerleri toplar
		$toplam += $fiyat[$n];                
	}
	$ort = ($toplam / (count($fiyat)));   //ortalamayi $ort ye atar
	$fark = array();
	for($i = 0; $i < count($fiyat); $i++){ // $fiyat ve $ort arasindaki farklari 
		if($fiyat[$i] > $ort){                //pozitif olarak fark dizisine atar
			$fark[$i] = $fiyat[$i] - $ort;
		}else{
			$fark[$i] = $ort - $fiyat[$i];
		}
	}
	$toplam = 0;
	for($i = 0; $i < count($fark); $i++){ //ortalama fiyata olan fiyat uzakliklarini
		$toplam += $fark[$i];             //$toplam degiskenine atar
	}
	$stsapma = $toplam / count($fiyat); //standart sapmayi bulur
	echo "\n standart sapma :\n".$stsapma;
}
?>
