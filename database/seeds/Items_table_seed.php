<?php

use App\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Items_table_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            "name" => "Zasus 4GB RAM",
            "price" => 450000,
            "stock" => 15
        ]);

        Item::create([
            "name" => "RAG PC Motherboard",
            "price" => 1500000,
            "stock" => 20
        ]);

        Item::create([
            "name" => "Zumsang LED Monitor",
            "price" => 2500000,
            "stock" => 5
        ]);
    }
}
