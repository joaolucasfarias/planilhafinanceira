<?php

namespace core\mvc\view;

/**
 * Página modelo para páginas de HTML
 *
 * @author João Lucas Farias
 */
abstract class HtmlPage {

    /**
     * 
     * @var core\mvc\Model
     */
    protected $model;

    /**
     * Método para desenhar o topo da página - definido pelo arquivo top.phtml.
     */
    protected function drawTop() {
        require_once 'top.phtml';
    }

    /**
     * Método para desenhar o rodapé da página - definido pelo arquivo bottom.phtml.
     */
    protected function drawBottom() {
        require_once 'bottom.phtml';
    }

    /**
     * Método abstrato para exibir a view.
     */
    public abstract function show();

    function getModel() {
        return $this->model;
    }

    function setModel($model) {
        $this->model = $model;
    }

}
