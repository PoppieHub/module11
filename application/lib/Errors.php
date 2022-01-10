<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd()
    {
        array_map(function ($value) {
            if (class_exists(Symfony\Component\VarDumper\Dumper\CliDumper::class)) {
                $dumper = 'cli' === PHP_SAPI ?
                    new Symfony\Component\VarDumper\Dumper\CliDumper :
                    new Symfony\Component\VarDumper\Dumper\HtmlDumper;
                $dumper->dump((new Symfony\Component\VarDumper\Cloner\VarCloner)->cloneVar($value));
            } else {
                echo '<pre>';
                var_dump($value);
                echo '</pre>';
            }
        }, func_get_args());
        die(1);
    }
}
?>
