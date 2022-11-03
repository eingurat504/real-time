<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
         /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();

        return view('users.index',[
            'users' => $users
        ]);
    }

         /**
     * Show user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($userId)
    {
        $user = User::findorfail($userId);

        return view('users.show',[
            'user' => $user
        ]);
    }

            /**
     * Show Edit location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, $userId)
    {
        $user = User::findorfail($userId);

        return view('users.edit',[
            'user' => $user
        ]);
    }

        /**
     * Show create location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {

        return view('users.create');
    }

            /**
     * Store location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'sometimes',
            'phone_number' => 'sometimes',
            'status' => 'sometimes|boolean',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->status = $request->status;
        $user->password = Hash::make('12345678');
        $user->created_at = date('Y-m-d H:i:s');
        // $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        flash("{$user->first_name} created.")->success();

        return redirect()->route('users.index');
    }


    /**
     * Update location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $typeId)
    {

        $this->validate($request, [
            'name' => 'sometimes',
            'address' => 'sometimes',
        ]);

        $type = User::where('id', $typeId)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            // 'updated_by' => $user->c_user_rid,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // flash("{$route->name} updated.")->success();

        return redirect()->route('users.index');
    }

    /**
     * Delete location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy($typeId)
    {

        $type = User::where('id', $typeId)
                    ->delete();

        // flash("{$route->name} updated.")->success();

        return redirect()->route('users.index');
    }


}
