<?php

namespace App\Repositories\Backend\Bidding;

use DB;
use Carbon\Carbon;
use App\Models\Bidding\Bidding;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BiddingRepository.
 */
class BiddingRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Bidding::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftJoin('users', 'users.id', '=', 'biddings.users_id')
        ->leftJoin('teams', 'teams.id', '=', 'biddings.teams_id')
            ->select([
                config('module.biddings.table').'.id',
                config('module.users.table').'.first_name',
                config('module.teams.table').'.Team_name',
                config('module.biddings.table').'.price',
                config('module.biddings.table').'.created_at',
                config('module.biddings.table').'.updated_at',
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
        if (Bidding::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.biddings.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Bidding $bidding
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Bidding $bidding, array $input)
    {
    	if ($bidding->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.biddings.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Bidding $bidding
     * @throws GeneralException
     * @return bool
     */
    public function delete(Bidding $bidding)
    {
        if ($bidding->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.biddings.delete_error'));
    }
}
