<?php
// connect to database \\
include('../inlcudes/connect.php');
// secure input \\
include('../inlcudes/secureInput.php');
// password encryption \\
include('../inlcudes/salt.php');
// validate functions \\
include('../inlcudes/validate.php');
// database querys \\
include('../inlcudes/query.php');

session_start();

$xmlMovieRating = 'http://localhost:8888/PHP32_herkansing/final/database/xml.php';
$rssFeedUrl = 'http://www.animenewsnetwork.com/news/rss.xml';
$filenameText = "../text/text.txt";
$filennameCSV = "../text/text.csv";

// logout button
if (!empty($_POST['logoutSubmit'])) {
	session_destroy();
	header("Location: inlog.php");
};

//  upload text submit button
if (!empty($_POST['uploadTextSubmit'])){
	$text = $_POST['uploadText'];
	if (file_exists($filenameText)){
		$openTextfile = fopen($filenameText,"w")or die ($errorText = "can't open file");
		fwrite($openTextfile, $text);
		fclose($openTextfile);
	}
	else{
		$textError = "text file doesn't exist";
	}
};

if (!empty($_POST['userSelectSumbit'])){
	$explode = explode('|', $_POST['userSelect']);
	$userIdSelect = $explode[0];
	$userNameSelect = $explode[1];
	$deleteUserQuery = 'DELETE FROM users WHERE userid="'.$userIdSelect.'"';
	mysql_query($deleteUserQuery) or die ('error: '.mysql_error());
	$deleteSucces = 'You deleted '.$userNameSelect;
};

function getUsers(){
	$getUserQuery = "SELECT * FROM users";
	$getUserResult = mysql_query($getUserQuery) or die ('error: '.mysql_error());
	$html = '<form method="post">';
	$html .= '<select name="userSelect">';
	while ($userRow = mysql_fetch_array($getUserResult)) {
		$html .= '<option value="'.$userRow['userid'].'|'.$userRow['firstName'].' '.$userRow['surName'].'">'.$userRow['firstName'].' '.$userRow['surName'].'</option>';
	}
	$html .= '</select>';
	$html .= '<input type="submit" name="userSelectSumbit" value="delete user"/>';
	$html .= '</form>';
	
	echo $html;
};

// upload movie
if (!empty($_POST['uploadTextSubmit'])){
	$issetMovieTitle = false;
	$issetMovieRating = false;
	$issetMoviePlot = false;
	$issetMovieSound = false;
	$issetMovieAspectRatio = false;
	$issetMovieCountry = false;
	$issetMovieLanguage = false;
	$issetMovieGenre = false;
	$issetMovieReleaseDate = false;
	
	if(!empty($_POST['movieTitle'])){	
		$movieTitle = secureInput($_POST['movieTitle']);
		$_SESSION['movieTitle'] = $movieTitle;
		$issetMovieTitle = true;
	}
	else{
	}
	if(!empty($_POST['movieRating'])){
		$movieRating = secureInput($_POST['movieRating']);
		$_SESSION['movieRating'] = $movieRating;
		$issetMovieRating = true;
	}
	if(!empty($_POST['moviePlot'])){
		$moviePlot = secureInput($_POST['moviePlot']);
		$_SESSION['moviePlot'] = $moviePlot;
		$issetMoviePlot = true;
	}
	if(!empty($_POST['movieRuntime'])){
		$movieRuntime = secureInput($_POST['movieRuntime']);
		$_SESSION['movieRuntime'] = $movieRuntime;
		$issetMovieRuntime = true;
	}
	if(!empty($_POST['movieSound'])){
		$movieSound = secureInput($_POST['movieSound']);
		$_SESSION['movieSound'] = $movieSound;
		$issetMovieSound = true;
	}
	if(!empty($_POST['movieAspectRatio'])){
		$movieAspectRatio = secureInput($_POST['movieAspectRatio']);
		$_SESSION['movieAspectRatio'] = $movieAspectRatio;
		$issetMovieAspectRatio = true;
	}
	if(!empty($_POST['movieCountry'])){
		$movieCountry = secureInput($_POST['movieCountry']);
		$_SESSION['movieCountry'] = $movieCountry;
		$issetMovieCountry = true;
	}
	if(!empty($_POST['movieLanguage'])){
		$movieLanguage = secureInput($_POST['movieLanguage']);
		$_SESSION['movieLanguage'] = $movieLanguage;
		$issetMovieLanguage = true;
	}
	if(!empty($_POST['movieGenre'])){
		$movieGenre = secureInput($_POST['movieGenre']);
		$_SESSION['movieGenre'] = $movieGenre;
		$issetMovieGenre = true;
	}
	if(!empty($_POST['movieReleaseDate'])){
		$movieReleaseDate = secureInput($_POST['movieReleaseDate']);
		$_SESSION['movieReleaseDate'] = $movieReleaseDate;
		$issetMovieReleaseDate = true;
	}
	
	if($issetMovieReleaseDate == true && $issetMovieGenre == true && $issetMovieLanguage == true && $issetMovieCountry == true && $issetMovieAspectRatio == true && $issetMovieSound == true && $issetMovieRuntime == true && $issetMoviePlot == true && $issetMovieRating == true && $issetMovieTitle == true){
		
		$movieUploadQuery = "INSERT INTO movies (title, rating, plot, runtime, sound_mix, aspect_ratio, country, language, genre, release_date) VALUES ('$movieTitle','$movieRating','$moviePlot','$movieRuntime','$movieSound','$movieAspectRatio','$movieCountry','$movieLanguage','$movieGenre','$movieReleaseDate')";

		mysql_query($movieUploadQuery) or die ('error'.mysql_error());
	}
};

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/admin.css"/>
<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/jquery.easing.min.js"></script>
<script type="text/javascript" src="../js/jquery.easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<title>Studio Ghibli Fansite</title>
</head>

