<?php
if($logedIn == 1){
    $dataQR = $base_url.$userName;
    $size = '200x200';
    $mlogo = $serverDocumentRoot .'/'.$logo; 
    header('Content-type: image/png');
    // Get QR Code image from Google Chart API
    // http://code.google.com/apis/chart/infographics/docs/qr_codes.html
    $QR = imagecreatefrompng('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($dataQR));
    if($mlogo !== FALSE){
        $mlogo = imagecreatefromstring(file_get_contents($mlogo));
    
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);
        
        $logo_width = imagesx($mlogo);
        $logo_height = imagesy($mlogo);
        
        // Scale logo to fit in the QR Code
        $logo_qr_width = $QR_width/3;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;
        
        imagecopyresampled($QR, $mlogo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    }
    //imagepng($QR); 
    $microtime = microtime();
	$removeMicrotime = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
    $UploadedFileName = "qr_" . $removeMicrotime . '_' . $userID;
    $d = date('Y-m-d');
    if (!file_exists($uploadFile . $d)) {
        $newFile = mkdir($uploadFile . $d, 0755);
    }
    $saveGeneratedQRCode = '../uploads/files/' . $d . '/' . $UploadedFileName . '.png';
    $savedImage = imagepng($QR,$saveGeneratedQRCode,0,NULL);
    imagedestroy($QR);  
    if($savedImage){
        if($userQrCode){
            @unlink('../'. $userQrCode);
        } 
        $qrImage = 'uploads/files/' . $d . '/' . $UploadedFileName . '.png';
        $query = mysqli_query($db,"UPDATE i_users SET qr_image = '$qrImage' WHERE iuid = '$userID'") or die(myqli_error($db));
        if($query){
          echo $base_url.$qrImage;
        }
    } 
} 
?>