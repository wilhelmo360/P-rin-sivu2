<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="pärinätyylit.css" rel="stylesheet" type="text/css">
    <link href="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>

<div class="container">
    <header> <a href="">
        <h4 class="logo">PÄRR</h4>
    </a>
        <nav>
            <ul>
                <li><a href="#hero">INFOA</a></li>
                <li><a href="#about">KUVIA</a></li>
                <li> <a href="#contact">LATAA</a></li>
                <li><a href="reset-password.php">Unohtuiko salasana?</a></li>
                <li><a href="logout.php">Kirjaudu ulos</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero" id="hero">
        <h2 class="hero_header">PARHAAT<span class="light">PÄRINÄT</span></h2>
        <p class="tagline">arvostele kanssajonnesi juomiset.</p>
    </section>
    <section class="about" id="about">
        <h2 class="hidden">About</h2>
        <p class="text_column">Sivun tarkoituksena on arvostella energiajuomia, vaikka uskommekin että kaikki energiajuomat ovat luotu yhdenvertaisina niin annamme mahdollisuuden arvostella samanmielisten ihmisten kofeiinipitoisia nesteitä.</p>
    </section>
    <!-- Stats Gallery Section -->


    <!-- Parallax Section -->
    <section class="banner">
        <h2 class="parallax">VAROITUS</h2>
        <p class="parallax_description">Kofeiinipitoiset juomat saattavat tehdä olosi hyväksi varsinkin käytön aikana, sitä ennen ja luultavasti jälkeen. Muistakaa päristä omalla vastuula ja hyvällä harkintakyvyllä.</p>
    </section>
    <!-- More Info Section -->
<div align="center" class="footer">
<?php
include("config.php");

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // Insert record
    $query = "INSERT INTO images(image) VALUES('".$image."')";
    mysqli_query($link,$query);
  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Lataa' name='but_upload'>
</form>
</div>
</body>
</html>

