<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssociateGalleryRequest;
use App\Http\Requests\UpdateAssociateGalleryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AssociateGallery;
use Illuminate\Http\Request;
use Flash;
use Response;

class AssociateGalleryController extends AppBaseController
{
    /**
     * Display a listing of the AssociateGallery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AssociateGallery $associateGalleries */
        $associateGalleries = AssociateGallery::all();

        return view('associate_galleries.index')
            ->with('associateGalleries', $associateGalleries);
    }

    /**
     * Show the form for creating a new AssociateGallery.
     *
     * @return Response
     */
    public function create()
    {
        return view('associate_galleries.create');
    }

    /**
     * Store a newly created AssociateGallery in storage.
     *
     * @param CreateAssociateGalleryRequest $request
     *
     * @return Response
     */
    public function store(CreateAssociateGalleryRequest $request)
    {
        $input = $request->all();

        /** @var AssociateGallery $associateGallery */
        $associateGallery = AssociateGallery::create($input);

        Flash::success('Associate Gallery saved successfully.');

        return redirect(route('associateGalleries.index'));
    }

    /**
     * Display the specified AssociateGallery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AssociateGallery $associateGallery */
        $associateGallery = AssociateGallery::find($id);

        if (empty($associateGallery)) {
            Flash::error('Associate Gallery not found');

            return redirect(route('associateGalleries.index'));
        }

        return view('associate_galleries.show')->with('associateGallery', $associateGallery);
    }

    /**
     * Show the form for editing the specified AssociateGallery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AssociateGallery $associateGallery */
        $associateGallery = AssociateGallery::find($id);

        if (empty($associateGallery)) {
            Flash::error('Associate Gallery not found');

            return redirect(route('associateGalleries.index'));
        }

        return view('associate_galleries.edit')->with('associateGallery', $associateGallery);
    }

    /**
     * Update the specified AssociateGallery in storage.
     *
     * @param int $id
     * @param UpdateAssociateGalleryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssociateGalleryRequest $request)
    {
        /** @var AssociateGallery $associateGallery */
        $associateGallery = AssociateGallery::find($id);

        if (empty($associateGallery)) {
            Flash::error('Associate Gallery not found');

            return redirect(route('associateGalleries.index'));
        }

        $associateGallery->fill($request->all());
        $associateGallery->save();

        Flash::success('Associate Gallery updated successfully.');

        return redirect(route('associateGalleries.index'));
    }

    /**
     * Remove the specified AssociateGallery from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AssociateGallery $associateGallery */
        $associateGallery = AssociateGallery::find($id);

        if (empty($associateGallery)) {
            Flash::error('Associate Gallery not found');

            return redirect(route('associateGalleries.index'));
        }

        $associateGallery->delete();

        Flash::success('Associate Gallery deleted successfully.');

        return redirect(route('associateGalleries.index'));
    }
}
