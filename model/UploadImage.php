<?php 
//posibility to upload profile picture


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['inpfile'])) {
        $errors = [];
        $path = '../uploads/recipes/';
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];

        $fileSize = $_FILES['inpfile']['size'];
        $fileTmp = $_FILES['inpfile']['tmp_name'];
        $fileName = $_FILES['inpfile']['name'];
    
        $explode = explode('.', $fileName);
        $fileExt = strtolower(end($explode));
        
        $file = $path . $fileName;

        if (!in_array($fileExt, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $fileExt ;
            
        }

        if ($fileSize > 2097152) {
            $errors[] = 'File size exceeds limit: ' . $fileName ;
        }

        if (empty($errors)) {
            move_uploaded_file($fileTmp, $file);
            print_r($file);
        }
    }
    if ($errors) {
        print_r($errors);
    }


    //how to notify user when errors? 
}