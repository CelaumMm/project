<?php

require __DIR__ . '/bootstrap.php';

// use Illuminate\Database\Capsule\Manager as DB;
// $users = DB::table('users')->get()->toArray();

$users = App\Models\User::all()->toArray();

echo '<pre>';
print_r($users);
