<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'username' => 'required',
            'email' => 'sometimes|email',
            'phone_number' => 'sometimes',
            'status' => 'sometimes|boolean',
            'address' => 'sometimes',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        $user->status = $request->status;
        $user->password = Hash::make(Str::random(12));
        $user->address = $request->address;
        $user->user_id = $request->user()->id;
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
    public function update(Request $request, $userId)
    {

        $this->validate($request, [
            'first_name' => 'sometimes',
            'last_name' => 'sometimes',
            'email' => 'sometimes',
            'username' => 'sometimes',
            'phone_number' => 'sometimes',
            'status' => 'sometimes|boolean',
            'address' => 'sometimes',
        ]);

        $user = User::find($userId);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        flash("{$user->first_name} updated.")->success();

        return redirect()->route('users.index');
    }

    /**
     * Show Edit location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userProfile(Request $request)
    {
        $userId = $request->user();

        $user = User::findorfail($userId->id);

        return view('users.profile',[
            'user' => $user
        ]);
    }

                    /**
     * Show Edit location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => 'required_with:new_password',
            'new_password' => 'sometimes|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = $request->user();

        if ($request->filled('new_password')) {
            if (strcasecmp($user->password, md5($request->current_password)) != 0) {
                return response()->json(['error' => ['current_password' => ['Incorrect password']]], 422);
            }
        }

        $data = [
            'update_at' => date('Y-m-d H:i:s'),
        ];

        if ($request->filled('new_password')) {
            $data['password'] = md5($request->new_password);
        }

        $route = Route::findorfail($routeId);

        User::where('id','=',$user->id)
        ->update($data);

        // flash("{$route->name} created.")->success();

        return redirect()->route('users.profile.index');
    }

    /**
     * Delete location type.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy($userId)
    {

        $user = User::where('id', $userId)
                    ->delete();

        flash("{$user->first_name} deleted.")->success();

        return redirect()->route('users.index');
    }


}
