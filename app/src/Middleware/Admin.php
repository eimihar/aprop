<?php

namespace App\Middleware;

use App\Exe;

class Admin
{
    public function handle(Exe $exe)
    {
        if(!$exe->agent)
            return $exe->redirect->route('@web.default', array('action' => 'login'));

        return $exe->next($exe);
    }
}