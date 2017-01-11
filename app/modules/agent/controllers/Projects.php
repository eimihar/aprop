<?php
namespace App\Agent\Controller;

use App\Entity\Image;
use App\Entity\Project;
use App\Entity\ProjectImage;
use Exedra\Http\ServerRequest;
use Exedra\Http\UploadedFile;

class Projects extends BaseController
{
    public function getIndex()
    {
        $projects = Project::where('active', 1)->get();

        return $this->render('projects/index', array(
            'projects' => $projects
        ));
    }

    public function getAdd()
    {
        return $this->render('projects/add');
    }

    public function postAdd()
    {
        $param = $this->exe->request->getParsedBody();

        $request = $this->exe->request;

        $project = new Project;
        $project->name = $param['name'];
        $project->slug = urlencode(str_replace(' ', '-', strtolower($param['name'])));
        $project->description = $param['description'];
        $project->min_basic_salary = $param['min_basic_salary'];
        $project->min_net_salary = $param['min_net_salary'];
        $project->active = 1;
        $project->created_at = date('Y-m-d H:i:s');
        $project->updated_at = date('Y-m-d H:i:s');
        $project->save();

        $this->handleUpload($project);

        return $this->exe->redirect->admin('projects');
    }

    protected function handleUpload(Project $project)
    {
        $request = $this->exe->request;

        $files = $request->getUploadedFiles();

        $uploadBasePath = $this->exe->path['public']->path('apps/images');

        $firstImage = null;

        /** @var UploadedFile $file */
        foreach($files['project_image'] as $file)
        {
            if($file->getError())
                continue;

            $uploadedName = $file->getName();
            $uploadedName = explode('.', $uploadedName);
            $ext = array_pop($uploadedName);

            $filename = bin2hex(openssl_random_pseudo_bytes(8)).'.'.$ext;

            $filepath = $uploadBasePath->to($filename);

            $file->moveTo($filepath);

            $image = new Image;
            $image->path = $filename;
            $image->save();

            $projectImage = $project->addImage($image);

            if(!$project->main_image_path)
                $project->setMainImage($projectImage)->save();
        }
    }

    public function getEdit()
    {
        $id = $this->exe->request->param('id');

        $project = Project::find($id);

        $form = $this->exe->form;

        $form->set(array(
            'name' => $project->name,
            'description' => $project->description,
            'min_basic_salary' => $project->min_basic_salary,
            'min_net_salary' => $project->min_net_salary
        ));

        return $this->render('projects/edit', array(
            'project' => $project
        ));
    }

    public function postEdit()
    {
        $params = $this->exe->request->getParams();

        $id = $this->exe->request->param('id');

        $project = Project::find($id);

        $project->name = $params['name'];
        $project->min_basic_salary = $params['min_basic_salary'];
        $project->min_net_salary = $params['min_net_salary'];
        $project->description = $params['description'];
        $project->save();

        $this->handleUpload($project);

        return $this->exe->redirect->previous();
    }

    public function getDelete()
    {
        $id = $this->exe->request->param('id');

        /** @var Project $project */
        $project = Project::find($id);

        $project->delete();

        return $this->exe->redirect->admin('projects');
    }

    public function xpostDeleteImage()
    {
        $projectImageId = $this->exe->request->param('id');

        /** @var ProjectImage $projectImage */
        $projectImage = ProjectImage::find($projectImageId);

        $projectImage->image->delete();

        $projectImage->delete();
    }
}
