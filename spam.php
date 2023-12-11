<?php

class Frey {
  const URL = 'https://freyapp.my.id/api/';

  static $cmd = [
    'call' => 'spamcall',
    'wa' => 'spam-wa'
  ];

  public function spamcall($key, $target, $jumlah) {
    $loop = 0;
    while (0 < $jumlah) {
      $call = Frey::request(self::$cmd['call'], ['target' => $target], $key);
      $response = json_decode($call, true);
      if ($response['status'] == true) {
        echo 'call ke ' . $loop+1 . ' terkirim'. PHP_EOL;
      } else {
        echo $response['message'];
      }
      sleep(30);
      $loop++;
    }
  }

  public function spamwa($key, $target, $jumlah) {
    $loop = 0;
    while (0 < $jumlah) {
      $call = Frey::request(self::$cmd['wa'], ['target' => $target], $key);
      $response = json_decode($call, true);
      if ($response['status'] == true) {
        echo 'whatsapp ke ' . $loop+1 . ' terkirim' . PHP_EOL;
      } else {
        echo $response['message'];
      }
      sleep(30);
      $loop++;
    }
  }

  public function request($url, $params, $key) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, self::URL . $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($curl, CURLOPT_HTTPHEADER, ["X-Apikey: " . $key]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
  }
}

echo "
    ____            _____
   / __ \__  ______/ /   |____
  / /_/ / / / / __  / /| /_  /
 / _, _/ /_/ / /_/ / ___ |/ /_
/_/ |_|\__,_/\__,_/_/  |_/___/
\n
**************************************
*                                    *
* Github : github.com/Exccr          *
* Facebook : fb.com/rud.az.9         *
* Instagram : instagram.com/rud.az_  *
*                                    *
**************************************
\n\n";

echo "Tunggu Sebentar.....!\n";

sleep(2);
echo "
\n\n
<========= - Pilih Versi - ==========>
1. SpamCall
2. Spam whatsapp
<========= - Pilih Angka - ==========>
\n\n";

echo "Pilih Versi : ";
$tools = trim(fgets(STDIN));

switch ($tools) {
  case '1':
    $frey = new Frey();
    echo "Masukan Nomor : ";
    $nomor = trim(fgets(STDIN));
    echo "\nMasukan Jumlah : ";
    $jumlah = trim(fgets(STDIN));
    echo "\nMasukan Key : ";
    $key = trim(fgets(STDIN));
    $frey->spamcall($key, $nomor, $jumlah);
    break;
  case '2':
    $frey = new Frey();
    echo "Masukan Nomor : ";
    $nomor = trim(fgets(STDIN));
    echo "\nMasukan Jumlah : ";
    $jumlah = trim(fgets(STDIN));
    echo "\nMasukan Key : ";
    $key = trim(fgets(STDIN));
    $frey->spamwa($key, $nomor, $jumlah);
    break;
  }
