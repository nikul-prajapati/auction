<?php

namespace App\Repositories\Backend\Neeraj;

use DB;
use Carbon\Carbon;
use App\Models\Neeraj\Neeraj;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NeerajRepository.
 */
class NeerajRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Neeraj::class;

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
                config('module.neerajs.table').'.id',
                config('module.neerajs.table').'.created_at',
                config('module.neerajs.table').'.updated_at',
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
        if (Neeraj::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.neerajs.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Neeraj $neeraj
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Neeraj $neeraj, array $input)
    {
    	if ($neeraj->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.neerajs.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Neeraj $neeraj
     * @throws GeneralException
     * @return bool
     */
    public function delete(Neeraj $neeraj)
    {
        if ($neeraj->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.neerajs.delete_error'));
    }
}
