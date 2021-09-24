<?php 
if(empty($_FILES['file']))
{
	exit();	
}
//echo $_FILES['file']['tmp_name'];
$errorImgFile = "http://localhost/trigno_panel/editor/img/img_upload_error.jpg";
$destinationFilePath ='img-uploads/'.$_FILES['file']['name'];
if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
	echo $errorImgFile;
}
else{
	//echo "hi";
	echo "http://localhost/trigno_panel/editor/".$destinationFilePath ;
}

?>
