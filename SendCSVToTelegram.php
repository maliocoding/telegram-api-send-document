<?php
$contents = [
  ['Julio', 'maliocoding@gmail.com', date("Y-m-d H:i:s"), 'julio'],
  ['Amal', 'amal.julio@soltova.com', date("Y-m-d H:i:s"), 'julio'],
];

$headers = ['Name', 'Mail', 'Modified Time', 'Modified By'];

$file_path = "Data-".time().".csv";

$file = fopen($file_path, "w");

fputcsv($file, $headers);
foreach($contents as $content){
    fputcsv($file, $content);
}
fclose($file);

$url = "https://api.telegram.org/bot1964490828:AAHbwm3wFXuySkRblRSklfZyHw6pFFBq0WA/sendDocument?chat_id=-584925182";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Create CURLFile
$finfo = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_path);
$cFile = new CURLFile($file_path, $finfo);

//Add CURLFile to CURL request
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    "document" => $cFile
]);

// Call
$result = curl_exec($ch);

$result_data = json_decode($result,true);

if($result_data['ok'] == true){
    if(file_exists($file_path)){
        unlink($file_path);
    }
    echo 'SUCCESS';
} else {
    echo 'FAILED';
}
?>