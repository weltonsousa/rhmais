<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('user_sistema.index', compact('users'));
    }

    public function create()
    {
        return view('user_sistema.create');
    }

    public function store(Request $request, User $users)
    {

        // if (request('id') == 0) {
        //     $this->validate(request(), [
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'password' => 'required|confirmed',
        //     ]);
        //     DB::beginTransaction();
        //     $user = User::create([
        //         "name" => request('name'),
        //         "email" => request('email'),
        //         "password" => bcrypt(request('password')),
        //     ]);
        //     DB::commit();
        // } else {

        //     $this->validate(request(), [
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'password' => 'required|confirmed',
        //     ]);
        //     DB::beginTransaction();
        //     $user = User::whereId(request('id'))->firstOrFail();
        //     if ($user) {
        //         $user->name = request('name');
        //         $user->email = request('email');
        //         $user->password = bcrypt(request('password'));
        //         $user->save();
        //     }
        //     DB::commit();
        // }
        // return redirect()->route('user_sistema.index');

        if ($request->has("e_id_user")) {
            $user = User::find($request->e_id_user);
            $user->name = $request->e_name;
            $user->email = $request->e_email;
            $user->password = bcrypt($request->e_password);

            $user->save();
            return "2";

        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return "1";
        }

    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
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

        // $message = "";
        // try {
        //     DB::table('users')->where('id', $request->_id)->delete();

        //     $message = 'usuário excluído com sucesso';
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     $message = $e->getMessage();
        // }
        // Flash::success('Usuário deletado com sucesso.');
        // return redirect(route('user_sistema.index'));
        // return $this->index()->with(['success' => $message, 'users' => User::all()]);

        // User::destroy($id);
        return "2";
    }

    public function carregarUser()
    {
        return User::all();
    }
}
