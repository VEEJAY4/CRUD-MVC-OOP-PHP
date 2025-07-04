<?php

    spl_autoload_register("classAutoloader");

    function classAutoloader($classname)
    {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if(strpos($url, "includes") !== false)
            $path = "../classes/";
        else
            $path = "classes/";

        $extension = ".class.php";
        $fullpath = $path . $classname . $extension;

        include_once $fullpath;
    }

?>