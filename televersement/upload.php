
 <?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {

    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
	if($uploadOk=1){
			  echo "l'upload s'est bien passer";
	}else{
			  echo "l'upload n'a pas réussi";
	}
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<!--
//vérifier si le formilaire a été soumis
//vérifie si le fichier a été uploadé ss erreur
//vérifie l'etension du fichier
//vérifie la taille du fichier 5 Mo maxi
// vérifie le type MIME du fichier
//formulation de la requête SQL
// vérifie si le fichier existe avant de le téléchargé
//requete sql
/*$SQL = "insert into images VALUES ('$nom', $size,'$type')";
$sql = "SELECT * FROM images ORDER by id ASC";
//execution de la requête SQL
if($resultat = mysqli_query($connexion, sql)
	//lecture des resultats (un tableau)
	while($row = mysqli_fetch_row($resultat))
	{
		printf("%s, %s, %s \n", $row[0], $row[1], $row[2]);
	}
	//liberation de la mémoire utilisée par les resultats
	mysqli_free_result($resultat);
}
//fermeture
mysqli_close($connexion);


-->
