<?php
namespace App\Agent\Controller;

class Auth extends BaseController
{
    public function getLogout()
    {
        return $this->exe->redirect->frontend();
    }
}