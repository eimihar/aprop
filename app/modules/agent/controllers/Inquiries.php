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

    public function xgetDetail()
    {
        $user = User::find($this->exe->request->param('id'));

        return $this->render('inquiries/detail', array(
            'user' => $user
        ));
    }
}