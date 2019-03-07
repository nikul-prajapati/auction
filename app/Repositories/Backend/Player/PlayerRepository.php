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
            ->select([
                config('module.players.table').'.id',
                config('module.players.table').'.p_match',
                config('module.players.table').'.p_runs',
                config('module.players.table').'.p_wickets',
                config('module.players.table').'.created_at',
                config('module.players.table').'.updated_at',
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
