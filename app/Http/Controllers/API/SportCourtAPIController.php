<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSportCourtAPIRequest;
use App\Http\Requests\API\UpdateSportCourtAPIRequest;
use App\Models\SportCourt;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SportCourtController
 * @package App\Http\Controllers\API
 */

class SportCourtAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(SportCourt::class, 'sportCourt');
    }
    /**
     * Display a listing of the SportCourt.
     * GET|HEAD /sportCourts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SportCourt::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $sportCourts = $query->get();

        return $this->sendResponse($sportCourts->toArray(), 'Sport Courts retrieved successfully');
    }

    /**
     * Store a newly created SportCourt in storage.
     * POST /sportCourts
     *
     * @param CreateSportCourtAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSportCourtAPIRequest $request)
    {
        $input = $request->all();

        /** @var SportCourt $sportCourt */
        $sportCourt = SportCourt::create($input);

        return $this->sendResponse($sportCourt->toArray(), 'Sport Court saved successfully');
    }

    /**
     * Display the specified SportCourt.
     * GET|HEAD /sportCourts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(SportCourt $sportCourt)
    {
        if (empty($sportCourt)) {
            return $this->sendError('Sport Court not found');
        }

        return $this->sendResponse($sportCourt->toArray(), 'Sport Court retrieved successfully');
    }

    /**
     * Update the specified SportCourt in storage.
     * PUT/PATCH /sportCourts/{id}
     *
     * @param int $id
     * @param UpdateSportCourtAPIRequest $request
     *
     * @return Response
     */
    public function update(SportCourt $sportCourt, UpdateSportCourtAPIRequest $request)
    {
        if (empty($sportCourt)) {
            return $this->sendError('Sport Court not found');
        }

        $sportCourt->fill($request->all());
        $sportCourt->save();

        return $this->sendResponse($sportCourt->toArray(), 'SportCourt updated successfully');
    }

    /**
     * Remove the specified SportCourt from storage.
     * DELETE /sportCourts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(SportCourt $sportCourt)
    {
        if (empty($sportCourt)) {
            return $this->sendError('Sport Court not found');
        }

        $sportCourt->delete();

        return $this->sendSuccess('Sport Court deleted successfully');
    }
}
