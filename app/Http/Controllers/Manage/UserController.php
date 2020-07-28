<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = [
            'name' => 'required|min:3|max:191',
            'email' => 'required|min:3|max:191|unique:users,email',
            'role' => 'required',
        ];

        if (!empty($request->password)) {
            $valid['password'] = 'required|min:6|max:191';
        }

        $password = !empty($request->password) ? $password : 'password';
        $request->merge(['password' => Hash::make($password)]);

        $request->validate($valid);

        $user = User::create($request->all());

        return redirect()->route('manage.users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('manage.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = [
            'name' => 'required|min:3|max:191',
            'email' => 'required|min:3|max:191|unique:users,email,' . $id,
            'role' => 'required',
        ];

        if (!empty($request->password)) {
            $valid['password'] = 'required|min:6|max:191';
            $request->merge(['password' => Hash::make($request->password)]);
        } else {
            $request->replace($request->except('password'));
        }

        $request->validate($valid);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('manage.users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage.users.index');
    }
}
