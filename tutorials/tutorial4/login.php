<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tutorial4</title>
</head>

<body>
   <h2>Enter Username and Password</h2>
   <?php
   $msg = '';
   if (
      isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])
   ) {
      if (
         $_POST['username'] == 'winngwephyo' &&
         $_POST['password'] == 'Win12345'
      ) {
         $_SESSION['VALID'] = true;
         $_SESSION['TIMEOUT'] = time();
         $_SESSION['username'] = 'winngwephyo';
         echo 'You have entered valid use name and password';
      } else {
         $msg = 'Wrong username or password';
      }
   }
   ?>
   <div class="container">
      <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
         <h4><?php echo $msg; ?></h4>
         <div class="clearFix">
            <div class="col-25">
               <label>Username</label>
            </div>
            <div class="col-75">
               <input type="text" name="username" placeholder="Username=winngwephyo">
            </div>
         </div>
         <div class="clearFix">
            <div class="col-25">
               <label>Password</label>
            </div>
            <div class="col-75">
               <input type="password" name="password" placeholder="Password=Win12345">
            </div>
         </div>
         <div class="clearFix">
            <button class="login-btn" type="submit" name="login">Login</button>
            <a href="logout.php" tite="Logout">
               <button class="logout-btn" type="submit" name="logout">LogOut</button> </a>
         </div>
      </form>
   </div>
</body>

</html>