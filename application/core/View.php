<?php

namespace application\core;

class View {

    public $path;
    public $layout = 'default';
    public $route;

    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    protected function modifyPath($str) {
        $str =  str_replace( "Controller","", $str);
        return mb_strtolower($str);
    }

    public function render($title, $value = []) {

        if (file_exists('application/teamplates/'.$this->modifyPath($this->path).'.php')) {
            ob_start();
            require 'application/teamplates/'.$this->modifyPath($this->path).'.php';
            $content = ob_get_clean();
            require 'application/teamplates/layout/'.$this->layout.'.php';
        } else {
            echo '404';
        }
    }
}