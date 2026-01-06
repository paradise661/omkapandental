<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [

            [
                'order' => 1,
                'status' => 1,
                'title' => 'Omkapan Dental Lagankhel',
                'short_description' => 'Omkapan Dental branch in Lagankhel, near Mangal Bazaar.',
                'description' => 'Situated at Lagankhel Buspark, on the way to Mangal Bazaar, this branch specializes in educational services and consultancy.',
                'email' => 'OmkapanDental@gmail.com',
                'phone' => '015450313,9823652021,9848684455',
                'location' => 'Lagankhel Buspark, On the way to Mangal Bazaar, Nepal',
            ],
            [
                'order' => 2,
                'status' => 1,
                'title' => 'Omkapan Dental Itahari',
                'short_description' => 'Omkapan Dental branch in Itahari, offering educational services.',
                'description' => 'Located opposite Gorkha Department in Itahari-6, Nepal, this branch provides top-notch educational consultancy and language training.',
                'email' => 'OmkapanDental@gmail.com',
                'phone' => '025590644,9810000146,9804040084',
                'location' => 'Opposite of Gorkha Department, Itahari-6, Nepal',
            ],
            [
                'order' => 3,
                'status' => 1,
                'title' => 'Omkapan Dental Educare Damak',
                'short_description' => 'Omkapan Dental Educare branch in Damak, opposite Global IME Bank.',
                'description' => 'Located in Mangaldeep Market, opposite Global IME Bank in Damak, Nepal, offering comprehensive educational support.',
                'email' => 'OmkapanDental@gmail.com',
                'phone' => '023577176,9769727086,9848684455',
                'location' => 'Mangaldeep Market, Opposite of Global IME Bank, Damak, Nepal',
            ],
            [
                'order' => 4,
                'status' => 1,
                'title' => 'Omkapan Dental Biratnagar',
                'short_description' => 'Omkapan Dental branch in Biratnagar at Mahendra Chowk.',
                'description' => 'Located at Mahendra Chowk, Biratnagar, Nepal, this branch provides educational consultancy and training programs.',
                'email' => 'OmkapanDental@gmail.com',
                'phone' => '9848684455,9709026377',
                'location' => 'Mahendra Chowk, Biratnagar, Nepal',
            ],
            [
                'order' => 5,
                'status' => 1,
                'title' => 'Omkapan Dental Kathmandu',
                'short_description' => 'Omkapan Dental branch in Kathmandu near Chabahil Stupa.',
                'description' => 'Situated at Chabahil Stupa, Kathmandu, Nepal, offering a range of educational services and consultancy.',
                'email' => 'OmkapanDental@gmail.com',
                'phone' => '015923895,9841673276,9848684455',
                'location' => 'Chabahil Stupa, Kathmandu, Nepal',
            ],
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
