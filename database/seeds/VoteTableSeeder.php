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

        $current_date = new Carbon();
        $vote = new Vote();
        $vote->user_id = 1;
        $vote->name = 'sample vote';
        $vote->description = 'this item is created by seeder. on'.$current_date;
        $vote->start_at = $current_date;
        $vote->end_at = $current_date;
        $vote->save();
        return $vote->id;
    }
}
