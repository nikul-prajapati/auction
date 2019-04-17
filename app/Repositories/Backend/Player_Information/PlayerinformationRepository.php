<?php

namespace App\Repositories\Backend\Player_Information;

use DB;
use Carbon\Carbon;
use App\Models\Player_Information\Playerinformation;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerinformationRepository.
 */
class PlayerinformationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Playerinformation::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftJoin('users', 'users.id', '=', 'player_information.users_id')
            ->select([
                config('module.playerinformations.table').'.id',
                config('module.playerinformations.table').'.played_match',
                config('module.playerinformations.table').'.total_runs',
                config('module.playerinformations.table').'.total_wickets',
                config('module.playerinformations.table').'.created_at',
                config('module.playerinformations.table').'.speciality',
                config('module.playerinformations.table').'.batsman_type',
                config('module.playerinformations.table').'.bowler_type',
                config('module.playerinformations.table').'.age',
                config('module.playerinformations.table').'.Is_captain',
                config('module.playerinformations.table').'.updated_at',
                DB::raw('GROUP_CONCAT(users.first_name) as names'),
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Playerinformation::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.playerinformations.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Playerinformation $playerinformation
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Playerinformation $playerinformation, array $input)
    {
    	if ($playerinformation->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.playerinformations.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Playerinformation $playerinformation
     * @throws GeneralException
     * @return bool
     */
    public function delete(Playerinformation $playerinformation)
    {
        if ($playerinformation->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.playerinformations.delete_error'));
    }
}
