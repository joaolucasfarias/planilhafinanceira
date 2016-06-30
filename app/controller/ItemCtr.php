<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of ItemCtr
 *
 * @author João Lucas Farias
 */
class ItemCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\item\ItemView();
        $this->model = new \app\model\ItemModel();
        $this->dao = new \app\dao\ItemDao();
    }

    public function showList() {
        try {
            $dados = null;
            /* if ($this->post) {
              $nome = $this->post['nome'];
              $dados = $this->dao->selectAll("upper(" . \app\dao\ItemDao::TB_NOME . ") like upper('{$nome}%') ", \app\dao\ItemDao::TB_NOME);
              } */
            $view = new \app\view\item\ItemList();
        } catch (\Exception $ex) {
            //$view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
            $view = new \app\view\item\ItemList();
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        if ($this->post) {
            $this->model = new \app\model\ItemModel($this->post['id'], $this->post['nome'], $this->post['valorbase'], new \app\model\CategoriaModel($this->post['idcategoria'], $this->post['nomecategoria']));
        }
    }

    public function retornarItensJson() {
        try {
            $nome = $this->get['nome'];
            $parametro = $this->get['parametro'];
            $valor = $this->get['valor'];
            echo $this->dao->selectJson($nome, $parametro, $valor);
        } catch (\Exception $ex) {
            echo 'erro';
        }
    }

}
