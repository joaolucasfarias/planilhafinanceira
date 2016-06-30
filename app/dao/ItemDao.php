<?php

namespace app\dao;

/**
 * Classe DAO para Item.
 *
 * @author João Lucas Farias
 */
class ItemDao extends \core\dao\Dao {

    const TB_NOME = 'nomeitem';
    const TB_VALOR_BASE = 'valorbase';
    const TB_ID_CATEGORIA = 'idcategoria';
    const TB_ID_GRUPO = 'idgrupo';

    public function __construct(\app\model\ItemModel $model = null) {
        parent::__construct($model);
        $this->tableName = 'item';
        $this->tableId = 'iditem';
    }

    /* public function insertUpdate($returnId = null) {
      try {
      //..inicia a transação.
      $this->connection->beginTransaction();

      $sqlObj = new \core\dao\SqlObject($this->connection);

      $valor = $this->model->getCategoria()->getTotal() + $this->model->getValorBase();

      $sqlObj->update('categoria', array(CategoriaDao::TB_TOTAL => $valor), self::TB_ID_CATEGORIA . " = {$this->model->getCategoria()->getId()}");

      if ($this->model->getId() == '')
      $sqlObj->insert($this->tableName, $this->columns);
      else
      $sqlObj->update($this->tableName, $this->columns, $this->tableId . " = {$this->model->getId()}");
      $this->connection->commit();
      } catch (\Exception $ex) {
      $this->connection->rollBack();
      throw $ex;
      }
      }

      public function delete($id) {
      try {
      //..inicia a transaçao
      $this->connection->beginTransaction();
      //..cria um novo sqlobj
      $sqlOjb = new \core\dao\SqlObject($this->connection);
      //..deleta o registro da pessoa_fisica
      $sqlOjb->delete(self::TABLE_NAME, self::TB_ID_PESSOA_FISICA . " = {$id}");
      //..delete o registro da tabela pessoa
      parent::delete($id);
      //..confirma a transação.
      $this->connection->commit();
      } catch (\Exception $ex) {
      //..cancela a transação.
      $this->connection->rollBack();
      //..lança a exceção.
      throw $ex;
      }
      } */

    protected function setColumns() {
        $this->columns = array(self::TB_NOME => $this->model->getNome(), self::TB_VALOR_BASE => $this->model->getValorBase(), self::TB_ID_CATEGORIA => $this->model->getCategoria()->getId());
    }

    public function findById($id) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $dados = $sqlObj->select($this->tableName, '*', "{$this->tableId} = {$id}");
            if ($dados) {
                $dados = $dados[0];
                $categoriaDao = new CategoriaDao();
                $categoriaModel = $categoriaDao->findById($dados[self::TB_ID_CATEGORIA]);
                $itemModel = new \app\model\ItemModel($dados[$this->tableId], $dados[self::TB_NOME], $dados[self::TB_VALOR_BASE], $categoriaModel, /* $dados[self::TB_ID_GRUPO] */ NULL);
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
            $items = null;
            if ($dados) {
                foreach ($dados as $dado) {
                    $categoriaDao = new CategoriaDao();
                    $categoriaModel = $categoriaDao->findById($dado[self::TB_ID_CATEGORIA]);
                    $itemModel = new \app\model\ItemModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_VALOR_BASE], $categoriaModel, /* $dado[self::TB_ID_GRUPO] */ NULL);
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

    public function selectJson($nome = null, $parametro = null, $valor = null) {
        try {
            $sqlObj = new \core\dao\SqlObject($this->connection);
            $select = "upper(" . \app\dao\ItemDao::TB_NOME . ") like upper('{$nome}%') ";

            if ($valor != null) {
                if ($parametro == 1)
                    $select = $select . " AND " . \app\dao\ItemDao::TB_VALOR_BASE . " = '{$valor}'";
                else if ($parametro == 2)
                    $select = $select . " AND " . \app\dao\ItemDao::TB_VALOR_BASE . " >= '{$valor}'";
                else if ($parametro == 3)
                    $select = $select . " AND " . \app\dao\ItemDao::TB_VALOR_BASE . " <= '{$valor}'";
                else if ($parametro == 4)
                    $select = $select . " AND " . \app\dao\ItemDao::TB_VALOR_BASE . " <> '{$valor}'";
            }

            $dados = $sqlObj->select($this->tableName, '*', $select, \app\dao\ItemDao::TB_NOME);
            $items = null;
            if ($dados) {
                /*foreach ($dados as $dado) {
                    $categoriaDao = new CategoriaDao();
                    $categoriaModel = $categoriaDao->findById($dado[self::TB_ID_CATEGORIA]);
                    $itemModel = new \app\model\ItemModel($dado[$this->tableId], $dado[self::TB_NOME], $dado[self::TB_VALOR_BASE], $categoriaModel, /* $dado[self::TB_ID_GRUPO] */ //NULL);
                  //  $items[] = $itemModel;
                //}
                echo json_encode($dados);
                //return json_encode($items);
            } else {
                return 'erro';
            }
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

}
