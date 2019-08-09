<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Vote;
use App\Models\User;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $currentDate = new Carbon();
        $vote = new Vote();
        $vote->user_id = 1;
        $vote->name = 'sample vote';
        $vote->description = 'this item is created by seeder. on'.$currentDate;
        $vote->start_at = $currentDate;
        $vote->end_at = $currentDate;
        $vote->save();
        return $vote->id;
    }
}
