<?php

namespace App\Repositories\Backend\Selectcaptain;

use DB;
use Carbon\Carbon;
use App\Models\Selectcaptain\Selectcaptain;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SelectcaptainRepository.
 */
class SelectcaptainRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Selectcaptain::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftJoin('users', 'users.id', '=', 'selectcaptains.users_id')
        ->leftJoin('teams', 'teams.id', '=', 'selectcaptains.teams_id')
            ->select([
                config('module.selectcaptains.table').'.id',
                config('module.users.table').'.first_name',
                config('module.teams.table').'.Team_name',
                config('module.selectcaptains.table').'.created_at',
                config('module.selectcaptains.table').'.updated_at',
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
        if (Selectcaptain::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.selectcaptains.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Selectcaptain $selectcaptain
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Selectcaptain $selectcaptain, array $input)
    {
    	if ($selectcaptain->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.selectcaptains.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Selectcaptain $selectcaptain
     * @throws GeneralException
     * @return bool
     */
    public function delete(Selectcaptain $selectcaptain)
    {
        if ($selectcaptain->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.selectcaptains.delete_error'));
    }
}
