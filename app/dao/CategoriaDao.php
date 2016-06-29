<?php

namespace app\dao;

/**
 * Classe DAO para Categoria.
 *
 * @author João Lucas Farias
 */
class CategoriaDao extends \core\dao\Dao {

    const TB_NOME = 'nomecategoria';
    const TB_OPERACAO = 'operacao';
    const TB_TOTAL = 'total';

    function __construct(\app\model\CategoriaModel $model = null) {
        parent::__construct($model);
        $this->tableId = 'idcategoria';
        $this->tableName = 'categoria';
        if (!$model) {
            $this->model = new \app\model\CategoriaModel ();
        }
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_OPERACAO => $this->model->getOperacao(), self::TB_TOTAL => $this->model->getTotal());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $categoriaModel = new \app\model\CategoriaModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_OPERACAO], $dados[self::TB_TOTAL]);
                return $categoriaModel;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function selectAll($criteria = null, $orderBy = null, $groupBy = null, $limit = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', $criteria, $orderBy, $groupBy, $limit);
            if ($dados) {
                $categorias = null;
                foreach ($dados as $dado) {
                    $categoriaModel = new \app\model\CategoriaModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_OPERACAO], $dado[self::TB_TOTAL]);
                    $categorias[] = $categoriaModel;
                }
                return $categorias;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function insertUpdate($returnId = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            if (!$this->model->getId()) {
                $dados = array(self::TB_NOME => $this->model->getNome(), self::TB_OPERACAO => $this->model->getOperacao());
                $sqlObj->insert($this->tableName, $dados);
            } else
                $sqlObj->update($this->tableName, $this->columns, $this->tableId . " = {$this->model->getId()}");
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function selectJson($nome = null, $operacao = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $select = "upper(" . \app\dao\CategoriaDao::TB_NOME . ") like upper('{$nome}%') ";
            if ($operacao == "C" || $operacao == "D") {
                $select = $select . " AND " . \app\dao\CategoriaDao::TB_OPERACAO . "= '{$operacao}'";
            }
            $dados = $sqlObj->select($this->tableName, '*', $select, \app\dao\CategoriaDao::TB_NOME);
            if ($dados) {
                return json_encode($dados);
            } else {
                return 'erro';
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

}
