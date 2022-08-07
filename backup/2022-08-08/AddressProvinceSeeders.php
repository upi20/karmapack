<?php

namespace Database\Seeders;

use App\Models\Address\Province;
use Illuminate\Database\Seeder;

class AddressProvinceSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {

        self::import_1();
        self::import_2();
        self::import_3();
        self::import_4();
        self::import_5();
        self::import_6();
        self::import_7();
        self::import_8();
        self::import_9();
        self::import_10();
        self::import_11();
        self::import_12();
        self::import_13();
        self::import_14();
        self::import_15();
        self::import_16();
        self::import_17();
        self::import_18();
        self::import_19();
        self::import_20();
        self::import_21();
        self::import_22();
        self::import_23();
        self::import_24();
        self::import_25();
        self::import_26();
        self::import_27();
        self::import_28();
        self::import_29();
        self::import_30();
        self::import_31();
        self::import_32();
        self::import_33();
    }


    public static function import_1()
    {
        echo 'Import address provinces: 1%' . PHP_EOL;
        Province::insert([
            ['id' => '11',  'name' => 'ACEH'],
            ['id' => '12',  'name' => 'SUMATERA UTARA'],

        ]);
    }

    public static function import_2()
    {
        echo 'Import address provinces: 2%' . PHP_EOL;
        Province::insert([
            ['id' => '13',  'name' => 'SUMATERA BARAT'],

        ]);
    }

    public static function import_3()
    {
        echo 'Import address provinces: 3%' . PHP_EOL;
        Province::insert([
            ['id' => '14',  'name' => 'RIAU'],

        ]);
    }

    public static function import_4()
    {
        echo 'Import address provinces: 4%' . PHP_EOL;
        Province::insert([
            ['id' => '15',  'name' => 'JAMBI'],

        ]);
    }

    public static function import_5()
    {
        echo 'Import address provinces: 5%' . PHP_EOL;
        Province::insert([
            ['id' => '16',  'name' => 'SUMATERA SELATAN'],

        ]);
    }

    public static function import_6()
    {
        echo 'Import address provinces: 6%' . PHP_EOL;
        Province::insert([
            ['id' => '17',  'name' => 'BENGKULU'],

        ]);
    }

    public static function import_7()
    {
        echo 'Import address provinces: 7%' . PHP_EOL;
        Province::insert([
            ['id' => '18',  'name' => 'LAMPUNG'],

        ]);
    }

    public static function import_8()
    {
        echo 'Import address provinces: 8%' . PHP_EOL;
        Province::insert([
            ['id' => '19',  'name' => 'KEPULAUAN BANGKA BELITUNG'],

        ]);
    }

    public static function import_9()
    {
        echo 'Import address provinces: 9%' . PHP_EOL;
        Province::insert([
            ['id' => '21',  'name' => 'KEPULAUAN RIAU'],

        ]);
    }

    public static function import_10()
    {
        echo 'Import address provinces: 10%' . PHP_EOL;
        Province::insert([
            ['id' => '31',  'name' => 'DKI JAKARTA'],

        ]);
    }

    public static function import_11()
    {
        echo 'Import address provinces: 11%' . PHP_EOL;
        Province::insert([
            ['id' => '32',  'name' => 'JAWA BARAT'],

        ]);
    }

    public static function import_12()
    {
        echo 'Import address provinces: 12%' . PHP_EOL;
        Province::insert([
            ['id' => '33',  'name' => 'JAWA TENGAH'],

        ]);
    }

    public static function import_13()
    {
        echo 'Import address provinces: 13%' . PHP_EOL;
        Province::insert([
            ['id' => '34',  'name' => 'DI YOGYAKARTA'],

        ]);
    }

    public static function import_14()
    {
        echo 'Import address provinces: 14%' . PHP_EOL;
        Province::insert([
            ['id' => '35',  'name' => 'JAWA TIMUR'],

        ]);
    }

    public static function import_15()
    {
        echo 'Import address provinces: 15%' . PHP_EOL;
        Province::insert([
            ['id' => '36',  'name' => 'BANTEN'],

        ]);
    }

    public static function import_16()
    {
        echo 'Import address provinces: 16%' . PHP_EOL;
        Province::insert([
            ['id' => '51',  'name' => 'BALI'],

        ]);
    }

    public static function import_17()
    {
        echo 'Import address provinces: 17%' . PHP_EOL;
        Province::insert([
            ['id' => '52',  'name' => 'NUSA TENGGARA BARAT'],

        ]);
    }

    public static function import_18()
    {
        echo 'Import address provinces: 18%' . PHP_EOL;
        Province::insert([
            ['id' => '53',  'name' => 'NUSA TENGGARA TIMUR'],

        ]);
    }

    public static function import_19()
    {
        echo 'Import address provinces: 19%' . PHP_EOL;
        Province::insert([
            ['id' => '61',  'name' => 'KALIMANTAN BARAT'],

        ]);
    }

    public static function import_20()
    {
        echo 'Import address provinces: 20%' . PHP_EOL;
        Province::insert([
            ['id' => '62',  'name' => 'KALIMANTAN TENGAH'],

        ]);
    }

    public static function import_21()
    {
        echo 'Import address provinces: 21%' . PHP_EOL;
        Province::insert([
            ['id' => '63',  'name' => 'KALIMANTAN SELATAN'],

        ]);
    }

    public static function import_22()
    {
        echo 'Import address provinces: 22%' . PHP_EOL;
        Province::insert([
            ['id' => '64',  'name' => 'KALIMANTAN TIMUR'],

        ]);
    }

    public static function import_23()
    {
        echo 'Import address provinces: 23%' . PHP_EOL;
        Province::insert([
            ['id' => '65',  'name' => 'KALIMANTAN UTARA'],

        ]);
    }

    public static function import_24()
    {
        echo 'Import address provinces: 24%' . PHP_EOL;
        Province::insert([
            ['id' => '71',  'name' => 'SULAWESI UTARA'],

        ]);
    }

    public static function import_25()
    {
        echo 'Import address provinces: 25%' . PHP_EOL;
        Province::insert([
            ['id' => '72',  'name' => 'SULAWESI TENGAH'],

        ]);
    }

    public static function import_26()
    {
        echo 'Import address provinces: 26%' . PHP_EOL;
        Province::insert([
            ['id' => '73',  'name' => 'SULAWESI SELATAN'],

        ]);
    }

    public static function import_27()
    {
        echo 'Import address provinces: 27%' . PHP_EOL;
        Province::insert([
            ['id' => '74',  'name' => 'SULAWESI TENGGARA'],

        ]);
    }

    public static function import_28()
    {
        echo 'Import address provinces: 28%' . PHP_EOL;
        Province::insert([
            ['id' => '75',  'name' => 'GORONTALO'],

        ]);
    }

    public static function import_29()
    {
        echo 'Import address provinces: 29%' . PHP_EOL;
        Province::insert([
            ['id' => '76',  'name' => 'SULAWESI BARAT'],

        ]);
    }

    public static function import_30()
    {
        echo 'Import address provinces: 30%' . PHP_EOL;
        Province::insert([
            ['id' => '81',  'name' => 'MALUKU'],

        ]);
    }

    public static function import_31()
    {
        echo 'Import address provinces: 31%' . PHP_EOL;
        Province::insert([
            ['id' => '82',  'name' => 'MALUKU UTARA'],

        ]);
    }

    public static function import_32()
    {
        echo 'Import address provinces: 32%' . PHP_EOL;
        Province::insert([
            ['id' => '91',  'name' => 'PAPUA BARAT'],

        ]);
    }

    public static function import_33()
    {
        echo 'Import address provinces: 100%' . PHP_EOL;
        Province::insert([
            ['id' => '94',  'name' => 'PAPUA'],

        ]);
    }
}
