<?php

namespace Frontend;

class Module {

    public function registerAutoloaders() {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Frontend\Controllers' => __DIR__ . '/controllers/',
            'Frontend\Models'      => __DIR__ . '/models/',
        ));
        $loader->register();
    }

    public function registerServices($di) {
        $dispatcher = new \Phalcon\Mvc\Dispatcher();
        $dispatcher->setDefaultNamespace('Frontend\Controllers');
        $di->set('dispatcher', $dispatcher);
    }

}
