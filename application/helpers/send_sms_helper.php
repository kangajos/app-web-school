<?php
function SendAPI_SMS($destinationNumber, $message)
{
	$email_api = urlencode("email kamu Saat daftar di medanSMS");
	$passkey_api = urlencode("daftar di medanSMS untuk dapet keynya");
	$no_hp_tujuan = $destinationNumber;
	$isi_pesan = $message;
	$url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=" . $email_api . "&passkey=" . $passkey_api . "&no_tujuan=" . $no_hp_tujuan . "&pesan=" . $isi_pesan . "&json=1";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}
