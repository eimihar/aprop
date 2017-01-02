<?php
namespace App\Middleware;

use App\Exe;

class UrlRegistry
{
    public function handle(Exe $exe)
    {
        $exe->url->addCallable('admin', function($controller, $action = null)
        {
            return $this->agent($controller, $action);
        });

        // add factory method
        $exe->url->addCallable('agent', function($controller, $action = null)
        {
            $params = array('controller' => $controller);

            if($action)
                $params['action'] = $action;

            return $this->route('@admin.default', $params);
        });

        $exe->url->addCallable('images', function($path = null)
        {
            return '/apps/images' . $path ? '/' . $path : '';
        });

        $exe->url->addCallable('frontend', function($path = '')
        {
            $uri = $this->route('@web.landing');

            if($uri != '/')
                $uri = rtrim($uri, '/');

            return $uri  . ($path ? '/' . $path : '');
        });

        return $exe->next($exe);
    }
}