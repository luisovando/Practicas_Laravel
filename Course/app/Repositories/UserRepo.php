<?php namespace Course\Repositories;
use Course\Entities\User;

/**
 * Created by PhpStorm.
 * User: Desarrollo Dell
 * Date: 01/04/2015
 * Time: 01:36 PM
 */

class UserRepo extends BaseRepo {

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}