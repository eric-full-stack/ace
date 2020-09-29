<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssociateGalleryAPIRequest;
use App\Http\Requests\API\UpdateAssociateGalleryAPIRequest;
use App\Models\AssociateGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AssociateGalleryController
 * @package App\Http\Controllers\API
 */

class AssociateGalleryAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(AssociateGallery::class, 'associateGallery');
    }
    /**
     * Display a listing of the AssociateGallery.
     * GET|HEAD /associateGalleries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = AssociateGallery::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $associateGalleries = $query->get();

        return $this->sendResponse($associateGalleries->toArray(), 'Associate Galleries retrieved successfully');
    }

    /**
     * Store a newly created AssociateGallery in storage.
     * POST /associateGalleries
     *
     * @param CreateAssociateGalleryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAssociateGalleryAPIRequest $request)
    {
        $input = $request->all();

        /** @var AssociateGallery $associateGallery */
        $associateGallery = AssociateGallery::create($input);

        return $this->sendResponse($associateGallery->toArray(), 'Associate Gallery saved successfully');
    }

    /**
     * Display the specified AssociateGallery.
     * GET|HEAD /associateGalleries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(AssociateGallery $associateGallery)
    {
        if (empty($associateGallery)) {
            return $this->sendError('Associate Gallery not found');
        }

        return $this->sendResponse($associateGallery->toArray(), 'Associate Gallery retrieved successfully');
    }

    /**
     * Update the specified AssociateGallery in storage.
     * PUT/PATCH /associateGalleries/{id}
     *
     * @param int $id
     * @param UpdateAssociateGalleryAPIRequest $request
     *
     * @return Response
     */
    public function update(AssociateGallery $associateGallery, UpdateAssociateGalleryAPIRequest $request)
    {
        if (empty($associateGallery)) {
            return $this->sendError('Associate Gallery not found');
        }

        $associateGallery->fill($request->all());
        $associateGallery->save();

        return $this->sendResponse($associateGallery->toArray(), 'AssociateGallery updated successfully');
    }

    /**
     * Remove the specified AssociateGallery from storage.
     * DELETE /associateGalleries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(AssociateGallery $associateGallery)
    {
        if (empty($associateGallery)) {
            return $this->sendError('Associate Gallery not found');
        }

        $associateGallery->delete();

        return $this->sendSuccess('Associate Gallery deleted successfully');
    }
}
