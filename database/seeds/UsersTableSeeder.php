<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            'Caissier',
            'Comptable',
            'Gerant',
            'Serveur',
            'Gardien'
        ];

        foreach($jobs as $job) {
            factory(App\Job::class)->create(['title' => $job]);
        }
        

        factory(App\Agent::class, 1)->create()->each(function ($agent)
        {
            $agent->profile->save(
                array(
                    factory(App\Profile::class)->make()
                )
            );

            $agent->job->save(
                array(
                    factory(App\Job::class)->make()
                )
            );

            factory(App\User::class)->create([
                "owner_type" => 'App\Agent',    
                "owner_id" => $agent->id,
                "username" => "danielrubango"
            ]);
        });
    }
}
