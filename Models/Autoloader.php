<?php
/**
 * Created by PhpStorm.
 * User: Valentin
 * Date: 07/12/2017
 * Time: 22:15
 */

class Autoloader{

    private static $_instance = null;

    /**
     * Launch the autoloader and check if it isn't already running
     */
    public static function load(){
        if(null !== self::$_instance)
            throw new RuntimeException(sprintf('%s already starded', __CLASS__));

        self::$_instance = new self();

        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false))
            throw new RuntimeException(sprintf('%s : cannot start the loader', __CLASS__));
    }

    /**
     * Each time you try to instantiate a class, _autoload is called
     * @param $class mixed class loaded
     */
    private static function _autoload($class){
        $className = $class.'.php';
        $directories = array('Models'.DIRECTORY_SEPARATOR, 'Models'.DIRECTORY_SEPARATOR.'Task'.DIRECTORY_SEPARATOR, 'Models'.DIRECTORY_SEPARATOR.'TaskList'.DIRECTORY_SEPARATOR, 'Models'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR ,'Views'.DIRECTORY_SEPARATOR, 'Controllers'.DIRECTORY_SEPARATOR, 'Configs'.DIRECTORY_SEPARATOR);

        foreach ($directories as $dir){
            $file = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.$dir.$className;
            if(file_exists($file))
                require_once ($file);
        }
    }
}