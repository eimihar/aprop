<?php
namespace App;

use Exedra\Runtime\Exe as RuntimeExe;

class Exe extends RuntimeExe
{
    /** @var RuntimeExe $instance */
    protected static $instance;

    public function render($view, array $data = array())
    {
        if($this['service']->has('layout'))
        {
            $this->view->setDefaultData('url', $this->url);

            $template = $this->view->create($view);

            $template->set('title', 'Casa Idaman');
            $template->set('description', 'Laman idaman anda.');

            $template = $template->set($data)->prepare();

            return $this->layout
                ->set('template', $template)
                ->render();
        }

        return $this->view
            ->create($view)
            ->set($data)->render();
    }

    public function rest($controller, $action = 'index', array $params = array())
    {
        $action = strtolower($this->request->getMethod()).ucfirst($action);

        @list($action, $params) = explode('/', $action, 2);

        $params = isset($params) ? explode('/', $params) : array();

        if($this->request->isAjax())
            $action = 'x'.$action;

        $params = array_merge($this->params(), $params);

        return $this->controller->execute([$controller, [$this]], $action, [$params]);
    }

    public static function setInstance(RuntimeExe $exe)
    {
        static::$instance = $exe;
    }

    /**
     * @return RuntimeExe
     */
    public static function getInstance()
    {
        return static::$instance;
    }

    public static function httpRequest()
    {
        return static::getInstance()->request;
    }
}