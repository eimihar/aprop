<?php
namespace App\Middleware;

use App\Entity\User;
use App\Exe;

class All
{
    public function handle(Exe $exe)
    {
        $exe['service']->add('user', function()
        {
            /** @var Exe $this */
            if(!$this->session->has('user_id'))
                return false;

            return User::find($this->session->get('user_id'));
        });

        $exe->view->setDefaultData(array(
            'exe' => $exe,
            'form' => $exe->form
        ));

        return $exe->next($exe);
    }
}