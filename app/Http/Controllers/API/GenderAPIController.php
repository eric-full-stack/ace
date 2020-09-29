<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGenderAPIRequest;
use App\Http\Requests\API\UpdateGenderAPIRequest;
use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GenderController
 * @package App\Http\Controllers\API
 */

class GenderAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Gender::class, 'gender');
    }
    /**
     * Display a listing of the Gender.
     * GET|HEAD /genders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Gender::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $genders = $query->get();

        return $this->sendResponse($genders->toArray(), 'Genders retrieved successfully');
    }

    /**
     * Store a newly created Gender in storage.
     * POST /genders
     *
     * @param CreateGenderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGenderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Gender $gender */
        $gender = Gender::create($input);

        return $this->sendResponse($gender->toArray(), 'Gender saved successfully');
    }

    /**
     * Display the specified Gender.
     * GET|HEAD /genders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Gender $gender)
    {
        if (empty($gender)) {
            return $this->sendError('Gender not found');
        }

        return $this->sendResponse($gender->toArray(), 'Gender retrieved successfully');
    }

    /**
     * Update the specified Gender in storage.
     * PUT/PATCH /genders/{id}
     *
     * @param int $id
     * @param UpdateGenderAPIRequest $request
     *
     * @return Response
     */
    public function update(Gender $gender, UpdateGenderAPIRequest $request)
    {
        if (empty($gender)) {
            return $this->sendError('Gender not found');
        }

        $gender->fill($request->all());
        $gender->save();

        return $this->sendResponse($gender->toArray(), 'Gender updated successfully');
    }

    /**
     * Remove the specified Gender from storage.
     * DELETE /genders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Gender $gender)
    {
        if (empty($gender)) {
            return $this->sendError('Gender not found');
        }

        $gender->delete();

        return $this->sendSuccess('Gender deleted successfully');
    }
}
