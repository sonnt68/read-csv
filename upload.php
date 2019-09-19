<?php
$target_dir = "upload/";
$uploadOk = 1;
$nameFile = $_POST['nameFile'];
$timeStart = $_POST['timeStart'];
$timeFinish = $_POST['timeFinish'];
$filename = $_FILES["fileToUpload"]["name"];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$newfilename = $nameFile.$timeStart."--".$timeFinish.".".$ext;
$target_file = $target_dir . $newfilename;

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      include 'convert.php';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}
?>