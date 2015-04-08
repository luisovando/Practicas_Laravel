<?php namespace Course\Http\Controllers;

use Course\Entities\UserProfile;
use Course\Http\Requests\CreateUserProfileRequest;
use Course\Repositories\ProfileRepo;
use Illuminate\Support\Facades\Request;

class ProfilesController extends Controller
{

    /**
     * @var ProfileRepo
     */
    protected $profile_repo;

    public function __construct(ProfileRepo $profile_repo)
    {
        $this->profile_repo = $profile_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $users = $this->profile_repo->getUsersWithoutProfileList();
        return view('user.profiles.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\CreateUserProfileRequest|CreateUserProfileRequest $request
     * @return Response
     */
    public function store(CreateUserProfileRequest $request)
    {
        $result = $this->profile_repo->saveNewProfile($request->all());
        if($result){
            return \Redirect::route('admin.users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $profile = UserProfile::findOrFail($id);
        $users = $this->profile_repo->getAllUsers();
        $user = $this->profile_repo->getUserByProfileId($id);
        return view('user.profiles.edit', compact('profile','users', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $profile = UserProfile::findOrFail($id);
        $profile->fill(Request::all());
        $profile->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
