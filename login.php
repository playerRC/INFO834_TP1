<?php
$conn = @mysqli_connect("tp-epua:3308", "faskar", "bsn9qmi4");

if (mysqli_connect_errno()) {
   $msg = "erreur ". mysqli_connect_error();
} else {  
   $msg = "connecté au serveur " . mysqli_get_host_info($conn);
   mysqli_select_db($conn, "faskar"); 
   mysqli_query($conn, "SET NAMES UTF8");
}
   
   if(isset($_POST['email']) && isset($_POST['password'])) {

      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT count(*) FROM utilisateur where 
      email = '".$email."' and password = '".$password."' ";
      $result = mysqli_query($conn,$sql) or die("Requête invalide: ". mysqli_error()."\n".$sql);
      $reponse = mysqli_fetch_array($result);
      $count = $reponse['count(*)'];
      		
      if($count == 1){
         if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $user_ip_address = $_SERVER['HTTP_CLIENT_IP'];
         }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $user_ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
         } else {
            $user_ip_address = $_SERVER['REMOTE_ADDR'];
         }
         $command = escapeshellcmd("python max_connexion.py $user_ip_address");
         $output = shell_exec($command);
         echo $output;
         header("Location: services.php");
         exit();  
         }  
      else{  
         echo "<p> Connexion refusée. Email ou mot de passe invalide.</p>";  
      }
   }
?>
<html>
   
   <head>
      <title>Page de connexion</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Email  :<br /></label><input type = "text" name = "email" class = "box"/><br /><br />
                  <label>Mot de passe  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Valider "/><br />
               </form>
            					
            </div>
				
         </div>
			
      </div>

   </body>
</html>