<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSportAPIRequest;
use App\Http\Requests\API\UpdateSportAPIRequest;
use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SportController
 * @package App\Http\Controllers\API
 */

class SportAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Sport::class, 'sport');
    }
    /**
     * Display a listing of the Sport.
     * GET|HEAD /sports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Sport::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $sports = $query->get();

        return $this->sendResponse($sports->toArray(), 'Sports retrieved successfully');
    }

    /**
     * Store a newly created Sport in storage.
     * POST /sports
     *
     * @param CreateSportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSportAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sport $sport */
        $sport = Sport::create($input);

        return $this->sendResponse($sport->toArray(), 'Sport saved successfully');
    }

    /**
     * Display the specified Sport.
     * GET|HEAD /sports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Sport $sport)
    {
        if (empty($sport)) {
            return $this->sendError('Sport not found');
        }

        return $this->sendResponse($sport->toArray(), 'Sport retrieved successfully');
    }

    /**
     * Update the specified Sport in storage.
     * PUT/PATCH /sports/{id}
     *
     * @param int $id
     * @param UpdateSportAPIRequest $request
     *
     * @return Response
     */
    public function update(Sport $sport, UpdateSportAPIRequest $request)
    {
        if (empty($sport)) {
            return $this->sendError('Sport not found');
        }

        $sport->fill($request->all());
        $sport->save();

        return $this->sendResponse($sport->toArray(), 'Sport updated successfully');
    }

    /**
     * Remove the specified Sport from storage.
     * DELETE /sports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Sport $sport)
    {
        if (empty($sport)) {
            return $this->sendError('Sport not found');
        }

        $sport->delete();

        return $this->sendSuccess('Sport deleted successfully');
    }
}
