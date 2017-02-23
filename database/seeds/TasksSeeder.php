<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
          [
                  'name' => 'Design New Dashboard',
                  'progress' => '87',
                  'type' => 'danger',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],
          [
                  'name' => 'Create Home Page',
                  'progress' => '76',
                  'type' => 'warning',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],
          [
                  'name' => 'Some Other Task',
                  'progress' => '32',
                  'type' => 'success',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],
          [
                  'name' => 'Start Building Website',
                  'progress' => '56',
                  'type' => 'info',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],
          [
                  'name' => 'Develop an Awesome Algorithm',
                  'progress' => '10',
                  'type' => 'success',
                  'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                  'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]
       ]);
    }
}
