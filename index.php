<?php include 'forceSecure.php'; ?>
<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <title>
      Stop Being Paranoid
    </title>
    <?php include 'favicon/head.php'; ?>
    <?php include 'meta.php'; ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
      body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
      }
      main {
        flex: 1 0 auto;
      }
      .headercolor {
        background-color: #63A075;
      }
      .maincolor {
        background-color: #9CD7DE;
      }
      .footercolor {
        background-color: #1C70BE;
      }
    </style>
	</head>
	<body>
    <header class="headercolor">
      <div class="container">
        <!-- header -->
        <div class="row">
          <h2 class="center-align">
            Don't trust everything you read online
          </h2>
        </div>
      </div>
    </header>
    <main class="maincolor">
      <div class="container">
        <!-- quick description -->
        <div class="row">
          <p class="flow-text">
            <?php include 'description.php'; ?>
          </p>
        </div>
        <!-- main content -->
        <div class="row">
          <blockquote class="flow-text right">
            Your web browser...
          </blockquote>
          <table class="highlight">
            <?php
            include 'dataset.php';
            $keys = getDataSet();
            // $keys = $_SERVER;
            foreach($keys as $key => $value){
              ?><tr><th class="right-align"><?php
                echo $key;
              ?></th><?php
              ?><td><?php
                // echo $value;
                $value["action"]($value["key"]);
              ?></td><?php
              ?></tr><?php
            }
            ?>
          </table>
          <blockquote class="flow-text right">
            If you have javascript enabled, I might know even more...
          </blockquote>
          <table class="highlight" id="jsTable">
            <!-- Javascript generated content -->
          </table>
        </div>
      </div>
    </main>
    <footer class="page-footer footercolor">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <p class="grey-text text-lighten-4">
              Be alert, not paranoid
            </p>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col s12 m6 left-align">
              © 2020 - <?php echo date("Y"); ?> Sjors de Bruijn
            </div>
            <div class="col s12 m6 hide-on-med-and-down right-align">
                yup
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="lib.js"></script>
    <script src="dataset.js"></script>
    <script src="jsview.js"></script>
	</body>
</html>