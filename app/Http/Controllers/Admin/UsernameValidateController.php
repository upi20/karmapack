<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Models\UsernameValidation;

class UsernameValidateController extends Controller
{
    public function index(Request $request)
    {
        $rules = UsernameValidation::all();
        $page_attr = [
            'title' => 'Manage Username Validation',
            'breadcrumbs' => [
                ['name' => 'Dashboard'],
            ]
        ];
        return view('admin.username_validation', compact('page_attr', 'rules'));
    }

    public function save(Request $request)
    {
        try {
            $rules = $request->rules;
            UsernameValidation::truncate();

            $rule_insert = [];
            foreach ($rules as $rule) $rule_insert[] = ['rule' => $rule];
            UsernameValidation::insert($rule_insert);

            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }

    public function select2(Request $request)
    {
        try {
            return response()->json([
                'results' =>
                [['id' => $request->search, 'text' => $request->search]]
            ]);
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
