<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use League\Config\Exception\ValidationException;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $user = User::select(['id', 'name', 'role', 'email', 'active', 'profile_photo_path'])
                ->selectRaw('IF(active = 1, "Yes", "No") as active_str');

            // filter
            if (isset($request->filter)) {
                $filter = $request->filter;
                if ($filter['active'] != '') {
                    $user->where('active', '=', $filter['active']);
                }
                if ($filter['role'] != '') {
                    $user->where('role',  '=', $filter['role']);
                }
            }

            return Datatables::of($user)
                ->addIndexColumn()
                ->addColumn('role_str', function (User $user) {
                    return ucfirst(implode(' ', explode('_', $user->role)));
                })
                ->make(true);
        }

        $page_attr = [
            'title' => 'View User',
            'breadcrumbs' => [
                ['name' => 'Manage User'],
            ],
            'navigation' => 'user.view',
        ];
        $user_role = User::getAllRole();
        return view('admin.user', compact('page_attr', 'user_role'));
    }

    public function store(Request $request)
    {

        try {
            $user_role = implode(",", User::getAllRole());
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'role' => ['required', 'string', 'in:' . $user_role],
                'active' => ['required', 'int', 'in:1,0'],
                'password' => ['required', 'string', new Password]
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'active' => $request->active,
                'password' => Hash::make($request->password),
            ]);
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $user_role = implode(",", User::getAllRole());
            $user = User::find($request->id);
            $request->validate([
                'id' => ['required', 'int'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'role' => ['required', 'string', 'in:' . $user_role],
                'active' => ['required', 'int', 'in:1,0'],
                'password' => $request->password ? ['required', 'string', new Password] : ''
            ]);

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->active = $request->active;

            $user->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function delete(Request $user)
    {
        try {
            $user = User::find($user->id);
            $user->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
