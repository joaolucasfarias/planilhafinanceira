<?php

namespace app\view\item;

/**
 * Classe que mostrará a página de item.
 *
 * @author João Lucas Farias
 */
class ItemView extends \core\mvc\view\HtmlPage {

    public function __construct(\app\model\ItemModel $model = null) {
        is_null($model) ? $this->model = new \app\model\ItemModel() : $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'item-view.phtml';
        $this->drawBottom();
    }

}
