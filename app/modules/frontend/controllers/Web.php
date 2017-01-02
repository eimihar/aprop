<?php
namespace App\Frontend\Controller;

use App\Entity\Inquiry;
use App\Entity\Project;

class Web extends BaseController
{
    public function index()
    {
        $projects = Project::where('active', 1)->get();

        if($this->exe->request->getMethod() == 'POST')
            return $this->postIndex();

        return $this->render('web/index', array(
            'projects' => $projects
        ));
    }

    public function postIndex()
    {
        $param = $this->exe->request->getParsedBody();
        $param = $param['inquiry'];

        $inquiry = new Inquiry;
        $inquiry->full_name = $param['full_name'];
        $inquiry->phone_no = $param['phone_no'];
        $inquiry->email = $param['email'];
        $inquiry->basic_salary = $param['basic_salary'];
        $inquiry->net_salary = $param['net_salary'];
        $inquiry->created_at = date('Y-m-d H:i:s');
        $inquiry->updated_at = date('Y-m-d H:i:s');
        $inquiry->save();

        return $this->exe->redirect->frontend();
    }

    public function projects()
    {
        $project = Project::all();

        return $this->render('web/projects', array(
            'projects' => $project
        ));
    }

    public function project($slug = null)
    {
        $slug = $slug ? : $this->exe->param('project-slug');

        /** @var Project $project */
        $project = Project::where('slug', $slug)->first();

        return $this->render('web/project', array(
            'project' => $project,
            'projectImages' => $project->images
        ));
    }

    public function contact()
    {
        return $this->render('web/contact');
    }

    public function login()
    {
        return $this->exe
            ->redirect
            ->admin('projects');
    }
}