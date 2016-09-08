<?php

class MyArray
{
    public static function get($array, $key, $return = null)
    {
        if (!is_array($array)) {
            return $return;
        }

        if (isset($array[$key])) {
            $answer = $array[$key];
            if (!is_array($answer)) {
                return trim($answer);
            }

            return $answer;
        }

        return $return;
    }

    public static function getPost($key, $return = null)
    {
        return self::get($_POST, $key, $return);
    }

    public static function varDump($array)
    {
        CVarDumper::dump($array, 10, true);
    }

    public static function printR($array)
    {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}
