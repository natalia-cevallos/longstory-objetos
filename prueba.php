<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container mlogin">
       <div id="login">
         <h1>Logueo</h1>
         <form name="loginform" id="loginform" action="" method="POST">
           <p>
             <label for="user_login">Nombre De Usuario<br />
               <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
             </p>
             <p>
               <label for="user_pass">Contraseña<br /><input type="password" name="password" id="password" class="input" value="" size="20" /></label>
             </p>
             <p class="submit">
               <input type="submit" name="login" class="button" value="Entrar" />
             </p>
             <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>
           </form>
         </div>
    </div>

  </body>
</html>
