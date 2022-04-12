<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Address
{

    public function index()
    {
        $class = "AddressDistricts";
        $name_db = "districts";
        $this->generate($class, $name_db);
    }

    private function generate($class, $name_db)
    {



        $address = $this->db->get("address_$name_db")->result_array();
        $addres_count = count($address);
        $path = APPPATH . "..\\$name_db.php";
        if (file_exists($path)) {
            unlink($path);
        }
        $txt = '';


        $myfile = fopen($path, "a") or die("Unable to open file!");
        fwrite($myfile, $txt);
        $count = 0;


        $a = ceil($addres_count / 100);
        $precentace_count = 1;
        $next_stop = $a;

        $function = '';
        $function_call = '';

        $inserts = '';
        foreach ($address as $addres) {
            $element = '';
            $c = 1;
            foreach ($addres as $k => $v) {
                $val = str_replace("'", "\'", $v);

                if ($c == 1) {
                    $element .= "\t\t\t['$k' => '$val', ";
                } else if ($c == count($addres)) {
                    $element .= " '$k' => '$val'],\n";
                } else {
                    $element .= "'$k' => '$val',";
                }
                $c++;
            }
            $inserts .= $element;

            if ($count == $next_stop) {
                $function_call .= '
		self::import_' . $precentace_count . '();';
                $function .= "
	public static function import_$precentace_count(){
		echo 'Import address $name_db: $precentace_count%'.PHP_EOL;
		$class::insert([
$inserts
		]);


	}
";

                $precentace_count++;
                $next_stop = $a * $precentace_count;
                $inserts = '';
            }


            // fungsi penutup ==================================================================================
            $count++;
            if (($count == $addres_count) && $inserts) {
                $precentace_count = 100;
                $function_call .= '
		self::import_' . $precentace_count . '();';

                $function .= "
	public static function import_$precentace_count(){
		echo 'Import address $name_db: $precentace_count%\\n';
		$class::insert([
$inserts
		]);


	}
";
            }
        }



        $txt = "
<?php

namespace Database\Seeders;

use App\Models\\{$class};
use Illuminate\Database\Seeder;

class {$class}Seeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public static function run()
	{
		$function_call
	}

	$function
}
		";
        fwrite($myfile, $txt);
        fclose($myfile);

        print('oke');
    }
}
