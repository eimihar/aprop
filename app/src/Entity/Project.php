<?php
namespace App\Entity;

class Project extends BaseEntity
{
    public $timestamps = true;

    protected $table = 'project';

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

    public function relateImages()
    {
        return $this->hasMany(ProjectImage::class, 'project_id', 'id');
    }
}