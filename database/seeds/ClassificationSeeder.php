<?php

use App\Classification;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classification::insert([
            [
                'class_name' =>'Class-A',
                'price' =>213.31,
                'barcode' =>'CA-11341',
               'barcode_path'=> '/barcodes/classA.gif',
               'class_status' =>'good'

            ],
            [
                'class_name' =>'Class-B',
                'price' =>145.44,
                'barcode' =>'CB-41329',
                'barcode_path'=> '/barcodes/classB.gif',
                'class_status' =>'good'
            ],
            [
                'class_name' =>'Class A - (Reject)',
                'price' =>213.31,
                'barcode' =>'CA-11341-R',
                'barcode_path'=> '/barcodes/classA-reject.gif',
                'class_status' =>'reject'
            ],
            [
                'class_name' =>'Class B - (Reject)',
                'price' =>145.44,
                'barcode' =>'CB-41329-R',
                'barcode_path'=> '/barcodes/classB-reject.gif',
                'class_status' =>'reject'
            ],
        ]);
    }
}
