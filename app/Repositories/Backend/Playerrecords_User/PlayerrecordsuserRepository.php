<?php

namespace App\Repositories\Backend\Playerrecords_User;

use DB;
use Carbon\Carbon;
use App\Models\Playerrecords_User\Playerrecordsuser;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerrecordsuserRepository.
 */
class PlayerrecordsuserRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Playerrecordsuser::class;

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
                config('module.playerrecordsusers.table').'.id',
                config('module.playerrecordsusers.table').'.created_at',
                config('module.playerrecordsusers.table').'.updated_at',
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
        if (Playerrecordsuser::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.playerrecordsusers.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Playerrecordsuser $playerrecordsuser
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Playerrecordsuser $playerrecordsuser, array $input)
    {
    	if ($playerrecordsuser->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.playerrecordsusers.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Playerrecordsuser $playerrecordsuser
     * @throws GeneralException
     * @return bool
     */
    public function delete(Playerrecordsuser $playerrecordsuser)
    {
        if ($playerrecordsuser->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.playerrecordsusers.delete_error'));
    }
}
