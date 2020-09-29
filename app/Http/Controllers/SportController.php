<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSportRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Sport;
use Illuminate\Http\Request;
use Flash;
use Response;

class SportController extends AppBaseController
{
    /**
     * Display a listing of the Sport.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Sport $sports */
        $sports = Sport::all();

        return view('sports.index')
            ->with('sports', $sports);
    }

    /**
     * Show the form for creating a new Sport.
     *
     * @return Response
     */
    public function create()
    {
        return view('sports.create');
    }

    /**
     * Store a newly created Sport in storage.
     *
     * @param CreateSportRequest $request
     *
     * @return Response
     */
    public function store(CreateSportRequest $request)
    {
        $input = $request->all();

        /** @var Sport $sport */
        $sport = Sport::create($input);

        Flash::success('Sport saved successfully.');

        return redirect(route('sports.index'));
    }

    /**
     * Display the specified Sport.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sport $sport */
        $sport = Sport::find($id);

        if (empty($sport)) {
            Flash::error('Sport not found');

            return redirect(route('sports.index'));
        }

        return view('sports.show')->with('sport', $sport);
    }

    /**
     * Show the form for editing the specified Sport.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Sport $sport */
        $sport = Sport::find($id);

        if (empty($sport)) {
            Flash::error('Sport not found');

            return redirect(route('sports.index'));
        }

        return view('sports.edit')->with('sport', $sport);
    }

    /**
     * Update the specified Sport in storage.
     *
     * @param int $id
     * @param UpdateSportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSportRequest $request)
    {
        /** @var Sport $sport */
        $sport = Sport::find($id);

        if (empty($sport)) {
            Flash::error('Sport not found');

            return redirect(route('sports.index'));
        }

        $sport->fill($request->all());
        $sport->save();

        Flash::success('Sport updated successfully.');

        return redirect(route('sports.index'));
    }

    /**
     * Remove the specified Sport from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sport $sport */
        $sport = Sport::find($id);

        if (empty($sport)) {
            Flash::error('Sport not found');

            return redirect(route('sports.index'));
        }

        $sport->delete();

        Flash::success('Sport deleted successfully.');

        return redirect(route('sports.index'));
    }
}
