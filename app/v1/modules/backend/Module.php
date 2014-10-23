<?php

namespace Backend;

class Module {

    public function registerAutoloaders() {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Backend\Controllers' => __DIR__ . '/controllers/',
            'Backend\Models'      => __DIR__ . '/models/',
        ));
        $loader->register();
    }

    public function registerServices($di) {
        $dispatcher = new \Phalcon\Mvc\Dispatcher();
        $dispatcher->setDefaultNamespace('Backend\Controllers');
        $di->set('dispatcher', $dispatcher);
    }

}
