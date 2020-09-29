<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSportCourtRequest;
use App\Http\Requests\UpdateSportCourtRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\SportCourt;
use Illuminate\Http\Request;
use Flash;
use Response;

class SportCourtController extends AppBaseController
{
    /**
     * Display a listing of the SportCourt.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SportCourt $sportCourts */
        $sportCourts = SportCourt::all();

        return view('sport_courts.index')
            ->with('sportCourts', $sportCourts);
    }

    /**
     * Show the form for creating a new SportCourt.
     *
     * @return Response
     */
    public function create()
    {
        return view('sport_courts.create');
    }

    /**
     * Store a newly created SportCourt in storage.
     *
     * @param CreateSportCourtRequest $request
     *
     * @return Response
     */
    public function store(CreateSportCourtRequest $request)
    {
        $input = $request->all();

        /** @var SportCourt $sportCourt */
        $sportCourt = SportCourt::create($input);

        Flash::success('Sport Court saved successfully.');

        return redirect(route('sportCourts.index'));
    }

    /**
     * Display the specified SportCourt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SportCourt $sportCourt */
        $sportCourt = SportCourt::find($id);

        if (empty($sportCourt)) {
            Flash::error('Sport Court not found');

            return redirect(route('sportCourts.index'));
        }

        return view('sport_courts.show')->with('sportCourt', $sportCourt);
    }

    /**
     * Show the form for editing the specified SportCourt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SportCourt $sportCourt */
        $sportCourt = SportCourt::find($id);

        if (empty($sportCourt)) {
            Flash::error('Sport Court not found');

            return redirect(route('sportCourts.index'));
        }

        return view('sport_courts.edit')->with('sportCourt', $sportCourt);
    }

    /**
     * Update the specified SportCourt in storage.
     *
     * @param int $id
     * @param UpdateSportCourtRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSportCourtRequest $request)
    {
        /** @var SportCourt $sportCourt */
        $sportCourt = SportCourt::find($id);

        if (empty($sportCourt)) {
            Flash::error('Sport Court not found');

            return redirect(route('sportCourts.index'));
        }

        $sportCourt->fill($request->all());
        $sportCourt->save();

        Flash::success('Sport Court updated successfully.');

        return redirect(route('sportCourts.index'));
    }

    /**
     * Remove the specified SportCourt from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SportCourt $sportCourt */
        $sportCourt = SportCourt::find($id);

        if (empty($sportCourt)) {
            Flash::error('Sport Court not found');

            return redirect(route('sportCourts.index'));
        }

        $sportCourt->delete();

        Flash::success('Sport Court deleted successfully.');

        return redirect(route('sportCourts.index'));
    }
}
