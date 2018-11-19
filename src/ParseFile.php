<?php

/**
 * Created by PhpStorm.
 * User: raphaeu
 * Date: 19/11/18
 * Time: 15:56
 */

namespace raphaeu;

class ParseFile
{

    static private $file = __DIR__."/config.ini";
    static private $content =null;

    /**
     * Config constructor.
     */
    private static function load()
    {
        if (!file_exists(self::$file))
        {
            throw new \Exception('Arquivo de configuração não esta setado. crie o arquivo script.ini na raiz do projeto.');
        }else {
            if (self::$content == null) {
                self::$content = parse_ini_file(self::$file, true);
            }
        }
    }

    /**
     * @param $file
     * @throws \Exception
     */
    static public function setFile($file)
    {
        if (!file_exists($file)) throw new \Exception('Arquivo de configuração informado não existe.');
        self::$file = $file;


    }

    /**
     * @param $context string
     * @param null $key string
     * @return string|object
     * @throws \Exception
     */
    static public function get($context =null, $key = null, $default=null)
    {
        self::load();

        if ($context == null && $key == null)
        {
            return (object)self::$content;

        }elseif ($key  == null){
            return (object)self::$content[$context];
        }
        else
        {
            return isset(self::$content[$context][$key])?self::$content[$context][$key]:$default;
        }
    }
}