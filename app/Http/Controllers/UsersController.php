<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);

        return view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);

        if (!$user) {
            return back();
        }

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $request->only(['name', 'email']);

        try {
            $user = User::find($id);
            $user->update($data);
        } catch (Exception $e) {
            return back()->with('status', __('message.create_fail'));
        }

        return redirect('admin.users')->with('status', __('message.create_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
        try {
            $user = User::find($id);
            $user->delete();
            $result = [
                'status' => true,
                'msg' => __('message.delete_success'),
            ];
        } catch (Exception $e) {
            $result = [
                'status' => false,
                'msg' => __('message.delete_fail'),
            ];
        }

        return response()->json($result);
    }
}
