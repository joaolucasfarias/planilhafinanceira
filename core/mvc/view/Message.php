<?php

namespace core\mvc\view;

/**
 * Classe que controlará as mensagens exibidas pelo sistema
 *
 * @author João Lucas Farias
 */
class Message extends HtmlPage {

    /**
     * A mensagem que será exibida
     * @var string 
     */
    private $message;

    /**
     * Construtor
     * @param string $message A mensagem que será exibida.
     */
    function __construct($message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * Exibibe a página ao usuário.
     */
    public function show() {
        require_once 'message.phtml';
    }

}
