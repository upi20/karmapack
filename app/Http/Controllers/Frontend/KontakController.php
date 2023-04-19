<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact\FAQ;
use App\Models\Contact\ListContact;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;
use App\Models\Contact\Message as ContactMessage;

class KontakController extends Controller
{
    private $validate_model = [
        'nama' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255', 'email'],
        'message' => ['required', 'string'],
    ];

    public function index(Request $request)
    {
        $page_attr = [
            'title' => 'Kontak',
        ];

        $contacts = ListContact::where('status', '=', 1)->get();
        $faqs = FAQ::where('status', '=', 1)->get();

        $data = compact('page_attr', 'contacts', 'faqs');
        $data['compact'] = $data;
        return view('pages.frontend.kontak', $data);
    }

    public function faq(Request $request)
    {
        $page_attr = [
            'title' => 'FAQ',
        ];

        $faqs = FAQ::where('status', '=', 1)->get();
        $data = compact('page_attr', 'faqs');
        $data['compact'] = $data;
        return view('pages.frontend.faq', $data);
    }

    public function insert(Request $request): mixed
    {
        try {
            $request->validate($this->validate_model);

            $model = new ContactMessage();
            $model->nama = $request->nama;
            $model->email = $request->email;
            $model->message = $request->message;
            $model->save();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
