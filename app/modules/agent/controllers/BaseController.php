<?php
namespace App\Agent\Controller;

use App\Exe;

abstract class BaseController
{
    /**
     * @var Exe $exe
     */
    protected $exe;

    public function __construct(Exe $exe)
    {
        $this->exe = $exe;
    }

    public function render($view, array $data = array())
    {
        return $this->exe->render($view, $data);
    }
}