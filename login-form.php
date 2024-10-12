<html>
  <head>
    <title>Login or signup</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <div class="head">
      <h1>Welcome </h1>
      <h2> choose your enter type</h2>
      <p> Login/Signup</p>
      
      <div> 
      <a href="index.php?log=l"><button>Login</button></a>
      <a href='index.php?log=s'>
      <button>Signup</button></a>
      </div></div>
      <center>
      <div class="form">
      <form action="login.php?g=1" method="post">
        <?php
        if(isset($_GET['log'])){
          if($_GET['log'] == 'l'){
            echo '<h1>Welcome</h1>
            <h3> LOGIN </h3>';
          }else{
            if($_GET['log'] == 's'){
              echo '<h1>Welcome</h1>
            <h3> SIGNUP </h3>';
            }
          }
        }
        ?>
        
        <input type="text" placeholder="Enter Username" required="required" name="name">
        <input type="number" placeholder="Enter Phone number" required="required" name="num"><br>
       <a href='login-form.php?num=wrong'><input type="submit" value="Sent otp"></a>
       <?php
       if(isset($_GET['num'])){
         echo '<p style="color:red;"> ! please enter correct number</p>';
       }
       ?>
        
      </form>
    </div>
    </center>
  </body>
</html>