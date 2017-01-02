<?php
namespace App\Frontend\Controller;

use App\Exe;

abstract class BaseController
{
    public function __construct(Exe $exe)
    {
        $this->exe = $exe;
    }

    public function render($view, array $data = array())
    {
        return $this->exe->render($view, $data);
    }
}