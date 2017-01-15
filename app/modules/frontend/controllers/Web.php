<?php
namespace App\Frontend\Controller;

use App\Entity\Agent;
use App\Entity\Project;
use App\Entity\User;
use App\Entity\UserProject;
use App\Exe;

class Web extends BaseController
{
    public function index()
    {
        $projects = Project::where('active', 1)->orderBy('created_at', 'desc')->take(10)->get();

        if($this->exe->request->getMethod() == 'POST')
            return $this->postIndex();

        if($this->exe->request->param('cancel'))
        {
            $this->exe->session->destroy('user_id');
            return $this->exe->redirect->frontend();
        }

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

        $sector = $this->exe->user ? $this->exe->user->sector : 'public';

        return $this->render('web/index', array(
            'formIsPublic' => $sector == 'public',
            'formIsPrivate' => $sector == 'private',
            'title' => 'Casa Idaman',
            'description' => 'Buat permohonan semakan rumah tanpa deposit',
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

        if($this->user)
            $user = $this->user;
        else
            $user = User::findSimilar($param['email'], $param['phone_no']);

        if(!$user)
        {
            $user = new User;
            $user->created_at = date('Y-m-d H:i:s');
        }

        $user->sector = $param['sector'];
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

        $userPreferenced = false;

        $title = 'Senarai Projek Perumahan';
        $description = 'Direktori projek-projek perumahan tanpa deposit';

        if($this->exe->request->param('user_preference') && $this->exe->user)
        {
            $userPreferenced = true;
            $projects = Project::findByUserPreferences($this->exe->user);

            $title = 'Semakan Projek Perumahan';
            $description = 'Hasil semakan berdasarkan maklumat anda';
        }
        else
        {
            $projects = Project::all();
        }


        return $this->render('web/projects', array(
            'title' => $title,
            'description' => $description,
            'projects' => $projects,
            'userPreferenced' => $userPreferenced
        ));
    }

    public function project($slug = null)
    {
        $slug = $slug ? : $this->exe->param('project-slug');

        /** @var Project $project */
        $project = Project::where('slug', $slug)->first();

        if(Exe::httpRequest()->param('apply'))
        {
            $userProject = new UserProject;
            $userProject->user_id = $this->user->id;
            $userProject->project_id = $project->id;
            $userProject->save();

            return $this->exe->redirect->route('@web.project', array('project-slug' => $slug));
        }

        if($this->exe->request->isMethod('POST'))
        {
            $param = $this->exe->request->getParsedBody();
            $param = $param['inquiry'];

            if($this->user)
                $user = $this->user;
            else
                $user = User::findSimilar($param['email'], $param['phone_no']);

            if(!$user)
            {
                $user = new User;
                $user->created_at = date('Y-m-d H:i:s');
            }

            $user->sector = $param['sector'];
            $user->full_name = $param['full_name'];
            $user->phone_no = $param['phone_no'];
            $user->email = $param['email'];
            $user->basic_salary = $param['basic_salary'];
            $user->net_salary = $param['net_salary'];
            $user->updated_at = date('Y-m-d H:i:s');
            $user->ip_address = $_SERVER['REMOTE_ADDR'];
            $user->save();

            $userProject = new UserProject;
            $userProject->user_id = $user->id;
            $userProject->project_id = $project->id;
            $userProject->save();

            $this->exe->session->set('user_id', $user->id);

            return $this->exe->redirect->refresh();
        }

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
        if($this->exe->session->has('agent_id'))
            return $this->exe->redirect->admin('projects');

        if(Exe::httpRequest()->isMethod('POST'))
        {
            $email = $this->exe->request->param('email');
            $password = $this->exe->request->param('password');

            $agent = Agent::where('email', $email)->first();

            if(!$agent)
                die('WRONG!');

            if(!password_verify($password, $agent->password))
                die('WRONG!');

            $this->exe->session->set('agent_id', $agent->id);

            return $this->exe
                ->redirect
                ->admin('projects');
        }

        return $this->render('web/login');
    }
}