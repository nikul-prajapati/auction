<?php

namespace App\Http\Controllers\Backend\Playerrecords_User;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Playerrecords_User\PlayerrecordsuserRepository;
use App\Http\Requests\Backend\Playerrecords_User\ManagePlayerrecordsuserRequest;

/**
 * Class PlayerrecordsusersTableController.
 */
class PlayerrecordsusersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerrecordsuserRepository
     */
    protected $playerrecordsuser;

    /**
     * contructor to initialize repository object
     * @param PlayerrecordsuserRepository $playerrecordsuser;
     */
    public function __construct(PlayerrecordsuserRepository $playerrecordsuser)
    {
        $this->playerrecordsuser = $playerrecordsuser;
    }

    /**
     * This method return the data of the model
     * @param ManagePlayerrecordsuserRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePlayerrecordsuserRequest $request)
    {
        return Datatables::of($this->playerrecordsuser->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($playerrecordsuser) {
                return Carbon::parse($playerrecordsuser->created_at)->toDateString();
            })
            ->addColumn('actions', function ($playerrecordsuser) {
                return $playerrecordsuser->action_buttons;
            })
            ->make(true);
    }
}
