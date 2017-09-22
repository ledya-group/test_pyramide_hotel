<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Reservation::class, 50)->create()->each(function ($reservation){
            factory(App\User::class)->create([
                "owner_type" => 'App\Client',    
                "owner_id" => $reservation->client->id
            ]);
        });
    }
}
