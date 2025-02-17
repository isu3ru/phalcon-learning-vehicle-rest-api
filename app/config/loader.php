<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Autoload\Loader();

$loader->setDirectories(
    [
        $config->application->modelsDir,
        $config->application->controllersDir,
        $config->application->migrationsDir,
    ]
)->register();
