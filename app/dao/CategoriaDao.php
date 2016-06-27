<?php

namespace app\dao;

/**
 * Classe DAO para Categoria.
 *
 * @author João Lucas Farias
 */
class CategoriaDao extends \core\dao\Dao {

    const TB_NOME = 'nome';
    const TB_OPERACAO = 'operacao';
    const TB_TOTAL = 'total';

    function __construct(\app\model\CategoriaModel $model = null) {
        parent::__construct($model);
        $this->tableId = 'idCategoria';
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

}
