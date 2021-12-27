<?php
namespace Database\Seeders;
use App\State;
use Illuminate\Database\Seeder;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = [
           /* [
                'id' => '1',
                'name' => 'Andaman and Nicobar Islands'
            ],
            [
                'id' => '2',
                'name' => 'Andhra Pradesh'
            ],
            [
                'id' => '3',
                'name' => 'Arunachal Pradesh'
            ],
            [
                'id' => '4',
                'name' => 'Assam'
            ],
            [
                'id' => '5',
                'name' => 'Bihar'
            ],
            [
                'id' => '6',
                'name' => 'Chandigarh'
            ],
            [
                'id' => '7',
                'name' => 'Chhattisgarh'
            ],
            [
                'id' => '8',
                 'name' => 'Dadra and Nagar Haveli'
            ],
            [
                 'id' => '9',
                 'name' => 'Daman and Diu'
            ],
            [
                'id' => '10',
                'name' => 'Delhi'
            ],*/
            [
                'id' => '11',
                'name' => 'Goa'
            ],
           /* [
                'id' => '12',
                'name' => 'Gujarat'
            ],
            [
                'id' => '13',
                'name' => 'Haryana'
            ],
            [
                'id' => '14',
                'name' => 'Himachal Pradesh'
            ],
            [
                'id' => '15',
                'name' => 'Jammu and Kashmir'
            ],
            [
                'id' => '16',
                'name' => 'Jharkhand'
            ],
            [
                'id' => '17',
                'name' => 'Karnataka'
            ],
            [
                'id' => '19',
                'name' => 'Kerala'
            ],
            [
                'id' => '20',
                'name' => 'Lakshadweep'
            ],
            [
                'id' => '21',
                'name' => 'Madhya Pradesh'
            ],*/
            [
                'id' => '22',
                'name' => 'Maharashtra'
            ],
           /* [
                'id' => '23',
                'name' => 'Manipur'
            ],
            [
                'id' => '24',
                'name' => 'Meghalaya'
            ],
            [
                'id' => '25',
                'name' => 'Mizoram'
            ],
            [
                'id' => '26',
                'name' => 'Nagaland'
            ],
            [
                'id' => '29',
                'name' => 'Odisha'
            ],
            [
                'id' => '31',
                'name' => 'Pondicherry'
            ],
            [
                'id' => '32',
                'name' => 'Punjab'
            ],
            [
                'id' => '33',
                'name' => 'Rajasthan'
            ],
            [
                'id' => '34',
                'name' => 'Sikkim'
            ],
            [
                'id' => '35',
                'name' => 'Tamil Nadu'
            ],
            [
                'id' => '36',
                'name' => 'Telangana'
            ],
            [
                'id' => '37',
                'name' => 'Tripura'
            ],
            [
                'id' => '38',
                'name' => 'Uttar Pradesh'
            ],
            [
                'id' => '39',
                'name' => 'Uttarakhand'
            ],
            [
                'id' => '41',
                'name' => 'West Bengal'
            ]*/
            ];
            State::insert($state);
    }
}