
<?php

use Illuminate\Database\Seeder;
use App\Models\VoteChoice;
use App\Models\Vote;

class VoteChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @param int $vote_id
     * @return void
     */
    public function run($vote_id)
    {

        $vote_choice = new VoteChoice();
        $vote_choice->vote_id = $vote_id;
        $vote_choice->name = 'sample choice for'.$vote_id;
        $vote_choice->save();

    }
}
