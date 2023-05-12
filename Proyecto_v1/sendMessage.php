<?php
if (!isset($_POST['telefono'])) {
    header('Location: employees.php?mensaje=error');
    exit();
}

$contacto = $_POST["telefono"];
$url = 'https://api.green-api.com/waInstance1101817542/SendFileByUpload/d528fd0f997c42f99b734383ecff090e9518897bd71f428b92';

$filePath = '/srv/http/Proyecto_v1/descarga.jpeg';
$fileType = mime_content_type($filePath);
$cfile = new CURLFile($filePath, $fileType, 'descarga.jpeg');

$data = [
    "chatId" => "51" . $contacto . "@c.us",
    "caption" => "Estimado(a) trabajador usted fue beneficiario del bono por agradecimiento de su gran labor en nuestro restaurante.",
    "file" => $cfile
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);

var_dump($response);
?>