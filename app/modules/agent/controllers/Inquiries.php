<?php
namespace App\Agent\Controller;

use App\Entity\Inquiry;

class Inquiries extends BaseController
{
    public function getIndex()
    {
        $inquiries = Inquiry::all();

        return $this->render('inquiries/index', array(
            'inquiries' => $inquiries
        ));
    }
}