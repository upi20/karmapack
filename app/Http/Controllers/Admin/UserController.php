<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\Admin\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->repository->datatable($request);
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
        return $this->repository->store($request);
    }

    public function update(Request $request)
    {
        return $this->repository->update($request);
    }

    public function delete(Request $user)
    {
        return $this->repository->delete($user);
    }

    public function change_password(Request $request)
    {
        $page_attr = [
            'title' => 'Ganti Password',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ],
        ];
        $user_role = User::getAllRole();
        return view('admin.change_password', compact('page_attr', 'user_role'));
    }

    public function save_password(Request $request)
    {
        return $this->repository->save_password($request);
    }

    public function excel(Request $request)
    {
        return $this->repository->excel($request);
    }
}
