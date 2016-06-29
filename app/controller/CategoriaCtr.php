<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controller;

/**
 * Description of CategoriaCtr
 *
 * @author João Lucas Farias
 */
class CategoriaCtr extends \core\mvc\Controller {

    public function __construct() {
        parent::__construct();
        $this->view = new \app\view\categoria\CategoriaView();
        $this->model = new \app\model\CategoriaModel();
        $this->dao = new \app\dao\CategoriaDao();
    }

    public function showList() {
        try {
            $dados = null;
            if ($this->post) {
                $nome = $this->post['nome'];
                $operacao = $operacao = $this->post['operacao'];
                $select = "upper(" . \app\dao\CategoriaDao::TB_NOME . ") like upper('{$nome}%') ";
                if ($operacao == "C" || $operacao == "D") {
                    $select = $select . " AND " . \app\dao\CategoriaDao::TB_OPERACAO . "= '{$operacao}'";
                }
                $dados = $this->dao->selectAll($select, \app\dao\CategoriaDao::TB_NOME);
            }
            $view = new \app\view\categoria\CategoriaList($dados);
        } catch (\Exception $ex) {
            $view = new \core\mvc\view\Message(\core\Application::MSG_ERROR . " . {$ex->getMessage()}");
        } finally {
            $view->show();
        }
    }

    public function viewToModel() {
        if ($this->post) {
            $this->model = new \app\model\CategoriaModel($this->post['id'], $this->post['nome'], $this->post['operacao'], $this->post['valortotal']);
        }
    }

}
