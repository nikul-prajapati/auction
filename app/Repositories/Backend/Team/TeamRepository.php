<?php

namespace App\Repositories\Backend\Team;

use DB;
use Carbon\Carbon;
use App\Models\Team\Team;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamRepository.
 */
class TeamRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Team::class;

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
                config('module.teams.table').'.id',
                config('module.teams.table').'.Team_name',
                config('module.teams.table').'.created_at',
                config('module.teams.table').'.updated_at',
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
    
        if (Team::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.teams.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Team $team
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Team $team, array $input)
    {
    	if ($team->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.teams.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Team $team
     * @throws GeneralException
     * @return bool
     */
    public function delete(Team $team)
    {
        if ($team->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.teams.delete_error'));
    }
}
