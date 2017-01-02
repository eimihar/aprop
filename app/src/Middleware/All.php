<?php
namespace App\Middleware;

use App\Exe;

class All
{
    public function handle(Exe $exe)
    {
        $exe->view->setDefaultData('exe', $exe);

        return $exe->next($exe);
    }
}