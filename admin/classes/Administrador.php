<?php

class Administrador extends Abstrata implements iCRUD {

    private $id;
    private $adm_nome;
    private $adm_usuario;
    private $adm_senha;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getAdm_nome() {
        return $this->adm_nome;
    }

    public function setAdm_nome($adm_nome) {
        $this->adm_nome = $adm_nome;
    }

    public function getAdm_usuario() {
        return $this->adm_usuario;
    }

    public function setAdm_usuario($adm_usuario) {
        $this->adm_usuario = $adm_usuario;
    }

    public function getAdm_senha() {
        return $this->adm_senha;
    }

    public function setAdm_senha($adm_senha) {
        $this->adm_senha = $adm_senha;
    }

    public function listar() {
        parent::$tabela = "administrador";
        return parent::listar();
    }

    public function listarCategoria() {
        parent::$tabela = "categoria";
        parent::$existeParametros = true;
        $this->setParametros(" LEFT JOIN posicao_destaque ON categoria.categoria_posicao_destaque =
                               posicao_destaque.posicao_destaque_id");
        return parent::listar();
    }

    public function pegarId() {
        parent::$tabela = "administrador";
        parent::$campoTabela = "id";
        parent::$campoEscolhido = $this->getAdm_nome();
        return parent::pegarId();
    }

    public function alterar() {

        $pdo = parent::getDB();
        try {

            $alterar = $pdo->prepare("UPDATE administrador SET adm_nome = :nome, adm_usuario = :usuario, adm_senha = :senha
                                      WHERE id = :id");
            $alterar->bindValue(":nome", $this->getAdm_nome());
            $alterar->bindValue(":usuario", $this->getAdm_usuario());
            $alterar->bindValue(":senha", $this->getAdm_senha());
            $alterar->bindValue(":id", $this->getId());
            $alterar->execute();

            if ($alterar->rowCount() == 1):
                return true;
            else:
                $this->setErro("Erro ao alterar o usuário !");
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function cadastrar() {
        $pdo = parent::getDB();

        try {

            parent::$tabela = "administrador";
            parent::$campoTabela = "id";
            parent::$campoEscolhido = $this->getId();
            if (parent::existeCadastro()):

                $this->setErro("Ja existe esse adm !");

            else:

                $cadastrar = $pdo->prepare("INSERT INTO administrador(adm_nome, adm_usuario, adm_senha)
                                        VALUES(:adm_nome, :adm_usuario, :adm_senha)");
                $cadastrar->bindValue(":adm_nome", $this->getAdm_nome());
                $cadastrar->bindValue(":adm_usuario", $this->getAdm_usuario());
                $cadastrar->bindValue(":adm_senha", $this->getAdm_senha());
                $cadastrar->execute();

                if ($cadastrar->rowCount() == 1):
                    return true;
                else:
                    $this->setErro("Erro ao cadastrar novo administrador");
                endif;


            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function deletar() {
        parent::$tabela = "administrador";
        parent::$campoTabela = "id";
        return parent::deletar();
    }

}
