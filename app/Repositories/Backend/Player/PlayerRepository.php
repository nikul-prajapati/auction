<?php

namespace App\Repositories\Backend\Player;

use DB;
use Carbon\Carbon;
use App\Models\Player\Player;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerRepository.
 */
class PlayerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Player::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            // ->leftJoin('users', 'users.id', '=', 'players.users_id')
            
            // ->leftJoin('playerrecords_user', 'playerrecords_user.users_id', '=', 'player.id')
            // ->leftJoin('player_records', 'playerrecords_user.player_records_id', '=', 'player_records.id')

            ->select([
                config('module.players.table').'.id',
                
                config('module.players.table').'.created_at',
                config('module.players.table').'.updated_at',
                DB::raw('GROUP_CONCAT(users.first_name) as names'),
                DB::raw('GROUP_CONCAT(project_records.age) as age'),
            ]);
    }


      

    /**
     * For updating the respective Model in storage
     *
     * @param Player $player
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Player $player, array $input)
    {
    	if ($player->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.players.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Player $player
     * @throws GeneralException
     * @return bool
     */
    public function delete(Player $player)
    {
        if ($player->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.players.delete_error'));
    }
}
