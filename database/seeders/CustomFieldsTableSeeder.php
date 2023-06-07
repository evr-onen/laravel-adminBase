<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomField;

class CustomFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomField::create([
            'name' => 'SubTitle',
            'page' => 'home',
            'section' => '1',
            'data' => '{"tr":"BİZ KİMİZ?", "en":"WHO WE ARE?"}',
        ]);
        CustomField::create([
            'name' => 'Title',
            'page' => 'home',
            'section' => '1',
            'data' => '{"tr":"Biz Sıradan Bir Dıjıtal Ajanstan Daha Fazlasıyız.", "en":"We Are More Than Just A Digital Agency."}',
        ]);
        CustomField::create([
            'name' => 'Paragraph',
            'page' => 'home',
            'section' => '1',
            'data' => '{"tr":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, mollitia autem maiores odit quibusdam velit ipsum provident similique corrupti incidunt dicta molestiae unde", "en":"Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, mollitia autem maiores odit quibusdam velit ipsum provident similique corrupti incidunt dicta molestiae unde"}',
        ]);

        CustomField::create([
            'name' => 'Box Text 1',
            'page' => 'home',
            'section' => '1',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"DYNAMIC TEXT, IMAGES WITH ADMIN PANEL"}',
        ]);
        CustomField::create([
            'name' => 'Box Text 2',
            'page' => 'home',
            'section' => '1',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"RESPONSIVE DESIGN"}',
        ]);
        CustomField::create([
            'name' => 'Box Text 3',
            'page' => 'home',
            'section' => '1',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"HIGH PERFORMANCE"}',
        ]);



        CustomField::create([
            'name' => "Big Title",
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Services"}',
        ]);
        CustomField::create([
            'name' => 'Mid Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"SERVICES."}',
        ]);
        CustomField::create([
            'name' => 'Little Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"BEST FEATURES"}',
        ]);
        CustomField::create([
            'name' => 'Left Box Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Best Of Our Features"}',
        ]);
        CustomField::create([
            'name' => 'First Box Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"See All Serveces"}',
        ]);
        CustomField::create([
            'name' => 'First Box Button Text',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"See All Serveces"}',
        ]);
        CustomField::create([
            'name' => 'Second Box Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Graphic Design"}',
        ]);
        CustomField::create([
            'name' => 'Second Box Text',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Tempore corrupti temporibus fuga earum asperiores fugit laudantium."}',
        ]);
        CustomField::create([
            'name' => 'Third Box Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Web & Mobile Design"}',
        ]);
        CustomField::create([
            'name' => 'Third Box Text',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Tempore corrupti temporibus fuga earum asperiores fugit laudantium."}',
        ]);
        CustomField::create([
            'name' => 'Forth Box Title',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Social Media Marketing"}',
        ]);
        CustomField::create([
            'name' => 'Forth Box Text',
            'page' => 'home',
            'section' => '2',
            'data' => '{"tr":"Lorem ipsum dolor sit", "en":"Tempore corrupti temporibus fuga earum asperiores fugit laudantium."}',
        ]);




        CustomField::create([
            'name' => 'Little Title',
            'page' => 'home',
            'section' => '3',
            'data' => '{"tr":"Lorem", "en":"CLIENTS"}',
        ]);
        CustomField::create([
            'name' => 'Big Title',
            'page' => 'home',
            'section' => '3',
            'data' => '{"tr":"Lorem", "en":"OUR CLIENTS."}',
        ]);
    }
}
