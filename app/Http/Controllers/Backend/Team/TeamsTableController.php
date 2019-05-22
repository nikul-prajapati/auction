<?php

namespace App\Http\Controllers\Backend\Team;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Team\TeamRepository;
use App\Http\Requests\Backend\Team\ManageTeamRequest;

/**
 * Class TeamsTableController.
 */
class TeamsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TeamRepository
     */
    protected $team;

    /**
     * contructor to initialize repository object
     * @param TeamRepository $team;
     */
    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
    }

    /**
     * This method return the data of the model
     * @param ManageTeamRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTeamRequest $request)
    {
        return Datatables::of($this->team->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('Team_name', function ($team) {
                return $team->Team_name;
            })
            ->addColumn('created_at', function ($team) {
                return Carbon::parse($team->created_at)->toDateString();
            })
            
            ->addColumn('actions', function ($team) {
                return $team->action_buttons;
            })
            ->make(true);
    }
}
