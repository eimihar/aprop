<?php
namespace App\Entity;

class User extends BaseEntity
{
    protected $table = 'user';

    /**
     * @param string $email
     * @param string $phone_no
     */
    public static function findSimilar($email, $phoneNo)
    {
        $phoneNo = str_replace('-', '', $phoneNo);

        $len = strlen($phoneNo);

        // take phone last 8
        $phoneNo = substr($phoneNo, $len - 10, 10);

        $query = static::where('email', '=', $email)
            ->orWhere('phone_no', 'like', $phoneNo.'%')
            ->get()->first();

        return $query;
    }

    public function relateProjects()
    {
        return $this->hasMany(UserProject::class, 'user_id', 'id');
    }
}