<?php namespace Course\Repositories;

use Course\Entities\User;
use Course\Entities\UserProfile;

class ProfileRepo extends BaseRepo{
    /**
     * @var User
     */
    protected $user;
    /**
     * @var UserProfile
     */
    protected $user_profile;

    /**
     * @param User $user
     * @param UserProfile $user_profile
     */
    public function __construct(User $user, UserProfile $user_profile)
    {
        $this->user = $user;
        $this->user_profile = $user_profile;
    }

    /**
     * @return array
     */
    public function getUsersWithoutProfileList(){
        $users_without_profile = array();
        $users = $this->user->select(['users.id', 'first_name', 'last_name'])
            ->leftJoin('user_profiles', 'users.id', "=",
                'user_profiles.user_id')
            ->whereNull('user_profiles.user_id')
            ->get();

        $users->each(function($user) use (&$users_without_profile){
            $users_without_profile[$user->id] = $user->full_name;
        });

        return $users_without_profile;
    }

    public function getAllUsers(){
        $all_users = array();
        $users = $this->user->select(['users.id', 'first_name', 'last_name'])->get();
        $users->each(function($user) use (&$all_users){
            $all_users[$user->id] = $user->full_name;
        });
        return $all_users;
    }

    public function getUserByProfileId($id){
        $user = User::select(['users.*', 'user_profiles.id as profile_id'])
            ->leftJoin('user_profiles', 'users.id', "=",
            'user_profiles.user_id')
            ->where('user_profiles.id',$id)
            ->get();
        return $user->first();
    }

    public function saveNewProfile($data){
        $profile = new UserProfile($data);
        $profile->save();
        if(empty($profile->id)){
            return false;
        }else{
            return true;
        }
    }
}