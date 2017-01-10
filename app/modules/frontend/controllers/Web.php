<?php
namespace App\Frontend\Controller;

use App\Entity\Project;
use App\Entity\User;

class Web extends BaseController
{
    public function index()
    {
        $projects = Project::where('active', 1)->get();

        if($this->exe->request->getMethod() == 'POST')
            return $this->postIndex();

//        if($this->exe->user)
//            return $this->relatedIndex($this->exe->user);

        $user = $this->exe->user ? : new User;

        $this->exe->form->set(array(
            'inquiry[full_name]' => $user->full_name,
            'inquiry[phone_no]' => $user->phone_no,
            'inquiry[email]' => $user->email,
            'inquiry[basic_salary]' => $user->basic_salary,
            'inquiry[net_salary]' => $user->net_salary
        ));

        return $this->render('web/index', array(
            'projects' => $projects,
            'user' => $user
        ));
    }

    public function relatedIndex(User $user)
    {
        $projects = Project::findByUserPreferences($user);

        return $this->render('web/index_related', array(
            'projects' => $projects
        ));
    }

    public function postIndex()
    {
        $param = $this->exe->request->getParsedBody();
        $param = $param['inquiry'];

        $user = User::findSimilar($param['email'], $param['phone_no']);

        if(!$user)
        {
            $user = new User;
            $user->created_at = date('Y-m-d H:i:s');
        }

        $user->full_name = $param['full_name'];
        $user->phone_no = $param['phone_no'];
        $user->email = $param['email'];
        $user->basic_salary = $param['basic_salary'];
        $user->net_salary = $param['net_salary'];
        $user->updated_at = date('Y-m-d H:i:s');
        $user->ip_address = $_SERVER['REMOTE_ADDR'];
        $user->save();

        $this->exe->session->set('user_id', $user->id);

        return $this->exe->redirect->route('@web.projects', array(), array('user_preference' => 1));
    }

    public function projects()
    {
        $query = Project::where('active', 1);

        if($this->exe->request->param('user_preference') && $this->exe->user)
        {
            $userPreferenced = true;
            $projects = Project::findByUserPreferences($this->exe->user);
        }
        else
        {
            $projects = Project::all();
        }


        return $this->render('web/projects', array(
            'projects' => $projects
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