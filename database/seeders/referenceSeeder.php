<?php

namespace Database\Seeders;

use App\Models\reference\earned;
use App\Models\reference\hours;
use App\Models\reference\minutes;
use Illuminate\Database\Seeder;

class referenceSeeder extends Seeder
{
    private $minutes;
    private $hours;
    private $earned;
    public function __construct(earned $earned, minutes $minutes, hours $hours)
    {
        $this->earned = $earned;
        $this->minutes = $minutes;
        $this->hours = $hours;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minutes = [
            [
                'value' => '0.002',
            ], [
                'value' => '0.004',
            ], [
                'value' => '0.006',
            ], [
                'value' => '0.008',
            ], [
                'value' => '0.01',
            ], [
                'value' => '0.012',
            ], [
                'value' => '0.015',
            ], [
                'value' => '0.017',
            ], [
                'value' => '0.019',
            ], [
                'value' => '0.021',
            ], [
                'value' => '0.023',
            ], [
                'value' => '0.025',
            ], [
                'value' => '0.027',
            ], [
                'value' => '0.029',
            ], [
                'value' => '0.031',
            ], [
                'value' => '0.033',
            ], [
                'value' => '0.035',
            ], [
                'value' => '0.037',
            ], [
                'value' => '0.04',
            ], [
                'value' => '0.042',
            ], [
                'value' => '0.044',
            ], [
                'value' => '0.046',
            ], [
                'value' => '0.048',
            ], [
                'value' => '0.05',
            ], [
                'value' => '0.052',
            ], [
                'value' => '0.054',
            ], [
                'value' => '0.056',
            ], [
                'value' => '0.058',
            ], [
                'value' => '0.06',
            ], [
                'value' => '0.062',
            ], [
                'value' => '0.065',
            ], [
                'value' => '0.067',
            ], [
                'value' => '0.069',
            ], [
                'value' => '0.071',
            ], [
                'value' => '0.073',
            ], [
                'value' => '0.075',
            ], [
                'value' => '0.077',
            ], [
                'value' => '0.079',
            ], [
                'value' => '0.081',
            ], [
                'value' => '0.083',
            ], [
                'value' => '0.085',
            ], [
                'value' => '0.087',
            ], [
                'value' => '0.09',
            ], [
                'value' => '0.092',
            ], [
                'value' => '0.094',
            ], [
                'value' => '0.096',
            ], [
                'value' => '0.098',
            ], [
                'value' => '0.1',
            ], [
                'value' => '0.102',
            ], [
                'value' => '0.104',
            ], [
                'value' => '0.106',
            ], [
                'value' => '0.108',
            ], [
                'value' => '0.11',
            ], [
                'value' => '0.112',
            ], [
                'value' => '0.115',
            ], [
                'value' => '0.117',
            ], [
                'value' => '0.119',
            ], [
                'value' => '0.121',
            ], [
                'value' => '0.123',
            ], [
                'value' => '0.125'
            ]
        ];
        $hours = [
            [
                'value' => '0.125',
            ], [
                'value' => '0.25',
            ], [
                'value' => '0.375',
            ], [
                'value' => '0.5',
            ], [
                'value' => '0.625',
            ], [
                'value' => '0.75',
            ], [
                'value' => '0.875',
            ], [
                'value' => '1.00',
            ]
            ];
        $earned = [
            [
                'id' => '0',
                'value' => '0',
            ],[
                'id' => '0.5',
                'value' => '021',
            ], [
                'id' => '1',
                'value' => '0.042',
            ],[
                'id' => '1.5',
                'value' => '0.062',
            ], [
                'id' => '2',
                'value' => '0.083',
            ], [
                'id' => '2.5',
                'value' => '0.104',
            ], [
                'id' => '3',
                'value' => '0.125',
            ], [
                'id' => '3.5',
                'value' => '0.146',
            ], [
                'id' => '4',
                'value' => '0.167',
            ], [
                'id' => '4.5',
                'value' => '0.187',
            ], [
                'id' => '5',
                'value' => '0.208',
            ], [
                'id' => '5.5',
                'value' => '0.229',
            ], [
                'id' => '6',
                'value' => '0.25',
            ], [
                'id' => '6.5',
                'value' => '0.271',
            ], [
                'id' => '7',
                'value' => '0.292',
            ], [
                'id' => '7.5',
                'value' => '0.312',
            ], [
                'id' => '8',
                'value' => '0.333',
            ], [
                'id' => '8.5',
                'value' => '0.354',
            ], [
                'id' => '9',
                'value' => '0.375',
            ], [
                'id' => '9.5',
                'value' => '0.396',
            ], [
                'id' => '10',
                'value' => '0.417',
            ], [
                'id' => '10.5',
                'value' => '0.437',
            ], [
                'id' => '11',
                'value' => '0.458',
            ], [
                'id' => '11.5',
                'value' => '0.479',
            ], [
                'id' => '12',
                'value' => '0.5',
            ], [
                'id' => '12.5',
                'value' => '0.521',
            ], [
                'id' => '13',
                '1value' => '0.542',
            ], [
                'id' => '13.5',
                'value' => '0.562',
            ], [
                'id' => '14',
                'value' => '0.583',
            ], [
                'id' => '14.5',
                'value' => '0.604',
            ], [
                'id' => '15',
                'value' => '0.625',
            ], [
                'id' => '15.5',
                'value' => '0.646',
            ], [
                'id' => '16',
                'value' => '0.667',
            ], [
                'id' => '16.5',
                'value' => '0.687',
            ], [
                'id' => '17',
                'value' => '0.708',
            ], [
                'id' => '17.5',
                'value' => '0.729',
            ], [
                'id' => '18',
                'value' => '0.75',
            ], [
                'id' => '18.5',
                'value' => '0.771',
            ], [
                'id' => '19',
                'value' => '0.792',
            ], [
                'id' => '19.5',
                'value' => '0.813',
            ], [
                'id' => '20',
                'value' => '0.833',
            ], [
                'id' => '20.5',
                'value' => '0.854',
            ], [
                'id' => '21',
                'value' => '0.875',
            ], [
                'id' => '21.5',
                'value' => '0.896',
            ], [
                'id' => '22',
                'value' => '0.917',
            ], [
                'id' => '22.5',
                'value' => '0.938',
            ], [
                'id' => '23',
                'value' => '0.958',
            ], [
                'id' => '23.5',
                'value' => '0.979',
            ], [
                'id' => '24',
                'value' => '1.00',
            ], [
                'id' => '24.5',
                'value' => '1.021',
            ], [
                'id' => '25',
                'value' => '1.042',
            ], [
                'id' => '25.5',
                'value' => '1.063',
            ], [
                'id' => '26',
                'value' => '1.083',
            ], [
                'id' => '26.5',
                'value' => '1.104',
            ], [
                'id' => '27',
                'value' => '1.125',
            ], [
                'id' => '27.5',
                'value' => '1.146',
            ], [
                'id' => '28',
                'value' => '1.167',
            ], [
                'id' => '28.5',
                'value' => '1.188',
            ], [
                'id' => '29',
                'value' => '1.208',
            ], [
                'id' => '29.5',
                'value' => '1.229',
            ], [
                'id' => '30',
                'value' => '1.25',
            ]
        ];

        $this->minutes->insert($minutes);
        $this->hours->insert($hours);
        $this->earned->insert($earned);
    }
}
