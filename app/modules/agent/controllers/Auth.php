<?php
namespace App\Agent\Controller;

class Auth extends BaseController
{
    public function getLogout()
    {
        $this->exe->session->destroy('agent_id');

        return $this->exe->redirect->frontend();
    }
}