<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAddressAPIRequest;
use App\Http\Requests\API\UpdateAddressAPIRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AddressController
 * @package App\Http\Controllers\API
 */

class AddressAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Address::class, 'address');
    }
    /**
     * Display a listing of the Address.
     * GET|HEAD /addresses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Address::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $addresses = $query->get();

        return $this->sendResponse($addresses->toArray(), 'Addresses retrieved successfully');
    }

    /**
     * Store a newly created Address in storage.
     * POST /addresses
     *
     * @param CreateAddressAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressAPIRequest $request)
    {
        $input = $request->all();

        /** @var Address $address */
        $address = Address::create($input);

        return $this->sendResponse($address->toArray(), 'Address saved successfully');
    }

    /**
     * Display the specified Address.
     * GET|HEAD /addresses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Address $address)
    {
        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        return $this->sendResponse($address->toArray(), 'Address retrieved successfully');
    }

    /**
     * Update the specified Address in storage.
     * PUT/PATCH /addresses/{id}
     *
     * @param int $id
     * @param UpdateAddressAPIRequest $request
     *
     * @return Response
     */
    public function update(Address $address, UpdateAddressAPIRequest $request)
    {
        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        $address->fill($request->all());
        $address->save();

        return $this->sendResponse($address->toArray(), 'Address updated successfully');
    }

    /**
     * Remove the specified Address from storage.
     * DELETE /addresses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Address $address)
    {
        if (empty($address)) {
            return $this->sendError('Address not found');
        }

        $address->delete();

        return $this->sendSuccess('Address deleted successfully');
    }
}
