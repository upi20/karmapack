<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $total_anggota = User::count();
        $page_attr = ['title' => 'Dashboard'];
        return view('admin.dashboard', compact(
            'total_anggota',
            'page_attr',
        ));
    }
}
