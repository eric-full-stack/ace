<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssociateSportCourtPriceAPIRequest;
use App\Http\Requests\API\UpdateAssociateSportCourtPriceAPIRequest;
use App\Models\AssociateSportCourtPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AssociateSportCourtPriceController
 * @package App\Http\Controllers\API
 */

class AssociateSportCourtPriceAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(AssociateSportCourtPrice::class, 'associateSportCourtPrice');
    }
    /**
     * Display a listing of the AssociateSportCourtPrice.
     * GET|HEAD /associateSportCourtPrices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = AssociateSportCourtPrice::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $associateSportCourtPrices = $query->get();

        return $this->sendResponse($associateSportCourtPrices->toArray(), 'Associate Sport Court Prices retrieved successfully');
    }

    /**
     * Store a newly created AssociateSportCourtPrice in storage.
     * POST /associateSportCourtPrices
     *
     * @param CreateAssociateSportCourtPriceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAssociateSportCourtPriceAPIRequest $request)
    {
        $input = $request->all();

        /** @var AssociateSportCourtPrice $associateSportCourtPrice */
        $associateSportCourtPrice = AssociateSportCourtPrice::create($input);

        return $this->sendResponse($associateSportCourtPrice->toArray(), 'Associate Sport Court Price saved successfully');
    }

    /**
     * Display the specified AssociateSportCourtPrice.
     * GET|HEAD /associateSportCourtPrices/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(AssociateSportCourtPrice $associateSportCourtPrice)
    {
        if (empty($associateSportCourtPrice)) {
            return $this->sendError('Associate Sport Court Price not found');
        }

        return $this->sendResponse($associateSportCourtPrice->toArray(), 'Associate Sport Court Price retrieved successfully');
    }

    /**
     * Update the specified AssociateSportCourtPrice in storage.
     * PUT/PATCH /associateSportCourtPrices/{id}
     *
     * @param int $id
     * @param UpdateAssociateSportCourtPriceAPIRequest $request
     *
     * @return Response
     */
    public function update(AssociateSportCourtPrice $associateSportCourtPrice, UpdateAssociateSportCourtPriceAPIRequest $request)
    {
        if (empty($associateSportCourtPrice)) {
            return $this->sendError('Associate Sport Court Price not found');
        }

        $associateSportCourtPrice->fill($request->all());
        $associateSportCourtPrice->save();

        return $this->sendResponse($associateSportCourtPrice->toArray(), 'AssociateSportCourtPrice updated successfully');
    }

    /**
     * Remove the specified AssociateSportCourtPrice from storage.
     * DELETE /associateSportCourtPrices/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(AssociateSportCourtPrice $associateSportCourtPrice)
    {
        if (empty($associateSportCourtPrice)) {
            return $this->sendError('Associate Sport Court Price not found');
        }

        $associateSportCourtPrice->delete();

        return $this->sendSuccess('Associate Sport Court Price deleted successfully');
    }
}
