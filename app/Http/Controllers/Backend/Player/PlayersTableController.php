<?php

namespace App\Http\Controllers\Backend\Player;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Player\PlayerRepository;
use App\Http\Requests\Backend\Player\ManagePlayerRequest;

/**
 * Class PlayersTableController.
 */
class PlayersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PlayerRepository
     */
    protected $player;

    /**
     * contructor to initialize repository object
     * @param PlayerRepository $player;
     */
    public function __construct(PlayerRepository $player)
    {
        $this->player = $player;
    }

    /**
     * This method return the data of the model
     * @param ManagePlayerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePlayerRequest $request)
    {
        return Datatables::of($this->player->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($player) {
                return Carbon::parse($player->created_at)->toDateString();
            })
            ->addColumn('actions', function ($player) {
                return $player->action_buttons;
            })
            ->make(true);
    }
}
