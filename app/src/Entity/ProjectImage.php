<?php
namespace App\Entity;

class ProjectImage extends BaseEntity
{
    protected $table = 'project_image';

    public function relateImage()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}