<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeamAPIRequest;
use App\Http\Requests\API\UpdateTeamAPIRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TeamController
 * @package App\Http\Controllers\API
 */

class TeamAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Team::class, 'team');
    }
    /**
     * Display a listing of the Team.
     * GET|HEAD /teams
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Team::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $teams = $query->get();

        return $this->sendResponse($teams->toArray(), 'Teams retrieved successfully');
    }

    /**
     * Store a newly created Team in storage.
     * POST /teams
     *
     * @param CreateTeamAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamAPIRequest $request)
    {
        $input = $request->all();

        /** @var Team $team */
        $team = Team::create($input);

        return $this->sendResponse($team->toArray(), 'Team saved successfully');
    }

    /**
     * Display the specified Team.
     * GET|HEAD /teams/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Team $team)
    {
        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        return $this->sendResponse($team->toArray(), 'Team retrieved successfully');
    }

    /**
     * Update the specified Team in storage.
     * PUT/PATCH /teams/{id}
     *
     * @param int $id
     * @param UpdateTeamAPIRequest $request
     *
     * @return Response
     */
    public function update(Team $team, UpdateTeamAPIRequest $request)
    {
        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team->fill($request->all());
        $team->save();

        return $this->sendResponse($team->toArray(), 'Team updated successfully');
    }

    /**
     * Remove the specified Team from storage.
     * DELETE /teams/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Team $team)
    {
        if (empty($team)) {
            return $this->sendError('Team not found');
        }

        $team->delete();

        return $this->sendSuccess('Team deleted successfully');
    }
}
