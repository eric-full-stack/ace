<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssociateRequest;
use App\Http\Requests\UpdateAssociateRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Associate;
use Illuminate\Http\Request;
use Flash;
use Response;

class AssociateController extends AppBaseController
{
    /**
     * Display a listing of the Associate.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Associate $associates */
        $associates = Associate::all();

        return view('associates.index')
            ->with('associates', $associates);
    }

    /**
     * Show the form for creating a new Associate.
     *
     * @return Response
     */
    public function create()
    {
        return view('associates.create');
    }

    /**
     * Store a newly created Associate in storage.
     *
     * @param CreateAssociateRequest $request
     *
     * @return Response
     */
    public function store(CreateAssociateRequest $request)
    {
        $input = $request->all();

        /** @var Associate $associate */
        $associate = Associate::create($input);

        Flash::success('Associate saved successfully.');

        return redirect(route('associates.index'));
    }

    /**
     * Display the specified Associate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Associate $associate */
        $associate = Associate::find($id);

        if (empty($associate)) {
            Flash::error('Associate not found');

            return redirect(route('associates.index'));
        }

        return view('associates.show')->with('associate', $associate);
    }

    /**
     * Show the form for editing the specified Associate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Associate $associate */
        $associate = Associate::find($id);

        if (empty($associate)) {
            Flash::error('Associate not found');

            return redirect(route('associates.index'));
        }

        return view('associates.edit')->with('associate', $associate);
    }

    /**
     * Update the specified Associate in storage.
     *
     * @param int $id
     * @param UpdateAssociateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssociateRequest $request)
    {
        /** @var Associate $associate */
        $associate = Associate::find($id);

        if (empty($associate)) {
            Flash::error('Associate not found');

            return redirect(route('associates.index'));
        }

        $associate->fill($request->all());
        $associate->save();

        Flash::success('Associate updated successfully.');

        return redirect(route('associates.index'));
    }

    /**
     * Remove the specified Associate from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Associate $associate */
        $associate = Associate::find($id);

        if (empty($associate)) {
            Flash::error('Associate not found');

            return redirect(route('associates.index'));
        }

        $associate->delete();

        Flash::success('Associate deleted successfully.');

        return redirect(route('associates.index'));
    }
}
