<?php

// Fonction de comparaison par date
function pictureDateCompare($a, $b) {
    if ($a[1][date] == $b[1][date]) {
      return 0;
    }
    return ($a[1][date] < $b[1][date]) ? -1 : 1;
    }

// Fonction de comparaison aleatoire
function pictureRandomCompare($a, $b) {
    return rand(-1, 1);
}


function date_parser($indate){
  //2005:08:01 22:49:00
  $indate      = explode(" ", $indate);
  $dateArr    = explode(":", $indate[0]);
  $timeArr    = explode(":", $indate[1]);
  $outdate = mktime(
     $timeArr[0],
     $timeArr[1],
     $timeArr[2],
     $dateArr[1],
     $dateArr[2],
     $dateArr[0]
  );
  return $outdate;
//  return strtotime($indate);
}

function date_parser5hDuMat($indate){
  //2005:08:01 22:49:00
  $indate      = explode(" ", $indate);
  $dateArr    = explode(":", $indate[0]);
  $timeArr    = explode(":", $indate[1]);
  $outdate = mktime(
     5,
     0,
     0,
     $dateArr[1],
     $dateArr[2],
     $dateArr[0]
  );
  
//  echo "Verif : " . date('d/m/Y H:m:s', $outdate) . "=" . $indate;
  return $outdate;
}


function getPictureMetaData($pictureFullPath, $descFileFullPath) {
	
  // Extraction de l'id de l'image = nom fichier sans le .jpg	
  $pictureID = basename ($pictureFullPath,".jpg");

  $pictureTitle = 'No title';
  $pictureComment = 'No comment';
  $pictureDate = 'No date';
  $pictureDateStr = 'No date';

  // Lecture description photo dans xml
  if (file_exists($descFileFullPath)) {
     $xml = simplexml_load_file($descFileFullPath);
   
     foreach ($xml->picture as $picture) {
       if ($picture->id == $pictureID) {
          $pictureTitle = $picture->title;
     	  $pictureComment = $picture->comment;
       }
     }
  } else {
    $pictureTitle = 'No desc file';
    $pictureComment = 'No desc file';
  }

  // lecture dans l'imager
  $imgSize = getimagesize($pictureFullPath);

  // lecture dans les données exif
  $exifData = exif_read_data($pictureFullPath, 'IDF0', true, false);  

  if (isset($exifData['EXIF']['DateTimeOriginal'])) {
    $pictureDateStr = $exifData['EXIF']['DateTimeOriginal'];
    $pictureDate = date_parser($pictureDateStr);
  }

  $pictureData = array("title" => $pictureTitle, "comment" => $pictureComment, "date" => $pictureDate, "dateStr" => $pictureDateStr, "width" => $imgSize[0], "height" => $imgSize[1]);
  return $pictureData;
}


function generateResizedPictureIfNeeded($basePicture, $resizedPicture, $width, $height) { 

  // Generation si besoin de la photo a afficher a partir de la photo HD
  if ( ! file_exists($resizedPicture)) {

    // Lit les dimensions de l'image
    $photoSize = GetImageSize($basePicture);  
    $photoSizeW = $photoSize[0]; 
    $photoSizeH = $photoSize[1];  
    $photoMiniW = $width;
    $photoMiniH = $height;
    
    // Teste les dimensions tenant dans la zone
    $testPhotoMiniH = round(($photoMiniW / $photoSizeW) * $photoSizeH);
    $testPhotoMiniW = round(($photoMiniH / $photoSizeH) * $photoSizeW);

    if($testPhotoMiniH>$photoMiniH) {
      $photoMiniW = $testPhotoMiniW;
    }
    else {
      $photoMiniH = $testPhotoMiniH;
    }
		
    // Crée une image vierge aux bonnes dimensions
    $photoMiniTmp = ImageCreateTrueColor($photoMiniW,$photoMiniH); 
    // Copie dedans l'image initiale redimensionnée
    $photoOrigineTmp = ImageCreateFromJpeg($basePicture);
    ImageCopyResampled($photoMiniTmp,$photoOrigineTmp,0,0,0,0,$photoMiniW,$photoMiniH,$photoSizeW,$photoSizeH); 
    // Sauve la nouvelle image
    ImageJpeg($photoMiniTmp,$resizedPicture);
    // Détruis les tampons
    ImageDestroy($photoMiniTmp);  
    ImageDestroy($photoOrigineTmp);
  }		
}
		
// Retourne le tableau contenant toutes les photos +  metadonnees
// Ce tableau est trie par date de prise de vue
function getListePhotosTrieeParDate($pictureDir) {
	return getListePhotos($pictureDir, 'pictureRandomCompare');
}

// Retourne le tableau contenant toutes les photos +  metadonnees 
// Ce tableau est trie en appliquant la fonction passée en paramètre
function getListePhotos($pictureDir, $compareFunctionName) {
      // Création du tableau qui va contenir les fichiers et dossiers
      // On va trier ce tableau par ordre alphabetique, trouver la photo courante, precendante et suivante
      $tabFichiersPhotos = array();
      
      $dossier = opendir($pictureDir);
      
      // Parcours des fichiers et dossiers du répertoire courant
      while($fichier = readdir($dossier)) {
      if (strtolower((substr($fichier,(strlen($fichier)-4),4)))==".jpg") {

                // Recuperation des metas données de l'image
            //    $pictureData = getPictureMetaData($pictureDir.'/'.$fichier, $pictureDir.'/'.'desc.xml');                
                
		$tabFichiersPhotos[] = array($fichier, substr($fichier,(strlen($fichier)-4),4));
	}
      }
      closedir($dossier);
      // Tri du tableau par ordre alphabetique equivalent a l'ordre chronologique vu le nom des photos
      usort($tabFichiersPhotos, $compareFunctionName);
      return  $tabFichiersPhotos;   
}
	
	// Retourne un tableau contenant tous les albums
	// Chaque élément du tableau est un tableau avec [1] le nom de l'album=nom du repertoire, [2] l'url d'une image prise au hasard
function getListeAlbum($racineAlbums) {
	// Création du tableau qui va contenir les albums
	// On va trier ce tableau par ordre alphabetique, trouver la photo courante, precendante et suivante
	$tabAlbums = array ();
	
	$dossiers = scandir ( $racineAlbums );
	// $allFiles = array();
	foreach ( $dossiers as $dossier ) {
		if ($dossier != '.' && $dossier != '..' && is_dir ( $racineAlbums . '/' . $dossier )) {
			if (($photo = getPhotoAuPif ( $racineAlbums . '/' . $dossier )) != NULL) {
				$tabAlbums [] = array (
						$dossier,
						$photo 
				);
			}
		}
	}
	return $tabAlbums;
}

function searchFileInTab($array, $fileName) {
   foreach ($array as $key=>$value) {
   	if ($value[0] == $fileName ) {
   		return $key;
	}
   }
   return 0;
}

// retourne une photo (=fichier avec extension .gif, ou jpg ou jpeg)
// retourne NULL si pas de photo trouvé
function getPhotoAuPif($repAlbum) {
	$curdir=getcwd();
	chdir($repAlbum);
	$files=glob("*.{gif,jpg,GIF,JPG,JPEG}", GLOB_BRACE);
	chdir($curdir);
	$file=$files[array_rand($files)];
	return $file;
}

// retourne vrai si l'image est en format paysage, faux sinon
function isPaysage($photo) {

	// Lit les dimensions de l'image
	$photoSize = GetImageSize($photo);
	$photoSizeW = $photoSize[0];
	$photoSizeH = $photoSize[1];
	return ($photoSizeW > $photoSizeH);
}

?>