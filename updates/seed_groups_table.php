<?php namespace Xitara\Documentation\Updates;

use October\Rain\Database\Updates\Seeder;
use Xitara\Documentation\Models\Group;

class SeedAllTables extends Seeder
{
    public function run()
    {
        Group::create([
            'name' => 'Default',
            'description' => 'Default',
        ]);
    }
}
