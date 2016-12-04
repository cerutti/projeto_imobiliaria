<?php
if (isset($_GET['ac'])):

    if ($_GET['ac'] == 'deletar'):

        try {
            if (isset($_GET['id'])):
                $id = (int) $_GET['id'];

                $categoria = new Administrador();
                $categoria->setId($id);
                if ($categoria->deletar()):
                    $msg = "";
                    $msg = "Administrador deletado com sucesso !";
                else:
                    $erro = $categoria->getErro();
                endif;

            else:
                throw new Exception("Você tentou deletar um administrador que não existe !");
                die;
            endif;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    endif;

endif;
?>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  </div>
		  <div class="col-md-10">
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Usuários</div>
				</div>
        <a class="btn btn-success btn-sm adicionar" href="?page=cadastrar_adm">Adicionar</a>
  				<div class="panel-body">
  					<div class="table-responsive">
  					       <table class="table table-striped">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>Nome</th>
			                  <th>Usuario</th>
			                  <th>Permissão</th>
                        <th>Administrativo</th>
			                </tr>
			              </thead>

                    <?php
                    $cat = new Administrador;
                    $dados = $cat->listar();
                    $c = new ArrayIterator($dados);
                    while ($c->valid()):
                    ?>

			              <tbody>
			                <tr>
			                  <td><?php echo $c->current()->id; ?></td>
			                  <td><?php echo $c->current()->adm_nome; ?></td>
			                  <td><?php echo $c->current()->adm_usuario; ?></td>
			                  <td>adm</td>
                        <td><a class="btn btn-warning btn-sm" href="?page=update/update_admin&id=<?php echo $c->current()->id;  ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="?page=adm&ac=deletar&id=<?php echo $c->current()->id; ?>"> Delete</a>
                        </td>
			                </tr>
                      <?php
                      $c->next();
                  endwhile;
                  ?>
			              </tbody>
			            </table>
  					</div>
  				</div>
  			</div>

        <?php echo isset($erro)? '<div class=bg-danger>'.$erro.'</div>': "";?>
        <?php echo isset($msg)? '<div class=bg-sucess>'.$msg.'</div>': "";?>


		  </div>
		</div>
    </div>
