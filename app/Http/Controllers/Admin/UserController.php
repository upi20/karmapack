<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use League\Config\Exception\ValidationException;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $query = [];
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $year = (int)date('Y');
            $year_add_one = $year + 1;
            $this->query['birthday_countdown'] = <<<SQL
                ( if( DATEDIFF(date(concat('{$year}-', month(date_of_birth), '-', day(date_of_birth))), CURDATE()) < 0,
                    DATEDIFF(date(concat('{$year_add_one}-', month(date_of_birth), '-', day(date_of_birth))), CURDATE()) ,
                    DATEDIFF(date(concat('{$year}-', month(date_of_birth), '-', day(date_of_birth))), CURDATE()) )
                )
            SQL;
            $this->query['birthday_countdown_alias'] = 'birthday_countdown';

            $user = User::select(['id', 'name', 'role', 'email', 'active', 'profile_photo_path', 'date_of_birth', 'angkatan'])
                ->selectRaw('IF(active = 1, "Yes", "No") as active_str')
                ->selectRaw("{$this->query['birthday_countdown']} as {$this->query['birthday_countdown_alias']}");
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
                ->filterColumn($this->query['birthday_countdown_alias'], function ($query, $keyword) {
                    $query->whereRaw("{$this->query['birthday_countdown']} like '%$keyword%'");
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
                'date_of_birth' => ['required', 'date'],
                'angkatan' => ['required', 'int'],
                'active' => ['required', 'int', 'in:1,0'],
                'password' => ['required', 'string', new Password]
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'angkatan' => $request->angkatan,
                'role' => $request->role,
                'active' => $request->active,
                'password' => Hash::make($request->password),
                // // 'created_by' => auth()->user()->id,
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
                'date_of_birth' => ['required', 'date'],
                'angkatan' => ['required', 'int'],
                'active' => ['required', 'int', 'in:1,0'],
                'password' => $request->password ? ['required', 'string', new Password] : '',
                'updated_at' => auth()->user()->id,
            ]);

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->date_of_birth = $request->date_of_birth;
            $user->angkatan = $request->angkatan;
            $user->active = $request->active;
            // $model->updated_by = auth()->user()->id;

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

    public function select2_profesi(Request $request)
    {
        try {
            $model = User::selectRaw('profesi as text')
                ->whereRaw("(`profesi` like '%$request->search%')")
                ->distinct()
                ->limit(10);

            $results = $model->get()->toArray();

            $get = true;
            $filter = [];
            foreach ($results as $result) {
                if ($request->search == $result['text']) $get = false;
                $filter[] = [
                    'id' => $result['text'],
                    'text' => $result['text']
                ];
            }

            if ($get) {
                $results = array_merge([['id' => $request->search, 'text' => $request->search]], $filter);
            }

            return response()->json(['results' => $results]);
        } catch (\Exception $error) {
            return response()->json($error, 500);
        }
    }
}
