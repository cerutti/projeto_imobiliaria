<?php
if (isset($_POST['atualizar_administrador'])):

    $nomeEscolhido = trim($_POST['nome']);
    $usuarioEscolhido = $_POST['usuario'];
    $senhaEscolhida = $_POST['senha'];
    $id = (int) $_POST['id'];

    $c = new Administrador();
    $c->obrigatorio("nome", $nomeEscolhido);
    $c->obrigatorio("usuario", $usuarioEscolhido);
    $c->obrigatorio("senha", $senhaEscolhida);
    $c->verificaSenha($_POST['senha2'], $_POST['senha']);
    $erro = $c->getErro();

    if (!isset($erro)):
        $c->setAdm_nome($nomeEscolhido);
        $c->setAdm_usuario($usuarioEscolhido);
        $c->setAdm_senha($senhaEscolhida);
        $c->setId($id);
        if ($c->alterar()):
            $msg = "";
            $msg = "Categoria alterada com sucesso !";
        else:
            $erro = $c->getErro();
        endif;
    else:
    endif;


endif;
?>


<div class="col-md-10">

    <div class="row">
      <div class="col-md-12">
        <div class="content-box-large">
          <div class="panel-heading">
                <div class="panel-title">Alterar Usuário</div>

            </div>
          <div class="panel-body">

            <?php
            try {
                if (isset($_GET['id'])):
                    $id = (int) $_GET['id'];
                    $categoria = new Administrador();
                    $categoria->setAdm_nome($id);
                    $dados = $categoria->pegarId();
                else:
                    throw new Exception("Erro: você tentou acessar a pagina sem escolher uma categoria !");
                endif;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
            ?>

            <form action="" method="POST">
            <fieldset>
                      <input type="hidden" name="id" value="<?php echo $id; ?>" />
              <div class="form-group">
                <label>Nome</label>
                <input class="form-control" name="nome" value="<?php echo $dados->adm_nome; ?>" placeholder="Nome" type="text">
              </div>
              <div class="form-group">
                <label>Usuario</label>
                <input class="form-control" name="usuario" value="<?php echo $dados->adm_usuario; ?>" placeholder="Usuario" type="text">
              </div>
              <div class="form-group">
                <label>Senha</label>
                <input class="form-control" name="senha" value="<?php echo $dados->adm_senha; ?>" placeholder="Senha" type="password">
              </div>
              <div class="form-group">
                <label>Confirmar Senha</label>
                <input class="form-control" name="senha2" value="<?php echo $dados->adm_senha; ?>" placeholder="Confirmar Senha" type="password">
              </div>
            </fieldset>
            <div>
              <input type="submit" name="atualizar_administrador" value="Atualizar" class="btn btn-primary" />
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <?php echo isset($erro)? '<div class=bg-danger>'.$erro.'</div>': "";?>
    <?php echo isset($msg)? '<div class=bg-sucess>'.$msg.'</div>': "";?>

  <!--  Page content -->
</div>
