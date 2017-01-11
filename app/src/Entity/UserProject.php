<?php
namespace App\Entity;

class UserProject extends BaseEntity
{
    protected $table = 'user_project';

    public function relateProject()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}