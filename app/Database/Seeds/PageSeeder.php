<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Mandatory Public Disclosure',
                'slug' => 'disclosure',
                'content' => '
                    <h2>Mandatory Public Disclosure</h2>
                    <p>In compliance with CBSE guidelines, the following documents are available for public viewing:</p>
                    <ul class="list-disc pl-5 my-4 space-y-2">
                        <li><a href="#" class="text-primary-600 hover:underline">Affiliation/Upgradation Letter</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">Registration Certificate of Society/Trust</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">No Objection Certificate (NOC)</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">Recognition Certificate</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">Building Safety Certificate</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">Fire Safety Certificate</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">Self Certification by School</a></li>
                        <li><a href="#" class="text-primary-600 hover:underline">Water, Health and Sanitation Certificates</a></li>
                    </ul>
                ',
                'meta_title' => 'Mandatory Public Disclosure - Moonstar School',
                'meta_description' => 'Mandatory public disclosure documents for Moonstar School.',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Sports & Facilities',
                'slug' => 'sports',
                'content' => '
                    <h2>Sports and Physical Education</h2>
                    <p class="mb-4">At Moonstar School, we believe that physical education is vital for holistic development. We offer top-tier facilities for various sports including:</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-slate-100">
                            <h3 class="font-bold text-lg mb-2">Outdoor Sports</h3>
                            <ul class="list-disc pl-5">
                                <li>Cricket Ground</li>
                                <li>Football Field</li>
                                <li>Basketball Court</li>
                                <li>Lawn Tennis</li>
                                <li>Athletics Track</li>
                            </ul>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-slate-100">
                            <h3 class="font-bold text-lg mb-2">Indoor Games</h3>
                            <ul class="list-disc pl-5">
                                <li>Badminton</li>
                                <li>Table Tennis</li>
                                <li>Chess & Carrom</li>
                                <li>Yoga & Meditation Hall</li>
                            </ul>
                        </div>
                    </div>
                    <p>Our experienced coaches ensure that every student gets the opportunity to excel in their chosen sport.</p>
                ',
                'meta_title' => 'Sports Facilities - Moonstar School',
                'meta_description' => 'World-class sports facilities at Moonstar School including cricket, football, basketball, and more.',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Bus Routes & Transport',
                'slug' => 'bus-routes',
                'content' => '
                    <h2>School Transport Services</h2>
                    <p class="mb-4">Moonstar School provides safe and reliable transport services covering major areas of the city. All buses are equipped with GPS tracking and CCTV cameras.</p>
                    
                    <div class="overflow-x-auto my-6">
                        <table class="w-full border-collapse border border-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="border p-3 text-left">Route No</th>
                                    <th class="border p-3 text-left">Area Covered</th>
                                    <th class="border p-3 text-left">Pickup Time</th>
                                    <th class="border p-3 text-left">Drop Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-3">R-01</td>
                                    <td class="border p-3">City Centre - Mall Road - School</td>
                                    <td class="border p-3">7:30 AM</td>
                                    <td class="border p-3">3:30 PM</td>
                                </tr>
                                <tr>
                                    <td class="border p-3">R-02</td>
                                    <td class="border p-3">Civil Lines - Railway Station - School</td>
                                    <td class="border p-3">7:40 AM</td>
                                    <td class="border p-3">3:20 PM</td>
                                </tr>
                                <tr>
                                    <td class="border p-3">R-03</td>
                                    <td class="border p-3">Tech Park - Housing Board - School</td>
                                    <td class="border p-3">7:25 AM</td>
                                    <td class="border p-3">3:35 PM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                ',
                'meta_title' => 'Bus Routes - Moonstar School',
                'meta_description' => 'Moonstar School bus routes and transport information.',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Fee Structure',
                'slug' => 'fee-structure',
                'content' => '
                    <h2>Fee Structure (Academic Year 2024-25)</h2>
                    <p class="mb-4">Our fee structure is transparent and inclusive.</p>
                    
                    <div class="overflow-x-auto my-6">
                         <table class="w-full border-collapse border border-slate-200 text-sm">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="border p-3 text-left">Class</th>
                                    <th class="border p-3 text-left">Admission Fee (One Time)</th>
                                    <th class="border p-3 text-left">Tuition Fee (Quarterly)</th>
                                    <th class="border p-3 text-left">Annual Charges</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border p-3">Nursery - KG</td>
                                    <td class="border p-3">₹ 15,000</td>
                                    <td class="border p-3">₹ 12,000</td>
                                    <td class="border p-3">₹ 8,000</td>
                                </tr>
                                <tr>
                                    <td class="border p-3">I - V</td>
                                    <td class="border p-3">₹ 20,000</td>
                                    <td class="border p-3">₹ 15,000</td>
                                    <td class="border p-3">₹ 10,000</td>
                                </tr>
                                <tr>
                                    <td class="border p-3">VI - VIII</td>
                                    <td class="border p-3">₹ 25,000</td>
                                    <td class="border p-3">₹ 18,000</td>
                                    <td class="border p-3">₹ 12,000</td>
                                </tr>
                                <tr>
                                    <td class="border p-3">IX - X</td>
                                    <td class="border p-3">₹ 30,000</td>
                                    <td class="border p-3">₹ 22,000</td>
                                    <td class="border p-3">₹ 15,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-slate-500 italic">* Transport fees are charged separately based on distance.</p>
                ',
                'meta_title' => 'Fee Structure - Moonstar School',
                'meta_description' => 'Detailed fee structure for Moonstar School for the academic year 2024-25.',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Using query builder to handle 'ignore' for duplicates easily if needed,
        // but model insertBatch normally doesn't do IGNORE without custom raw sql.
        // Or we can just use the model and let it fail if unique constraint violated, or check first.
        // For simplicity, let's just insert one by one and ignore errors or check first.

        $db = \Config\Database::connect();
        $builder = $db->table('pages');

        foreach ($data as $row) {
            $existing = $builder->where('slug', $row['slug'])->get()->getRow();
            if (!$existing) {
                $builder->insert($row);
            }
        }
    }
}
