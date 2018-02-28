<?php
    $user = test_input($_REQUEST['user']);

    function main() {
        $directory = "../images";
        $files = scandir($directory);
        array_splice($files, 0, 2);
        echo '<img src="' . $directory . "/" . searchImage($files) . '"></img>';
    }

    function getFile($directory){
        return array_splice(scandir($directory), 0, 2);
    }
    
    function delExt($file){
        $file=preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);
        return $file;
    }
    
    function isOkImg($user){
        return ($user == $user);
    }
    
    function searchImage($files){
        for ($i = 0; $i < sizeof($files); $i++){
            $image = '';
            $xsFileNames = explode("-", $files[$i]);
            $nom_file = $xsFileNames[0];
            $ape_file = delExt($xsFileNames[1]);
            if(isOkImg($nom_file, $ape_file)){
                $image = $files[$i];
                break;
            }
        }
        return $image;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($user))
        main();
?>