<?php

error_reporting(E_ALL);

class Application extends \Phalcon\Mvc\Application {

    protected function _registerServices() {
        $di = new \Phalcon\DI\FactoryDefault();
        $di->set('router', function() {
            $router = new \Phalcon\Mvc\Router();
            $router->setDefaultModule('frontend');
            $router->add('/{version}/:module/:controller/:action/:params', array(
                'module'     => 2,
                'controller' => 3,
                'action'     => 4,
            ));
            return $router;
        });
        $this->setDI($di);
    }

    public function main() {
        $this->_registerServices();

        $version = substr(($version = substr($this->request->getURI(), 1, 10)), 0, strpos($version, '/'));
        $this->registerModules(array(
            'frontend' => array(
                'className' => 'Frontend\Module',
                'path'      => '../api/' . $version . '/modules/frontend/Module.php'
            ),
            'backend'  => array(
                'className' => 'Backend\Module',
                'path'      => '../api/' . $version . '/modules/backend/Module.php'
            )
        ));

        $this->response->setContentType('application/json', 'UTF-8');
        echo $this->handle()->getContent();
    }

}

$api = new Application();
$api->useImplicitView(false)->main();
