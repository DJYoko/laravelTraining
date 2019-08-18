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
     * @return array
     */
    public function run()
    {
        return [
            $this->createDateDefinedVote(),
            $this->createDateUndefinedVote(),
        ];
    }
    /**
     * Create Vote with Start & end date
     * @return int
     */
    private function createDateDefinedVote()
    {
        $current_date = Carbon::now();
        $start_date =  Carbon::now()->subDay(7);
        $end_date =  Carbon::now()->addDay(7);

        echo( $start_date.'/'.$end_date);

        $vote = new Vote();
        $vote->user_id = 1;
        $vote->name = 'sample vote';
        $vote->description = 'this item is created by seeder. on'.$current_date;
        $vote->start_at = $start_date;
        $vote->end_at = $end_date;
        $vote->save();
        return $vote->id;
    }
    /**
     * Create Vote without both of  Start & end date
     * @return int
     */
    private function createDateUndefinedVote()
    {
        $current_date = Carbon::now();
        $start_date =  Carbon::now()->subDay(7);
        $end_date =  Carbon::now()->addDay(7);

        echo( $start_date.'/'.$end_date);

        $vote = new Vote();
        $vote->user_id = 1;
        $vote->name = 'sample vote';
        $vote->description = 'this item does not have both of Start & end date';
        $vote->save();
        return $vote->id;
    }
}
