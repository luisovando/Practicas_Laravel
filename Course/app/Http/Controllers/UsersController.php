<?php namespace Course\Http\Controllers;

use Course\Entities\User;

class UsersController extends Controller{
    public function getOrm()
    {
        $users = User::select('id', 'first_name')
            ->with('profile')
            ->where('first_name','<>', 'Luis')
            ->orderBy('first_name','ASC')
            ->get();
        dd($users);
    }

    public function getClients(){
        /*$users = User::find(23);
        $client = $users->clients->first();
        dd($client->company->company_name);*/

        $users = User::select('id', 'first_name', 'email')
            ->with('clients')
            ->orderBy('id', 'ASC')
            ->get();

        $users->each(function($user){
           $user->clients->each(function($client){
              var_dump($client->company->company_name);
           });
        });
    }

    public function getIndex()
    {
        $users = \DB::table('users')
            ->select([
                'users.*',
                'user_profiles.id as profile_id',
                'user_profiles.twitter'
            ])
            ->orderBy('id', 'ASC')
            ->leftJoin('user_profiles', 'users.id', "=", 'user_profiles.user_id')
            ->get();
        return view('example_one.fcontroller', ['users' => $users]);
    }

    public function getType($type = null)
    {
        if (is_null($type)) {
            $result = \DB::table('users')->select('users.*')->get();
        } else {
            $result = \DB::table('users')
                ->select('users.*')
                ->where('users.type', $type)
                ->get();
        }
        dd($result);
        return $result;
    }

    public function printNameEmail()
    {
        $result = \DB::table('users')
            ->select(['first_name', 'email'])
            ->orderBy('first_name', 'ASC')
            ->get();
        dd($result);
        return $result;
    }

    public function showUser($id)
    {
        $result = \DB::table('users')
            ->select('users.*')
            ->where('id', $id)
            ->get();
        dd($result);
        return $result;
    }

    public function getGender($gender = null)
    {
        if (is_null($gender)) {
            $result = \DB::table('users')
                ->select('users.*')
                ->orderBy('first_name', 'ASC')
                ->get();
        } else {
            $result = \DB::table('users')
                ->select('users.*')
                ->where('gender', $gender)
                ->orderBy('first_name', 'ASC')
                ->get();
        }
        dd($result);
        return $result;
    }

    public function getUserActiveEmail()
    {
        $result = \DB::table('users')
            ->select('email')
            ->where('active', 1)
            ->get();
        dd($result);
        return $result;
    }

    public function getAdultUsers()
    {
        $result = \DB::table('users')
            ->select('users.*')
            ->whereRaw(\DB::raw('(YEAR(CURDATE()) - YEAR(users.birthdate) + IF(DATE_FORMAT(CURDATE(), "%m -%d") > DATE_FORMAT(users.birthdate, "%m -%d"), 0, -1) >= 18)'))
            ->get();
        dd($result);
        return $result;
    }
}