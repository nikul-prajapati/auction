<?php

namespace App\Http\Controllers\Backend\Player_Record;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Player_Record\PlayerrecordRepository;
use App\Http\Requests\Backend\Player_Record\ManagePlayerrecordRequest;

/**
 * Class PlayerrecordsTableController.
 */
class PlayerrecordsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerrecordRepository
     */
    protected $playerrecord;

    /**
     * contructor to initialize repository object
     * @param PlayerrecordRepository $playerrecord;
     */
    public function __construct(PlayerrecordRepository $playerrecord)
    {
        $this->playerrecord = $playerrecord;
    }

    /**
     * This method return the data of the model
     * @param ManagePlayerrecordRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePlayerrecordRequest $request)
    {
        return Datatables::of($this->playerrecord->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($playerrecord) {
                return Carbon::parse($playerrecord->created_at)->toDateString();
            })
            ->addColumn('actions', function ($playerrecord) {
                return $playerrecord->action_buttons;
            })
            ->make(true);
    }
}
