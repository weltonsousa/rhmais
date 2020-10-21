<?php

namespace App\Http\Controllers;

use App\User;
<<<<<<< HEAD
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Message;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->paginate(5);
        return view('user_sistema.index', compact('users', $users));
    }

    public function create()
    {
        return view('user_sistema.create');
    }

    public function store(Request $request, User $users)
    {

        if (request('id') == 0) {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);
            DB::beginTransaction();
            $user = User::create([
                "name" => request('name'),
                "email" => request('email'),
                "password" => bcrypt(request('password')),
            ]);
            DB::commit();
        } else {

            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);
            DB::beginTransaction();
            $user = User::whereId(request('id'))->firstOrFail();
            if ($user) {
                $user->name = request('name');
                $user->email = request('email');
                $user->password = bcrypt(request('password'));
                $user->save();
            }
            DB::commit();
        }
        return redirect()->route('user_sistema.index');
    }

    public function show(User $users)
    {
        return view('user_sistema.show', compact('users', $users));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user_sistema.edit', compact('users', $users));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $users = User::find($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->save();

        $request->session()->flash('success', 'Atualizado com sucesso!');
        return redirect('user_sistema');
    }

    public function destroy(Request $request)
    {

        $message = "";
        try {
            DB::table('users')->where('id', $request->_id)->delete();

            $message = 'usuário excluído com sucesso';
        } catch (\Exception $e) {
            DB::rollback();
            $message = $e->getMessage();
        }
        Flash::success('Usuário deletado com sucesso.');
        return redirect(route('user_sistema.index'));
        return $this->index()->with(['success' => $message, 'users' => User::all()]);
=======
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
>>>>>>> 2215e0e2d723ef7c81cf215bf832dbb425588a3c
    }
}
