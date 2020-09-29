<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMatchAPIRequest;
use App\Http\Requests\API\UpdateMatchAPIRequest;
use App\Models\Match;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MatchController
 * @package App\Http\Controllers\API
 */

class MatchAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Match::class, 'match');
    }
    /**
     * Display a listing of the Match.
     * GET|HEAD /matches
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Match::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $matches = $query->get();

        return $this->sendResponse($matches->toArray(), 'Matches retrieved successfully');
    }

    /**
     * Store a newly created Match in storage.
     * POST /matches
     *
     * @param CreateMatchAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchAPIRequest $request)
    {
        $input = $request->all();

        /** @var Match $match */
        $match = Match::create($input);

        return $this->sendResponse($match->toArray(), 'Match saved successfully');
    }

    /**
     * Display the specified Match.
     * GET|HEAD /matches/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Match $match)
    {
        if (empty($match)) {
            return $this->sendError('Match not found');
        }

        return $this->sendResponse($match->toArray(), 'Match retrieved successfully');
    }

    /**
     * Update the specified Match in storage.
     * PUT/PATCH /matches/{id}
     *
     * @param int $id
     * @param UpdateMatchAPIRequest $request
     *
     * @return Response
     */
    public function update(Match $match, UpdateMatchAPIRequest $request)
    {
        if (empty($match)) {
            return $this->sendError('Match not found');
        }

        $match->fill($request->all());
        $match->save();

        return $this->sendResponse($match->toArray(), 'Match updated successfully');
    }

    /**
     * Remove the specified Match from storage.
     * DELETE /matches/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Match $match)
    {
        if (empty($match)) {
            return $this->sendError('Match not found');
        }

        $match->delete();

        return $this->sendSuccess('Match deleted successfully');
    }
}
