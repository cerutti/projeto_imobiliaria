<?php
session_start();
require_once "config.php";



if (isset($_POST['logar'])):
    $logar = new LogarAdmin();
    $logar->setUsuario($_POST['usuario']);
    $logar->setSenha($_POST['senha']);
    $logar->logar();

    if ($logar->getErro()):
        $erro = $logar->getErro();
    else:
        header("Location:painel/");
    endif;


endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    .bg-danger{
        background: #f2dede;
        margin-top: 10px;
        padding: 10px;
        font-size:15px;
        border-radius: 5px;
    }
    </style>
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="#">Sistema Administrativo</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Login</h6>
                      <form action="" method="POST">
			                <input class="form-control" type="text" name="usuario" placeholder="E-mail address">
			                <input class="form-control" type="password" name="senha" placeholder="Password">
			                <div class="action">
                        <input type="submit" name="logar" value="Login" class="btn btn-primary signup" />
			                </div>
                      </form>
			            </div>
			        </div>
              <?php echo isset($erro) ? '<p class="bg-danger">' . $erro . '</p>' : ""; ?>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
