<?php
namespace Database\Seeders;
use App\District;
use Illuminate\Database\Seeder;
class DistrictTableSeeder extends Seeder
{
    public function run()
    {
        $district = [
            [
                'id'       => '1',
                'state_id' => '11',
                'name'     => 'South Goa'
            ],
            [
                'id'       => '2',
                'state_id' => '11',
                'name'     => 'North Goa'
            ],
            [
                'id'       => '3',
                'state_id' => '22',
                'name'     => 'Ahmednagar'
            ],
            [
                'id'       => '4',
                'state_id' => '22',
                'name'     => 'Akola'
            ],
            [
                'id'       => '5',
                'state_id' => '22',
                'name'     => 'Amravati'
            ],
            [
                'id'       => '6',
                'state_id' => '22',
                'name'     => 'Aurangabad'
            ],
            [
                'id'       => '7',
                'state_id' => '22',
                'name'     => 'Beed'
            ],
            [
                'id'       => '8',
                'state_id' => '22',
                'name'     => 'Bhandara'
            ],
            [
                'id'       => '9',
                'state_id' => '22',
                'name'     => 'Buldhana'
            ],
            [
                'id'       => '10',
                'state_id' => '22',
                'name'     => 'Chandrapur'
            ],
            [
                'id'       => '11',
                'state_id' => '22',
                'name'     => 'Dhule'
            ],
            [
                'id'       => '12',
                'state_id' => '22',
                'name'     => 'Gadchiroli'
            ],
            [
                'id'       => '13',
                'state_id' => '22',
                'name'     => 'Gondia'
            ],
            [
                'id'       => '14',
                'state_id' => '22',
                'name'     => 'Hingoli'
            ],
            [
                'id'       => '15',
                'state_id' => '22',
                'name'     => 'Jalgaon'
            ],
            [
                'id'       => '16',
                'state_id' => '22',
                'name'     => 'Jalna'
            ],
            [
                'id'       => '17',
                'state_id' => '22',
                'name'     => 'Kolhapur'
            ],
            [
                'id'       => '18',
                'state_id' => '22',
                'name'     => 'Latur'
            ],
            [
                'id'       => '19',
                'state_id' => '22',
                'name'     => 'Mumbai Suburban'
            ],
            [
                'id'       => '20',
                'state_id' => '22',
                'name'     => 'Nagpur'
            ],
            [
                'id'       => '21',
                'state_id' => '22',
                'name'     => 'Nanded'
            ],
            [
                'id'       => '22',
                'state_id' => '22',
                'name'     => 'Nandurbar'
            ],
            [
                'id'       => '23',
                'state_id' => '22',
                'name'     => 'Nashik'
            ],
            [
                'id'       => '24',
                'state_id' => '22',
                'name'     => 'Osmanabad'
            ],
            [
                'id'       => '25',
                'state_id' => '22',
                'name'     => 'Parbhani'
            ],
            [
                'id'       => '26',
                'state_id' => '22',
                'name'     => 'Pune'
            ],
            [
                'id'       => '27',
                'state_id' => '22',
                'name'     => 'Raigad'
            ],
            [
                'id'       => '28',
                'state_id' => '22',
                'name'     => 'Ratnagiri'
            ],
            [
                'id'       => '29',
                'state_id' => '22',
                'name'     => 'Sangli'
            ],
            [
                'id'       => '30',
                'state_id' => '22',
                'name'     => 'Satara'
            ],
            [
                'id'       => '31',
                'state_id' => '22',
                'name'     => 'Sindhudurg'
            ],
            [
                'id'       => '32',
                'state_id' => '22',
                'name'     => 'Solapur'
            ],
            [
                'id'       => '33',
                'state_id' => '22',
                'name'     => 'Thane'
            ],
            [
                'id'       => '34',
                'state_id' => '22',
                'name'     => 'Washim'
            ],
            [
                'id'       => '35',
                'state_id' => '22',
                'name'     => 'Yavatmal'
            ],
        ];
        District::insert($district);
    }
}
/* District with taluka
[
{
  "name":"Ahmednagar",
  "tahasil" : [ "Akola", "Jamkhed", "Karjat", "Kopargaon", "Nagar", "Nevasa", "Parner", "Pathardi", "Rahta", "Rahuri", "Sangamner", "Shevgaon", "Shrigonda", "Shrirampur" ]
},
{
  "name":"Akola",
  "tahasil":[ "Akola", "Akot", "Balapur", "Barshitakli", "Murtijapur", "Patur", "Telhara" ]
},
{
"name":"Amravati",
"tahasil":[ "Achalpur", "Amravati", "Anjangaon Surji", "Bhatkuli", "Chandur Railway", "Chandurbazar", "Chikhaldara", "Daryapur", "Dhamangaon Railway", "Dharni", "Morshi", "Nandgaon-Khandeshwar", "Teosa", "Warud" ]
},
{
  "name":"Aurangabad",
"tahasil":[ "Aurangabad", "Gangapur", "Kannad", "Khuldabad", "Paithan", "Phulambri", "Sillod", "Soegaon", "Vaijapur" ]
},
{
  "name":"Beed",
"tahasil":[ "Ambejogai", "Ashti", "Bid", "Dharur", "Georai", "Kaij", "Manjlegaon", "Parli", "Patoda", "Shirur (Kasar)", "Wadwani" ]
},
{
  "name":"Bhandara",
"tahasil":[ "Bhandara", "Mohadi", "Pauni", "Tumsar" ]
},
{
  "name":"Buldhana",
"tahasil":[ "Buldana", "Chikhli", "Deolgaon Raja", "Jalgaon (Jamod)", "Khamgaon", "Lonar", "Malkapur", "Mehkar", "Motala", "Nandura", "Sangrampur", "Shegaon", "Sindkhed Raja" ]
},
{
  "name":"Chandrapur",
"tahasil":[ "Ballarpur", "Bhadravati", "Brahmapuri", "Chandrapur", "Chimur", "Gondpipri", "Jiwati", "Korpana", "Mul", "Nagbhir", "Pombhurna", "Rajura", "Sawali", "Sindewahi", "Warora" ]
},
{
  "name":"Dhule",
"tahasil":[ "Dhule", "Sakri", "Shirpur", "Sindkhede" ]
},
{
  "name":"Gadchiroli",
"tahasil":[ "Aheri", "Armori", "Bhamragad", "Chamorshi", "Desaiganj (Vadasa)", "Dhanora", "Etapalli", "Gadchiroli", "Korchi", "Kurkheda", "Mulchera", "Sironcha" ]
},
{
  "name":"Gondia",
"tahasil":[ "Amgaon", "Arjuni Morgaon", "Deori", "Gondiya", "Goregaon", "Sadak-Arjuni", "Salekasa", "Tirora" ]
},
{
  "name":"Hingoli",
"tahasil":[ "Aundha (Nagnath)", "Basmath", "Hingoli", "Kalamnuri", "Sengaon" ]
},
{
  "name":"Jalgaon",
"tahasil":[ "Amalner", "Bhadgaon", "Bhusawal", "Bodvad", "Chalisgaon", "Chopda", "Dharangaon", "Erandol", "Jalgaon", "Jamner", "Muktainagar", "Pachora", "Parola", "Raver", "Yawal" ]
},
{
  "name":"Jalna",
"tahasil":[ "Ambad", "Badnapur", "Bhokardan", "Ghansawangi", "Jafferabad", "Jalna", "Mantha", "Partur" ]
},
{
  "name":"Kolhapur",
"tahasil":[ "Ajra", "Bavda", "Bhudargad", "Chandgad", "Gadhinglaj", "Hatkanangle", "Kagal", "Karvir", "Panhala", "Radhanagari", "Shahuwadi", "Shirol" ]
},
{
  "name":"Latur",
  "tahasil":[ "Ahmadpur", "Ausa", "Chakur", "Deoni", "Jalkot", "Latur", "Nilanga", "Renapur", "Shirur-Anantpal", "Udgir" ]
},
{
  "name":"Mumbai Suburban",
  "tahasil":[ "Andheri", "Borivali", "Kurla" ]
},
{
  "name":"Nagpur",
"tahasil":[ "Bhiwapur", "Hingna", "Kalameshwar", "Kamptee", "Katol", "Kuhi", "Mauda", "Nagpur (Rural)", "Nagpur (Urban)", "Narkhed", "Parseoni", "Ramtek", "Savner", "Umred" ]
},
{
  "name":"Nanded",
"tahasil":[ "Ardhapur", "Bhokar", "Biloli", "Deglur", "Dharmabad", "Hadgaon", "Himayatnagar", "Kandhar", "Kinwat", "Loha", "Mahoor", "Mudkhed", "Mukhed", "Naigaon (Khairgaon)", "Nanded", "Umri" ]
},
{
  "name":"Nandurbar",
  "tahasil":[ "Akkalkuwa", "Akrani", "Nandurbar", "Nawapur", "Shahade", "Talode" ]
},
{"name":"Nashik",
  "tahasil":[ "Baglan", "Chandvad", "Deola", "Dindori", "Igatpuri", "Kalwan", "Malegaon", "Nandgaon", "Nashik", "Niphad", "Peint", "Sinnar", "Surgana", "Trimbakeshwar", "Yevla" ]
},
{"name":"Osmanabad",
"tahasil":[ "Bhum", "Kalamb", "Lohara", "Osmanabad", "Paranda", "Tuljapur", "Umarga", "Washi" ]},
{"name":"Parbhani",
"tahasil":[ "Gangakhed", "Jintur", "Manwath", "Palam", "Parbhani", "Pathri", "Purna", "Sailu", "Sonpeth" ]
},
{"name":"Pune",
"tahasil":[ "Ambegaon", "Baramati", "Bhor", "Daund", "Haveli", "Indapur", "Junnar", "Khed", "Mawal", "Mulshi", "Pune City", "Purandhar", "Shirur", "Velhe" ]
},
{"name":"Raigad",
"tahasil":[ "Alibag", "Karjat", "Khalapur", "Mahad", "Mangaon", "Mhasla", "Murud", "Panvel", "Pen", "Poladpur", "Roha", "Shrivardhan", "Sudhagad", "Tala", "Uran" ]
},
{"name":"Ratnagiri",
"tahasil":[ "Chiplun", "Dapoli", "Guhagar", "Khed", "Lanja", "Mandangad", "Rajapur", "Ratnagiri", "Sangameshwar" ]
},
{"name":"Sangli",
"tahasil":[ "Atpadi", "Jat", "Kadegaon", "Kavathemahankal", "Khanapur", "Miraj", "Palus", "Shirala", "Tasgaon", "Walwa" ]
},
{"name":"Satara",
"tahasil":[ "Jaoli", "Karad", "Khandala", "Khatav", "Koregaon", "Mahabaleshwar", "Man", "Patan", "Phaltan", "Satara", "Wai" ]
},
{"name":"Sindhudurg",
"tahasil":[ "Devgad", "Dodamarg", "Kankavli", "Kudal", "Malwan", "Sawantwadi", "Vaibhavvadi", "Vengurla" ]
},
{"name":"Solapur",
"tahasil":[ "Akkalkot", "Barshi", "Karmala", "Madha", "Malshiras", "Mangalvedhe", "Mohol", "Pandharpur", "Sangole", "Solapur North", "Solapur South" ]
},
{"name":"Thane",
"tahasil":[ "Ambarnath", "Bhiwandi", "Dahanu", "Jawhar", "Kalyan", "Mokhada", "Murbad", "Palghar", "Shahapur", "Talasari", "Thane", "Ulhasnagar", "Vada", "Vasai", "Vikramgad" ]
},
{"name":"Washim",
"tahasil":[ "Arvi", "Ashti", "Deoli", "Hinganghat", "Karanja", "Samudrapur", "Seloo", "Wardha" ]
},
{"name":"Washim",
"tahasil":[ "Karanja", "Malegaon", "Mangrulpir", "Manora", "Risod", "Washim" ]
},
{"name":"Yavatmal",
"tahasil":["Arni",
"Babulgaon",
"Darwha",
"Digras",
"Ghatanji",
"Kalamb",
"Kelapur",
"Mahagaon",
"Maregaon",
"Ner",
"Pusad",
"Ralegaon",
"Umarkhed",
"Wani",
"Yavatmal",
"Zari-Jamani"]
}
 ]
*/