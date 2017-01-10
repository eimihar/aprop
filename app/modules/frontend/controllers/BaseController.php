<?php
namespace App\Frontend\Controller;

use App\Entity\User;
use App\Exe;

abstract class BaseController
{
    /** @var null|User */
    protected $user;

    public function __construct(Exe $exe)
    {
        $this->exe = $exe;

        $this->user = $exe->user;
    }

    public function render($view, array $data = array())
    {
        return $this->exe->render($view, $data);
    }
}