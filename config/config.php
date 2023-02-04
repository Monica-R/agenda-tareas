<?php

    /
    * Load the autoload file from composer folder
    */
    require '../vendor/autoload.php';

    /
    * @var object The instance of Dotenv class
    * @param string $paths The path used to load the environment variables
    */
    $dotenv = Dotenv\Dotenv::createImmutable('../includes');
    /**
     * Load the file from the path passed by reference
     */
    $dotenv->load();

?>