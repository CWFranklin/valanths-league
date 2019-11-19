<?php

use App\Rank;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::firstOrCreate([
            'name' => 'Iron 4',
            'points' => 1,
            'order' => 0,
        ]);

        Rank::firstOrCreate([
            'name' => 'Iron 3',
            'points' => 1,
            'order' => 1,
        ]);

        Rank::firstOrCreate([
            'name' => 'Iron 2',
            'points' => 1,
            'order' => 2,
        ]);

        Rank::firstOrCreate([
            'name' => 'Iron 1',
            'points' => 1,
            'order' => 3,
        ]);

        Rank::firstOrCreate([
            'name' => 'Bronze 4',
            'points' => 1,
            'order' => 4,
        ]);

        Rank::firstOrCreate([
            'name' => 'Bronze 3',
            'points' => 1,
            'order' => 5,
        ]);

        Rank::firstOrCreate([
            'name' => 'Bronze 2',
            'points' => 1,
            'order' => 6,
        ]);

        Rank::firstOrCreate([
            'name' => 'Bronze 1',
            'points' => 1,
            'order' => 7,
        ]);

        Rank::firstOrCreate([
            'name' => 'Silver 4',
            'points' => 1,
            'order' => 8,
        ]);

        Rank::firstOrCreate([
            'name' => 'Silver 3',
            'points' => 2,
            'order' => 9,
        ]);

        Rank::firstOrCreate([
            'name' => 'Silver 2',
            'points' => 3,
            'order' => 10,
        ]);

        Rank::firstOrCreate([
            'name' => 'Silver 1',
            'points' => 4,
            'order' => 11,
        ]);

        Rank::firstOrCreate([
            'name' => 'Gold 4',
            'points' => 6,
            'order' => 12,
        ]);

        Rank::firstOrCreate([
            'name' => 'Gold 3',
            'points' => 7,
            'order' => 13,
        ]);

        Rank::firstOrCreate([
            'name' => 'Gold 2',
            'points' => 8,
            'order' => 14,
        ]);

        Rank::firstOrCreate([
            'name' => 'Gold 1',
            'points' => 9,
            'order' => 15,
        ]);

        Rank::firstOrCreate([
            'name' => 'Platinum 4',
            'points' => 11,
            'order' => 16,
        ]);

        Rank::firstOrCreate([
            'name' => 'Platinum 3',
            'points' => 13,
            'order' => 17,
        ]);

        Rank::firstOrCreate([
            'name' => 'Platinum 2',
            'points' => 15,
            'order' => 18,
        ]);

        Rank::firstOrCreate([
            'name' => 'Platinum 1',
            'points' => 17,
            'order' => 19,
        ]);

        Rank::firstOrCreate([
            'name' => 'Diamond 4',
            'points' => null,
            'order' => 20,
        ]);

        Rank::firstOrCreate([
            'name' => 'Diamond 3',
            'points' => null,
            'order' => 21,
        ]);

        Rank::firstOrCreate([
            'name' => 'Diamond 2',
            'points' => null,
            'order' => 22,
        ]);

        Rank::firstOrCreate([
            'name' => 'Diamond 1',
            'points' => null,
            'order' => 23,
        ]);

        Rank::firstOrCreate([
            'name' => 'Master',
            'points' => null,
            'order' => 24,
        ]);

        Rank::firstOrCreate([
            'name' => 'Grand Master',
            'points' => null,
            'order' => 25,
        ]);

        Rank::firstOrCreate([
            'name' => 'Challenger',
            'points' => null,
            'order' => 26,
        ]);
    }
}
