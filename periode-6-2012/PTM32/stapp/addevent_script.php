<?php
	include("include.php");
   	 session_start();
   
   
	$event_soort = $_POST["soort"];
	
	$event_naam = $_POST["naam"];
	
	$event_muziek = $_POST["muziek"];
	
	$afbeelding = $_FILES["afbeelding"];
	
	$be_dag = $_POST['be_dag']."-".$_POST['be_maand']."-".$_POST['be_jaar'];
	
	$be_tijd = $_POST['be_uur'].":".$_POST['be_min'];
	
	
	$eind_dag = $_POST["eind_dag"]."-".$_POST['eind_maand']."-".$_POST['eind_jaar'];
	
	
	$eind_tijd = $_POST['eind_uur'].":".$_POST['eind_min'];
	
	$bericht = $_POST['bericht'];
	
	$event_cafe = $_SESSION['caf_naam'];
	
	
	
	
	
	
	function uploadImage($img_ff, $dst_path, $dst_img){

    //Get variables for the function.
            //complete path of the destination image.
    $dst_cpl = $dst_path . basename($dst_img);
            //name without extension of the destination image.
    $dst_name = preg_replace('/\.[^.]*$/', '', $dst_img);
            //extension of the destination image without a "." (dot).
    //$dst_ext = strtolower(end(explode(".", $dst_img)));
	
	$tmp = explode(".", $dst_img);
	$dst_ext = end($tmp);

//Check if destination image already exists, if so, the image will get an extra number added.
    $i = null;
	while(file_exists($dst_cpl) == true){
        $i = $i+1;
        $dst_img = $dst_name . $i . '.' . $dst_ext;
        $dst_cpl = $dst_path . basename($dst_img);
    }

        //upload the file and move it to the specified folder.
    move_uploaded_file($_FILES[$img_ff]['tmp_name'], $dst_cpl);


    function get_mime($dst_cpl)//Specificeer pad naar het bestand
{
    $handle=fopen($file,'rb');            //Open het bestand in binaire modus
    $data=bin2hex(fread($handle,24));    //Lees de eerste 14 bytes uit het bestand en zet deze in hexadecimale notatie
    switch($data)                        //Gebruik switch controlestructuur voor verificatie
    {
        case '424d'==substr($data,0,4):    //Normaliter neemt 1 hex digit 4 bits in. Door typecasting conversie naar string, dus 1 byte
            return 'image/x-bmp';
        break;
        case '5c783838504e47'==substr($data,0,14):
            return 'image/x-png';
        break;
        case '89504e47'==substr($data,0,8):
            return 'image/x-png';
        break;
        case '504e47'==substr($data,0,6):
            return 'image/x-png';
        break;
        case 'ffd8ffe000104a4649460001'==substr($data,0,24):
            return 'image/jpeg';
        break;
        case '68736931'==substr($data,0,8):
            return 'image/x-jpeg';
        break;
        case '47494638'==substr($data,0,8):
            return 'image/x-gif';
        break;
        default:
            return false;    //Als het patroon niet wordt gevonden...
    }
    fclose($handle);
}

}
    //Script ends here.


// Needed for the function:

        // If the form is posted do this:
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Variables needed for the function.
        $img_ff = 'afbeeling'; // Form name of the image
        $dst_img = strtolower($_FILES[$img_ff]['name']); // This name will be given to the image. (in this case: lowercased original image name uploaded by user).
        $dst_path = 'image/'; // The path where the image will be moved to.

        uploadImage($img_ff, $dst_path, $dst_img);
    }

    $filename = $img_ff;
                $filename2 = "image/";
                $filename5 = $filename2 . $filename;


$POST1 = "INSERT INTO tbl_event (event_type, event_name, event_image, event_start_date, event_end_date, event_start_time, event_end_time, event_beschrijving, event_muziek, event_cafe)
VALUES ('$event_soort','$event_naam','$dst_img','$be_dag','$eind_dag','$be_tijd','$eind_tijd', '$bericht', '$event_muziek', '$event_cafe')";
	mysql_query($POST1) or die(mysql_error());
		    
			
 header('Location: evenmenten.php');
?>

