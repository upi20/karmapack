<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\Message as ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;


class MessageController extends Controller
{
    private $query = [];

    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatable($request);
        }
        $page_attr = [
            'title' => 'Message',
            'breadcrumbs' => [
                ['name' => 'Kontak'],
            ]
        ];
        $setting = (object)[
            'title' => settings()->get('setting.contact.message.title'),
            'sub_title' => settings()->get('setting.contact.message.sub_title'),
            'name' => settings()->get('setting.contact.message.name'),
            'name_placeholder' => settings()->get('setting.contact.message.name_placeholder'),
            'email' => settings()->get('setting.contact.message.email'),
            'email_placeholder' => settings()->get('setting.contact.message.email_placeholder'),
            'message' => settings()->get('setting.contact.message.message'),
            'message_placeholder' => settings()->get('setting.contact.message.message_placeholder'),
            'button_text' => settings()->get('setting.contact.message.button_text'),
        ];

        $data = compact('page_attr', 'setting');
        $data['compact'] = $data;
        return view('admin.kontak.message', $data);
    }

    public function datatable(Request $request): mixed
    {
        // list table
        $table = ContactMessage::tableName;

        // cusotm query
        // ========================================================================================================
        // creted at and updated at
        $date_format_fun = function (string $select, string $format, string $alias) use ($table): array {
            $str = <<<SQL
                (DATE_FORMAT($table.$select, '$format'))
            SQL;
            return [$alias => $str, ($alias . '_alias') => $alias];
        };

        $c_created = 'created';
        $c_created_str = 'created_str';
        $c_updated = 'updated';
        $c_updated_str = 'updated_str';
        $this->query = array_merge($this->query, $date_format_fun('created_at', '%d-%b-%Y', $c_created));
        $this->query = array_merge($this->query, $date_format_fun('created_at', '%W, %d %M %Y %H:%i:%s', $c_created_str));
        $this->query = array_merge($this->query, $date_format_fun('updated_at', '%d-%b-%Y', $c_updated));
        $this->query = array_merge($this->query, $date_format_fun('updated_at', '%W, %d %M %Y %H:%i:%s', $c_updated_str));

        // // type
        // $c_type_str = 'type_str';
        // $this->query[$c_type_str] = <<<SQL
        //         (if($table.type = 1, 'Teks', if($table.type = 2, 'Link', 'Tidak Diketahui')))
        // SQL;
        // $this->query["{$c_type_str}_alias"] = $c_type_str;

        // // status
        // $c_status_str = 'status_str';
        // $this->query[$c_status_str] = <<<SQL
        //         (if($table.status = 0, 'Tidak Digunakan', if($table.status = 1, 'Digunakan', 'Tidak Diketahui')))
        // SQL;
        // $this->query["{$c_status_str}_alias"] = $c_status_str;
        // ========================================================================================================


        // ========================================================================================================
        // select raw as alias
        $sraa = function (string $col): string {
            return $this->query[$col] . ' as ' . $this->query[$col . '_alias'];
        };
        $model_filter = [
            $c_created,
            $c_created_str,
            $c_updated,
            $c_updated_str,
            // $c_status_str,
            // $c_type_str,
        ];

        $to_db_raw = array_map(function ($a) use ($sraa) {
            return DB::raw($sraa($a));
        }, $model_filter);
        // ========================================================================================================


        // Select =====================================================================================================
        $model = ContactMessage::select(array_merge([
            DB::raw("$table.*"),
        ], $to_db_raw));

        // Filter =====================================================================================================
        // filter check
        $f_c = function (string $param) use ($request): mixed {
            $filter = $request->filter;
            return isset($filter[$param]) ? $filter[$param] : false;
        };


        // filter ini menurut data model filter
        // $f = [$c_user];
        // // loop filter
        // foreach ($f as $v) {
        //     if ($f_c($v)) {
        //         $model->whereRaw("{$this->query[$v]}='{$f_c($v)}'");
        //     }
        // }

        // filter custom
        $filters = ['status'];
        foreach ($filters as  $f) {
            if ($f_c($f) !== false) {
                $model->whereRaw("$table.$f='{$f_c($f)}'");
            }
        }
        // ========================================================================================================


        // ========================================================================================================
        $datatable = Datatables::of($model)->addIndexColumn();
        foreach ($model_filter as $v) {
            // custom pencarian
            $datatable->filterColumn($this->query["{$v}_alias"], function ($query, $keyword) use ($v) {
                $query->whereRaw("({$this->query[$v]} like '%$keyword%')");
            });
        }

        // create datatable
        return $datatable->make(true);
    }

    public function setting(Request $request)
    {
        settings()->set('setting.contact.message.title', $request->title)->save();
        settings()->set('setting.contact.message.sub_title', $request->sub_title)->save();

        settings()->set('setting.contact.message.name', $request->name)->save();
        settings()->set('setting.contact.message.name_placeholder', $request->name_placeholder)->save();
        settings()->set('setting.contact.message.email', $request->email)->save();
        settings()->set('setting.contact.message.email_placeholder', $request->email_placeholder)->save();
        settings()->set('setting.contact.message.message', $request->message)->save();
        settings()->set('setting.contact.message.message_placeholder', $request->message_placeholder)->save();

        settings()->set('setting.contact.message.button_text', $request->button_text)->save();
        return response()->json();
    }
}
