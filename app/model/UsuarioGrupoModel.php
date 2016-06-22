<?php

namespace app\model;

/**
 * Classe modelo para grupos de usuários
 *
 * @author João Lucas Farias
 */
final class UsuarioGrupoModel extends \core\mvc\Model {

    /**
     * Permissão do usuário sobre o grupo
     * @var bool 
     */
    private $permissao;

    /**
     * Usuário do grupo
     * @var \app\model\UsuarioModel 
     */
    private $usuario;

    /**
     * Grupo do usuário
     * @var app\model\GrupoModel 
     */
    private $grupo;

    /**
     * Método construtor
     * @param integer $id id do grupo de usuários
     * @param bool $permissao permissão do usuário
     * @param \app\model\UsuarioModel $usuario usuário do grupo
     * @param \app\model\app\model\GrupoModel $grupo grupo do usuário
     */
    public function __construct($id = null, $permissao = null, \app\model\UsuarioModel $usuario = null, app\model\GrupoModel $grupo = null) {
        parent::__construct($id);
        $this->permissao = $permissao;
        is_null($usuario) ? $this->usuario = new UsuarioModel() : $this->usuario = $usuario;
        is_null($grupo) ? $this->grupo = new GrupoModel() : $this->grupo = $grupo;
    }

    public function show() {
        
    }

    /**
     * Retorna a permissão do usuário
     * @return type
     */
    function getPermissao() {
        return $this->permissao;
    }

    /**
     * Retorna o usuário do grupo
     * @return \app\model\UsuarioModel
     */
    function getUsuario() {
        return $this->usuario;
    }

    /**
     * Retorna o grupo do usuário
     * @return app\model\GrupoModel
     */
    function getGrupo() {
        return $this->grupo;
    }

    /**
     * Modifica a permissão do usuário
     * @param type $permissao
     */
    function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    /**
     * Modifica o usuário do grupo
     * @param \app\model\UsuarioModel $usuario
     */
    function setUsuario(\app\model\UsuarioModel $usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Modifica o grupo do usuário
     * @param app\model\GrupoModel $grupo
     */
    function setGrupo(app\model\GrupoModel $grupo) {
        $this->grupo = $grupo;
    }

}
