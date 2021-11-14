<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('group')->get();
        // $users = User::all();
        return view()->exists('users.index') ? view('users.index', compact('users')) : abort(404); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        // Group model e static function call kore ekhane use korchi
        // $groups = Group::selectGroup();

        return view()->exists('users.create') ? view('users.create', compact('groups')) : abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = [
            'group_id' => $request->group_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $result = User::create($data);

        if($result){
            $this->setNotification('Data Save Successfully!', 'success');
            return redirect()->route('user.index');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $groups = Group::all();
        return view()->exists('users.edit') ? view('users.edit', compact(['user', 'groups'])) : abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user = User::findOrFail($id);

        $result = $user->update([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if($result){
            $this->setNotification('Data Update Successfully!', 'success');
            return redirect()->route('user.index');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user = User::findOrFail($id);
        if($user->delete()){
            $this->setNotification('Data Delete Successfully!', 'success');
            return redirect()->route('user.index');
        }else{
            return back();
        }
    }
}
