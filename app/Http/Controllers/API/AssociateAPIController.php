<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssociateAPIRequest;
use App\Http\Requests\API\UpdateAssociateAPIRequest;
use App\Models\Associate;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AssociateController
 * @package App\Http\Controllers\API
 */

class AssociateAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Associate::class, 'associate');
    }
    /**
     * Display a listing of the Associate.
     * GET|HEAD /associates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Associate::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $associates = $query->get();

        return $this->sendResponse($associates->toArray(), 'Associates retrieved successfully');
    }

    /**
     * Store a newly created Associate in storage.
     * POST /associates
     *
     * @param CreateAssociateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAssociateAPIRequest $request)
    {
        $input = $request->all();

        /** @var Associate $associate */
        $associate = Associate::create($input);

        return $this->sendResponse($associate->toArray(), 'Associate saved successfully');
    }

    /**
     * Display the specified Associate.
     * GET|HEAD /associates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Associate $associate)
    {
        if (empty($associate)) {
            return $this->sendError('Associate not found');
        }

        return $this->sendResponse($associate->toArray(), 'Associate retrieved successfully');
    }

    /**
     * Update the specified Associate in storage.
     * PUT/PATCH /associates/{id}
     *
     * @param int $id
     * @param UpdateAssociateAPIRequest $request
     *
     * @return Response
     */
    public function update(Associate $associate, UpdateAssociateAPIRequest $request)
    {
        if (empty($associate)) {
            return $this->sendError('Associate not found');
        }

        $associate->fill($request->all());
        $associate->save();

        return $this->sendResponse($associate->toArray(), 'Associate updated successfully');
    }

    /**
     * Remove the specified Associate from storage.
     * DELETE /associates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Associate $associate)
    {
        if (empty($associate)) {
            return $this->sendError('Associate not found');
        }

        $associate->delete();

        return $this->sendSuccess('Associate deleted successfully');
    }
}
