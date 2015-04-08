<?php namespace Course\Http\Controllers\Admin;
use Course\Http\Controllers\Controller;

use Course\Entities\User;
use Course\Http\Requests\CreateUserRequest;
use Course\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

    private $user;

    public function __construct()
    {
        $this->beforeFilter('@findUser', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    public function findUser(Route $route)
    {
        $this->user = User::findOrFail($route->getParameter('users'));
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('id', 'DESC')->paginate(5);
		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest|Request $request
     * @return Response
     */
	public function store(CreateUserRequest $request)
	{
		$user = User::create($request->all());
		return \Redirect::route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.users.edit')->with('user', $this->user);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest $request
     * @param  int $id
     * @return Response
     */
	public function update(EditUserRequest $request, $id)
	{
		$this->user->fill($request->all());
		$this->user->save();
		return redirect()->route('admin.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->user->delete();
        Session::flash('message', $this->user->full_name . ' fue eliminado.');
		return redirect()->route('admin.users.index');
	}

}
