<?php
namespace App\Agent\Controller;

use App\Entity\User;

class Inquiries extends BaseController
{
    public function getIndex()
    {
        $users = User::all();

        return $this->render('inquiries/index', array(
            'users' => $users
        ));
    }
}