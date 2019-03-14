<?php

namespace App\Http\Controllers\Backend\Player_Information;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Player_Information\PlayerinformationRepository;
use App\Http\Requests\Backend\Player_Information\ManagePlayerinformationRequest;

/**
 * Class PlayerinformationsTableController.
 */
class PlayerinformationsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerinformationRepository
     */
    protected $playerinformation;

    /**
     * contructor to initialize repository object
     * @param PlayerinformationRepository $playerinformation;
     */
    public function __construct(PlayerinformationRepository $playerinformation)
    {
        $this->playerinformation = $playerinformation;
    }

    /**
     * This method return the data of the model
     * @param ManagePlayerinformationRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePlayerinformationRequest $request)
    {
        return Datatables::of($this->playerinformation->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($playerinformation) {
                return Carbon::parse($playerinformation->created_at)->toDateString();
            })
            ->addColumn('actions', function ($playerinformation) {
                return $playerinformation->action_buttons;
            })
            ->make(true);
    }
}
