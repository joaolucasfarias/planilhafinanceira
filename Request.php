<?php

/**
 * Classe que centraliza as requisições
 *
 * @author João Lucas Farias
 */
class Request {

    /**
     * Trata uma requisição de um cliente. 
     */
    static function getRequest() {
        if ($_GET) {
            $class = isset($_GET['class']) ? $_GET['class'] : NULL;
            $method = isset($_GET['method']) ? $_GET['method'] : NULL;
            if ($class) {
                $object = new $class;
                if (method_exists($object, $method)) {
                    call_user_func(array($object, $method));
                }
            } else if (function_exists($method)) {
                call_user_func($method, $GET);
            }
        }
    }

}

require_once 'autoload.php';
Request::getRequest();
