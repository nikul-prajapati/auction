<?php

namespace App\Repositories\Backend\Detail;

use DB;
use Carbon\Carbon;
use App\Models\Detail\Detail;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailRepository.
 */
class DetailRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Detail::class;

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
                config('module.details.table').'.id',
                config('module.details.table').'.created_at',
                config('module.details.table').'.updated_at',
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
        if (Detail::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.details.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Detail $detail
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Detail $detail, array $input)
    {
    	if ($detail->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.details.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Detail $detail
     * @throws GeneralException
     * @return bool
     */
    public function delete(Detail $detail)
    {
        if ($detail->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.details.delete_error'));
    }
}
