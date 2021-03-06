<?php
namespace App\Entity;

class Project extends BaseEntity
{
    public $timestamps = true;

    protected $table = 'project';

    /**
     * @param User $user
     * @return mixed
     */
    public static function findByUserPreferences(User $user)
    {
        $netSalary = $user->net_salary;
        $basicSalary = $user->basic_salary;

        $projects = static::where('min_net_salary', '<=', $netSalary)
            ->where('min_basic_salary', '<=', $basicSalary)
            ->where('active', '=', 1)
            ->where('sector', '=', $user->sector)
            ->get();

        return $projects;
    }

    public function getEllipsedDescription()
    {
        return substr($this->description, 0, 300);
    }

    public function getMainImageUrl()
    {
        return '/apps/images/' . $this->main_image_path;
    }

    /**
     * @param Image $image
     * @return ProjectImage
     */
    public function addImage(Image $image)
    {
        $projectImage = new ProjectImage;
        $projectImage->image_id = $image->id;
        $projectImage->path = $image->path;
        $projectImage->project_id = $this->id;
        $projectImage->save();

        return $projectImage;
    }

    public function setMainImage(ProjectImage $projectImage)
    {
        $this->main_image_path = $projectImage->path;

        return $this;
    }

    public function getDisplayLabel()
    {
        $state = \App\Helper\Helper::getStates()[$this->state] ? : '';

        return $this->name . ($state ? ', '.$state : '');
    }

    public function relateImages()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }

    public function delete()
    {
        $this->active = 2;
        $this->save();
    }
}