<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('users')->insert([
        //    'id' =>, 
           'name' => Str::random(10),
           'first_name' => Str::random(10),
           'last_name' => Str::random(10),
           'email' => Str::random(10).'@gmail.com',
        //    'email_verified_at' => 
        //    'password' => 
        //    'two_factor_secret' => 
        //    'two_factor_recovery_codes' => 
        //    'remember_token' => 
        //    'current_team_id' => 
        //    'profile_photo_path' => 
        //    'created_at' => 
        //    'updated_at' => 
        //    'active' => 
        ]);
    }
}


/*

COLUMN_NAME DATA_TYPE CHARACTER_MAXIMUM_LENGTH
id bigint NULL
name varchar 125
first_name
varchar
125
last_name
varchar
125
email
varchar
125
email_verified_at
timestamp
NULL
password
varchar
125
two_factor_secret
text
65535
two_factor_recovery_codes
text
65535
remember_token
varchar
100
current_team_id
bigint
NULL
profile_photo_path
text
65535
created_at
timestamp
NULL
updated_at
timestamp
NULL
active
tinyint
NULL

*/