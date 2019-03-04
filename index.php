<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="icon" type="image/png" href="https://i.imgur.com/OCP2kb6.png"/>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="theme-color" content="lightseagreen">
    <title>Mailer</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        .btn-flat:hover {
            color: lightseagreen !important;
        }
    </style>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</head>

<body>
  <nav role="navigation" class="z-depth-1 navbar-fixed-top" style="position: relative !important; background-color: lightseagreen">
      <div class="nav-wrapper container">

          <!--  NAV Logo -->
          <a id="logo-container" href="#home" class="brand-logo white-text">
              <i class="material-icons left white-text" style="font-size: larger">email</i>
              <span>Mailer</span>
          </a>

      </div>
  </nav>


  <div class="container">

      <br />

    <?php
      require_once "vendor/autoload.php";

      if(isset($_POST['send']) && !null) {

          $user = new \App\model\User();
          $user->setEmail(trim($_POST['email']));
          $user->setName(trim($_POST['name']));

          $db = new App\model\DbFunctions();
          $verify= 0;

          if($db->verify($user->getEmail()) == 0) {

              $db->insert($user);
              print "<meta http-equiv='refresh' content='1;url=index.php'>";
              echo "<script>M.toast({html: 'Sent!'})</script>";
              $verify = 0;

          } else

              $verify = 1;

          }
    ?>

      <form action="#" method="POST">
        <div class="row">

          <!-- Name -->
          <div class="col s12 m6 l5 input-field">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" placeholder="Name" maxlength="140" required class="sh" name="name"

                     <?php if($verify==1)echo'value="'.$user->getName().'"';?>>
          </div>

          <!-- Email -->
          <div class="col s12 m6 l6 input-field">
              <i class="material-icons prefix">email</i>
              <input type="email" placeholder="Email" maxlength="140" required class="sh" name="email"

                     <?php if($verify==1)echo'value="'.$user->getEmail().'"';?>>

              <?php if($verify==1)echo'<span class="red-text right">Email Already sent.</span>'?>
          </div>

          <!-- Send -->
          <div class="col s12 m12 l1" style="margin-top: 20px">
              <button name="send" class="btn-flat black-text white sh right" type="submit">
                     <i class="material-icons" style="font-size: 2.5em">send</i>
              </button>
          </div>

         </div>
       </form>

  </div>
</body>

</html>
