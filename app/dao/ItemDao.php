<?php

namespace app\dao;

/**
 * Classe DAO para Item.
 *
 * @author João Lucas Farias
 */
class ItemDao extends \core\dao\Dao {

    const TB_NOME = 'nome';
    const TB_VALOR_BASE = 'valorBase';
    const TB_ID_CATEGORIA = 'idCategoria';
    const TB_ID_GRUPO = 'idGrupo';

    public function __construct(\app\model\ItemModel $model = null) {
        parent::__construct($model);
        $this->tableName = 'item';
        $this->tableId = 'idItem';
    }

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_VALOR_BASE => $this->model->getValorBase());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $itemModel = new \app\model\ItemModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_VALOR_BASE], $dados[self::TB_ID_CATEGORIA], /* $dados[self::TB_ID_GRUPO] */ NULL);
                return $itemModel;
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
                $items = null;
                foreach ($dados as $dado) {
                    $itemModel = new \app\model\ItemModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_VALOR_BASE], $dado[self::TB_ID_CATEGORIA], /* $dado[self::TB_ID_GRUPO] */ NULL);
                    $items[] = $itemModel;
                }
                return $items;
            } else {
                return NULL;
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

}
