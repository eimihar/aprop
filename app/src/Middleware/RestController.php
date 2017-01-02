<?php
namespace App\Middleware;

use App\Exe;

class RestController
{
    public function handle(Exe $exe)
    {
        $exe['callable']->add('rest', function($controller, $action = 'index', array $params = array())
        {
            $action = strtolower($this->request->getMethod()).ucfirst($action);
            @list($action, $params) = explode('/', $action, 2);
            $params = isset($params) ? explode('/', $params) : array();
            if($this->request->isAjax())
                $action = 'x'.$action;
            $params = array_merge($this->params(), $params);
            return $this->controller->execute([$controller, [$this]], $action, [$params]);
        });

        return $exe->next($exe);
    }
}