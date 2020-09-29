<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTournamentAPIRequest;
use App\Http\Requests\API\UpdateTournamentAPIRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TournamentController
 * @package App\Http\Controllers\API
 */

class TournamentAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Tournament::class, 'tournament');
    }
    /**
     * Display a listing of the Tournament.
     * GET|HEAD /tournaments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Tournament::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $tournaments = $query->get();

        return $this->sendResponse($tournaments->toArray(), 'Tournaments retrieved successfully');
    }

    /**
     * Store a newly created Tournament in storage.
     * POST /tournaments
     *
     * @param CreateTournamentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTournamentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tournament $tournament */
        $tournament = Tournament::create($input);

        return $this->sendResponse($tournament->toArray(), 'Tournament saved successfully');
    }

    /**
     * Display the specified Tournament.
     * GET|HEAD /tournaments/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Tournament $tournament)
    {
        if (empty($tournament)) {
            return $this->sendError('Tournament not found');
        }

        return $this->sendResponse($tournament->toArray(), 'Tournament retrieved successfully');
    }

    /**
     * Update the specified Tournament in storage.
     * PUT/PATCH /tournaments/{id}
     *
     * @param int $id
     * @param UpdateTournamentAPIRequest $request
     *
     * @return Response
     */
    public function update(Tournament $tournament, UpdateTournamentAPIRequest $request)
    {
        if (empty($tournament)) {
            return $this->sendError('Tournament not found');
        }

        $tournament->fill($request->all());
        $tournament->save();

        return $this->sendResponse($tournament->toArray(), 'Tournament updated successfully');
    }

    /**
     * Remove the specified Tournament from storage.
     * DELETE /tournaments/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Tournament $tournament)
    {
        if (empty($tournament)) {
            return $this->sendError('Tournament not found');
        }

        $tournament->delete();

        return $this->sendSuccess('Tournament deleted successfully');
    }
}
