<?php
namespace App\Entity;

use Carbon\Carbon;
use Laraquent\Base;

/**
 * Class BaseEntity
 * @package App\Entity
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class BaseEntity extends Base
{
    public $timestamps = true;
}


