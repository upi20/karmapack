<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\Message;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return Message::datatable($request);
        }
        $page_attr = adminBreadcumb(h_prefix());
        $setting = (object)[
            'title' => setting_get('setting.contact.message.title'),
            'sub_title' => setting_get('setting.contact.message.sub_title'),
            'name' => setting_get('setting.contact.message.name'),
            'name_placeholder' => setting_get('setting.contact.message.name_placeholder'),
            'email' => setting_get('setting.contact.message.email'),
            'email_placeholder' => setting_get('setting.contact.message.email_placeholder'),
            'message' => setting_get('setting.contact.message.message'),
            'message_placeholder' => setting_get('setting.contact.message.message_placeholder'),
            'button_text' => setting_get('setting.contact.message.button_text'),
        ];

        $view = path_view('pages.admin.kontak.message');
        $data = compact('page_attr', 'setting', 'view');
        $data['compact'] = $data;
        return view($view, $data);
    }

    public function setting(Request $request)
    {
        setting_set('setting.contact.message.title', $request->title);
        setting_set('setting.contact.message.sub_title', $request->sub_title);

        setting_set('setting.contact.message.name', $request->name);
        setting_set('setting.contact.message.name_placeholder', $request->name_placeholder);
        setting_set('setting.contact.message.email', $request->email);
        setting_set('setting.contact.message.email_placeholder', $request->email_placeholder);
        setting_set('setting.contact.message.message', $request->message);
        setting_set('setting.contact.message.message_placeholder', $request->message_placeholder);

        setting_set('setting.contact.message.button_text', $request->button_text);
        return response()->json();
    }

    public function delete(Message $model): mixed
    {
        try {
            $model->delete();
            return response()->json();
        } catch (ValidationException $error) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 500);
        }
    }
}
