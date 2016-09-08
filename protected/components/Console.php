<?php

class Console
{
    public static function start($command)
    {
        $cmd = PHP_BINDIR . "/php " . Yii::app()->basePath . '/yiic ' . $command;
        $dir = dirname(__FILE__) . '/..' . "/runtime/";

        $descriptor = array(
            0 => array("pipe", "r"),
            1 => array("pipe", "w"),
            2 => array("file", $dir . "error-output.txt", "a")
        );

        $cwd = '/tmp';
        $env = array('some_option' => 'aeiou');

        $process = proc_open($cmd . ' >>/dev/null &', $descriptor, $pipes, $cwd, $env);

        if (is_resource($process)) {
            fwrite($pipes[0], '');
            fclose($pipes[0]);
            fclose($pipes[1]);
            proc_close($process);
        }
    }
}