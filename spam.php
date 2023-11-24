<?php

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

function v1($api, $nomer, $jumlah, $delay) {
  $url = "https://freyapp.my.id/api/call/v1/". $api . "/". $nomer;
  $loop = 0;
  while ($loop < $jumlah) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response, true);
    if ($res['status'] !== true) {
      echo $res['message'] . "\n";
    } else {
      echo "Spam ke " . $loop + 1 . " berhasil dikirim! \n";
    }
    sleep($delay);
    $loop++;
  }
}

function v2($api, $nomer, $jumlah, $delay) {
  $url = "https://freyapp.my.id/api/call/v2/". $api . "/". $nomer;
  $loop = 0;
  while ($loop < $jumlah) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response, true);
    if ($res['status'] !== true) {
      echo $res['message'] . "\n";
    } else {
      echo "Spam ke " . $loop + 1 . " berhasil dikirim! \n";
    }
    sleep($delay);
    $loop++;
  }
}

function prem($api, $nomer, $jumlah, $delay) {
  $url = "https://freyapp.my.id/api/call/prem/". $api . "/". $nomer;
  $loop = 0;
  while ($loop < $jumlah) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($response, true);
    if ($res['status'] !== true) {
      echo $res['message'] . "\n";
    } else {
      echo "Spam ke " . $loop + 1 . " berhasil dikirim! \n";
    }
    sleep($delay);
    $loop++;
  }
}

echo "Tunggu Sebentar.....!\n";

sleep(2);
echo "
\n\n
<========= - Pilih Versi - ==========>
1. Spam V1
2. Spam V2
3. Spam Premium ( Khusus Premium )
<========= - Pilih Angka - ==========>
\n\n";

echo "Pilih Versi : ";
$tools = trim(fgets(STDIN));


switch ($tools) {
  case '1':
    echo "Masukan Nomor : ";
    $nomor = trim(fgets(STDIN));
    echo "\nMasukan Jumlah : ";
    $jumlah = trim(fgets(STDIN));
    echo "\nMasukan jeda : ";
    $delay = trim(fgets(STDIN));
    if (!$delay) {
      $delay = "30";
    }
    echo "\nMasukan Key : ";
    $key = trim(fgets(STDIN));
    v1($key, $nomor, $jumlah, $delay);
    break;
  case '2':
    echo "Masukan Nomor : ";
    $nomor = trim(fgets(STDIN));
    echo "\nMasukan Jumlah : ";
    $jumlah = trim(fgets(STDIN));
    echo "\nMasukan jeda : ";
    $delay = trim(fgets(STDIN));
    if (!$delay) {
      $delay = "30";
    }
    echo "\nMasukan Key : ";
    $key = trim(fgets(STDIN));
    v2($key, $nomor, $jumlah, $delay);
    break;
  case '3':
    echo "Masukan Nomor : ";
    $nomor = trim(fgets(STDIN));
    echo "\nMasukan Jumlah : ";
    $jumlah = trim(fgets(STDIN));
    echo "\nMasukan jeda : ";
    $delay = trim(fgets(STDIN));
    if (!$delay) {
      $delay = "30";
    }
    echo "\nMasukan Key : ";
    $key = trim(fgets(STDIN));
    prem($key, $nomor, $jumlah, $delay);
    break;
}
