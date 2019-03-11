<?php

namespace App\Repositories\Backend\Player_Record;

use DB;
use Carbon\Carbon;
use App\Models\Player_Record\Playerrecord;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerrecordRepository.
 */
class PlayerrecordRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Playerrecord::class;

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
                config('module.playerrecords.table').'.id',
                config('module.playerrecords.table').'.created_at',
                config('module.playerrecords.table').'.updated_at',
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
        if (Playerrecord::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.playerrecords.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Playerrecord $playerrecord
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Playerrecord $playerrecord, array $input)
    {
    	if ($playerrecord->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.playerrecords.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Playerrecord $playerrecord
     * @throws GeneralException
     * @return bool
     */
    public function delete(Playerrecord $playerrecord)
    {
        if ($playerrecord->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.playerrecords.delete_error'));
    }
}