<body>
<div class="wrapper">
  <header class="adminHeader">
    <h2>Amdmin fanpage studio ghibli</h2>
  </header>
  <section class="adminSection">
    <div class="leftColumn">
    <h2>Upload main text</h2>
      <form method="post">
      	<textarea name="uploadText"></textarea>
        <input type="submit" name="uploadTextSubmit" value="upload text"/>
      </form>
    </div>
    <div class="rightColumn">
     <div class="userDelete">
     	<h2>Delete Users</h2>
		<?php getUsers(); ?>
     	<?php echo $deleteSucces ?>
     </div>
     <div class="movieInsert">
     	<h2>Inset Movie</h2>
     	<form method="post">
        	<input type="text" name="movieTitle" placeholder="movie title" value="<?php $_SESSION['movieTitle']; ?>"/>
            <input type="number" name="movieRating" placeholder="movie rating" value="<?php $_SESSION['movieRating']; ?>"/>
            <textarea name="moviePlot" placeholder="movie plot" ><?php $_SESSION['moviePlot']; ?></textarea>
            <input type="text" name="movieRuntime" placeholder="movie runtime" value="<?php $_SESSION['movieRuntime']; ?>"/>
            <input type="text" name="movieSound" placeholder="movie sound mix" value="<?php $_SESSION['movieSound'] ?>"/>
            <input type="text" name="movieAspectRatio" placeholder="movie aspect ratio" value="<?php $_SESSION['movieAspectRatio']; ?>"/>
            <input type="text" name="movieCountry" placeholder="movie country" value="<?php $_SESSION['movieCountry']; ?>"/>
            <input type="text" name="movieLanguage" placeholder="movie language" value="<?php $_SESSION['movieLanguage']; ?>"/>
            <input type="text" name="movieGenre" placeholder="movie genre" value="<?php $_SESSION['movieGenre']; ?>"/>
            <input type="text" name="movieReleaseDate" placeholder="movie release date" value="<?php $_SESSION['movieReleaseDate']; ?>"/>
            <input type="submit" name="uploadMovieSumbit" value="upload movie"/>
        </form>
     </div>
    </div>    
  </section>
  <footer class="footer">
  	<form method="post">
    	<input type="submit" class="button headerButton" name="logoutSubmit" value="Logout"/>
    </form>
  </footer>
</div>
</body>
</html>