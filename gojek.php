<?php
error_reporting(0);

#AUTO BIKIN AKUN + AUTO CLAIM VOC GOJEK + AUTO TF GOPAY
#Created By HarunFathoroniAkhyar
#####################################


function nama()
	{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$ex = curl_exec($ch);
	// $rand = json_decode($rnd_get, true);
	preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
	return $name[2][mt_rand(0, 14) ];
	}
	    
function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return array(
            $result,
            $httpcode
        );
    }
    

echo "\n";
echo "\e[92mAUTO REGISTER GOJEK ACCOUNT + AUTO CLAIM VOUCHER + AUTO TF GOPAY (Off)\n";

echo "\n";
echo "Script Remastered By Fathoroniakhyar | Harun Jul\n";
echo "\n";
echo "\e[96mCredits:\n";
echo "IG : @fathoroniakhyar | Harun.Jul\n";
echo "FB : Harun Fathoroni akhyar | harun Jul\n";
echo "\n";

echo "\e[94mList Voucher Yang Akan Ter-Claim :\n";
echo "1. Voucher Reff Gojek 15k (Gofood, Goride, Gocar)\n";
echo "2. Voucher Gofood 15k+10k Minbuy 30k (Gatcha)\n";
echo "3. Voucher Goride 8k\n";
echo "4. Voucher Bioskop XXI\n";
echo "\n";


echo "\e[93mMASUKKAN 08 UNTUK NO INDO, MASUKKANN 1 UNTUK NO US (BANNED)\n";
echo "\e[91m\n";
echo "\n";

function run () {
$secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e';
$headers = array();
$headers[] = "Host: api.gojekapi.com";
$headers[] = "User-Agent: okhttp/3.12.1";
$headers[] = "Accept: application/json";
$headers[] = 'Content-Type: application/json';
$headers[] = "X-AppVersion: 3.37.2";
$headers[] = "Accept-Language: id-ID";
$headers[] = "X-User-Locale: id_ID";
$headers[] = "X-Uniqueid: ac94e5d0e7f3f".rand(111,999);
$headers[] = "Connection: keep-alive";
$headers[] = "X-Location: -6.553311,106.813172";
		echo "[$] MASUKKAN NOMORNYA! : ";
		$number = trim(fgets(STDIN));
		$numbers = $number[0].$number[1];
		$numberx = $number[5];
		if($numbers == "08") { 
			$number = str_replace("08","628",$number);
		} elseif ($numberx == " ") {
			$number = preg_replace("/[^0-9]/", "",$number);
			$number = "1".$number;
		}
		$nama = nama();
		$email = strtolower(str_replace(" ", "", $nama) . mt_rand(100,999) . "@gmail.com");
		$data1 = '{"name":"' . $nama . '","email":"' . $email . '","phone":"+' . $number . '","signed_up_country":"ID"}';
		$reg = curl('https://api.gojekapi.com/v5/customers', $data1, $headers);
		$regs = json_decode($reg[0]);
		// Verif OTP
		if($regs->success == true) {
			echo "\e[34m\n";
			echo "[$] MASUKKAN KODE OTP : ";
			$otp = trim(fgets(STDIN));
			$data2 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $regs->data->otp_token . '"},"client_secret":"' . $secret . '"}';
            $verif = curl('https://api.gojekapi.com/v5/customers/phone/verify', $data2, $headers);
           // print_r($verif);
			$verifs = json_decode($verif[0]);
			if($verifs->success == true) {
				// Claim Voucher
				$token = $verifs->data->access_token;
				$headers[] = 'Authorization: Bearer '.$token;
				 $live = "token-accounts.txt";
    $fopen1 = fopen($live, "a+");
    $fwrite1 = fwrite($fopen1, "TOKEN => ".$token." \n NOMOR => ".$number."\n");
	fclose($fopen1);
	echo "\e[35m\n";
    echo "[+] Token Telah Disimpan Di ".$live." \n";
echo "\n";
echo "[+] Sedang Me-Redeem Promo Referral\n";
				$data3 = '{"referral_code":"G-MPW4WBM"}';
				$claim = curl('https://api.gojekapi.com/customer_referrals/v1/campaign/enrolment', $data3, $headers);
				$claims = json_decode($claim[0]);
					echo $claims->data->message;
					echo "\n";
					sleep(5);
					echo "\e[37m\n";
					echo $claims1->data->message;
echo "[+] Sedang Me-Redeem Voucher Gofood 15k+10k Minbuy 30k (Gatcha)\n";
				$data3 = '{"promo_code":"GOFOOD022620A"}';
				$claim = curl('https://api.gojekapi.com/go-promotions/v1/promotions/enrollments', $data3, $headers);
				$claims = json_decode($claim[0]);
					echo $claims->data->message;
					echo "\n";
					sleep(5);
					echo "\e[34m\n";
					echo $claims1->data->message;
echo "[+] Sedang Me-Redeem Voucher Goride\n";
				$data3 = '{"promo_code":"COBAGORIDE"}';
				$claim = curl('https://api.gojekapi.com/go-promotions/v1/promotions/enrollments', $data3, $headers);
				$claims = json_decode($claim[0]);
					echo $claims->data->message;
					echo "\n";
					sleep(5);
					echo "\e[32m\n";
					echo $claims1->data->message;
echo "[+] Sedang Me-Redeem Voucher Bioskop XXI\n";
				$data3 = '{"promo_code":"GOPAYDIXXI5"}';
				$claim = curl('https://api.gojekapi.com/go-promotions/v1/promotions/enrollments', $data3, $headers);
				$claims = json_decode($claim[0]);
					echo $claims->data->message;
					echo "\n";
					sleep(5);
					echo "\e[34m\n";
					echo $claims1->data->message;
echo "\e[95m\n";				
} else {
    echo "OTP SALAH!! \n";
}
} else {
    echo "Gagal Register :(\n";
}
}
    for ($i = 1; $i <= 100; $i++) {
        run();
    }

?>
