<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'service'=>'Corona Test',
                'description'=>'The PCR test is a test for diagnosing people with corona, and it is considered very accurate.',
                'price'=>'15',
                'service_image'=>'https://www.who.int/images/default-source/health-topics/coronavirus/corona-virus-getty.tmb-1200v.jpg?Culture=ar&sfvrsn=217a6a68_36'
            ],
            [
                'service'=>'Blood Test',
                'description'=>'It is a laboratory test that is conducted based on the decision of the treating physician.',
                'price'=>'10',
                'service_image'=>'https://ochsner-craft.s3.amazonaws.com/blog/articles/_930x524_crop_center-center_75_none/Understanding-Blood-Test-Results.jpg'
            ],
            [
                'service'=>'Kidney Test',
                'description'=>'Kidney Function Test includes a group of tests, each of measures a specific characteristic of the kidneys.
                ',
                'price'=>'50',
                'service_image'=>'http://med.stanford.edu/content/dam/sm-news/images/2014/06/kidney-stock.jpg'
            ],
            [
                'service'=>'Liver Test',
                'description'=>'The liver function test is done by taking a blood sample for lorem ipsum laboratory examination.',
                'price'=>'30',
                'service_image'=>'https://onthewards.org/wp-content/uploads/2015/09/751247477e5533e6df81a9b3698f719b.jpg'
            ],
            [
                'service'=>'Heart Test',
                'description'=>'Cardiac examination is a medical examination to check the health and safety of your heart.',
                'price'=>'40',
                'service_image'=>'https://www.news-medical.net/image.axd?picture=2021%2F1%2Fshutterstock_1576424071.jpg'
            ],
            [
                'service'=>'Creatinine Test',
                'description'=>'In the blood creatinine test, the percentage of creatinine in the blood serum is measured.',
                'price'=>'25',
                'service_image'=>'https://labs.selfdecode.com/app/uploads/2019/12/Creatinine-Test-High-Low-Normal-Levels-1.jpg'
            ]
        ]);
    }
}
