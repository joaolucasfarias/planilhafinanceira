<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\dao;

/**
 * Classe que cuida da conexão com o banco de dados
 *
 * @author João Lucas Farias
 */
class Connection {

    /**
     * O nome do banco de dados
     */
    const DBNAME = 'nomebanco';

    /**
     * O usuário do banco de dados
     */
    const USER = 'usuario';

    /**
     * A senha do banco de dados
     */
    const PASSWORD = 'senha';

    /**
     * O host do banco de dados.
     */
    const HOST = 'host';

    /**
     * A porta do banco de dados.
     */
    const PORT = 9999;

    /**
     * Retorna um objeto PDO para fazer a conexão com o banco de dados.
     * @return \PDO
     * @throws \PDOException
     */
    public static function getConnection() {
        try {
            //..pega um objeto PDO
            $connection = new \PDO("pgsql:dbname=" . self::DBNAME .
                    ";user=" . self::USER .
                    ";password=" . self::PASSWORD . ";host=" .
                    self::HOST . ";port=" . self::PORT);
            //..configura para gerar exceções sempre que um erro ocorrer
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //..retorna o objeto PDO;
            return $connection;
        } catch (\PDOException $ex) {
            throw $ex;
        }
    }

}
