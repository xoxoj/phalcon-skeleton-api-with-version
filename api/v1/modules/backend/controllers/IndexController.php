<?php

namespace Backend\Controllers;

class IndexController extends \Phalcon\Mvc\Controller {

    public function indexAction() {
        $data = array(
            'action' => __METHOD__,
            'get'    => $_GET,
            'post'   => $_POST
        );
        
        $this->response->setStatusCode(200, 'Ok');
        $this->response->setJsonContent($data);

        return $this->response;
    }

}
