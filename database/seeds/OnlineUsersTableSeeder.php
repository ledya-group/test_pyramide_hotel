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
            'Receptionniste'
        ];

        foreach($jobs as $job) {
            factory(App\Job::class)->create(['title' => $job]);
        }
        

        
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
                "owner_id" => $agent->id
            ]);
        
    }
}
