<?php

use Illuminate\Database\Seeder;

class OnlineUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            'Receptionniste',
            'IT'
        ];

        foreach($jobs as $job) {
            factory(App\Job::class)->create(['title' => $job]);
        }
        
        factory(App\Agent::class, 1)->create()->each(function ($agent)
        {
            $agent->profile->create([
                'first_name' => "Daniel",
                'last_name' => "Rubango",
                'email' => "danielrubango@gmail.com",
                'address' => "",
                'title' => "M.",
                'country' => "",
                'phone_number' => ""
            ]);

            factory(App\User::class)->create([
                "owner_type" => 'App\Agent',    
                "username" => 'danielrubango',    
                "owner_id" => $agent->id,
                "password" => bcrypt("verySecretPassword0000")
            ]);
        });
    }
}
