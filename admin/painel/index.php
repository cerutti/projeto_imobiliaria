<?php
session_start();
require_once "../config.php";
LogarAdmin::verificaLogado();

if (isset($_GET['ac'])):
    /* DESLOGAR DO SISTEMA */
    if ($_GET['ac'] == 'sair'):
        if (isset($_SESSION['logado'])):
            session_destroy();
            header("Location:../index.php");
        endif;
    endif; /* DESLOGAR DO SISTEMA */
endif; /* GET[AC] */
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../lib/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <style>
    .bg-danger{
        background-color: #f2dede;
        padding: 10px;
        font-size:15px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .bg-sucess{
        background-color: #dff0d8;
        padding: 10px;
        font-size:15px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    </style>
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Fucking painel administrativo</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Pesquisar...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Pesquisar</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nome_administrador']; ?> <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Perfil</a></li>
	                          <li><a href="login.html">Sair</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Painel </a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-calendar"></i> Calendar</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-stats"></i> Estatisticas </a></li>
                    <li><a href="index.php?page=adm"><i class="glyphicon glyphicon-list"></i> Usuários</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-record"></i> Add</a></li>
                    <li><a href="editors.html"><i class="glyphicon glyphicon-pencil"></i> Add</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Add</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>

        <?php
        if (!isset($_REQUEST['page'])):
            ?>
           Seja bem vindo(a) ao painel administrativo <?php echo $_SESSION['nome_administrador']; ?>
        <?php
        else:
            include($_REQUEST['page'] . ".php");

        endif;
        ?>

		</div>
    </div>

    <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>

         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>
