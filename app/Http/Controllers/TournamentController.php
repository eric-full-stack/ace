<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Flash;
use Response;

class TournamentController extends AppBaseController
{
    /**
     * Display a listing of the Tournament.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Tournament $tournaments */
        $tournaments = Tournament::all();

        return view('tournaments.index')
            ->with('tournaments', $tournaments);
    }

    /**
     * Show the form for creating a new Tournament.
     *
     * @return Response
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created Tournament in storage.
     *
     * @param CreateTournamentRequest $request
     *
     * @return Response
     */
    public function store(CreateTournamentRequest $request)
    {
        $input = $request->all();

        /** @var Tournament $tournament */
        $tournament = Tournament::create($input);

        Flash::success('Tournament saved successfully.');

        return redirect(route('tournaments.index'));
    }

    /**
     * Display the specified Tournament.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tournament $tournament */
        $tournament = Tournament::find($id);

        if (empty($tournament)) {
            Flash::error('Tournament not found');

            return redirect(route('tournaments.index'));
        }

        return view('tournaments.show')->with('tournament', $tournament);
    }

    /**
     * Show the form for editing the specified Tournament.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Tournament $tournament */
        $tournament = Tournament::find($id);

        if (empty($tournament)) {
            Flash::error('Tournament not found');

            return redirect(route('tournaments.index'));
        }

        return view('tournaments.edit')->with('tournament', $tournament);
    }

    /**
     * Update the specified Tournament in storage.
     *
     * @param int $id
     * @param UpdateTournamentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTournamentRequest $request)
    {
        /** @var Tournament $tournament */
        $tournament = Tournament::find($id);

        if (empty($tournament)) {
            Flash::error('Tournament not found');

            return redirect(route('tournaments.index'));
        }

        $tournament->fill($request->all());
        $tournament->save();

        Flash::success('Tournament updated successfully.');

        return redirect(route('tournaments.index'));
    }

    /**
     * Remove the specified Tournament from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tournament $tournament */
        $tournament = Tournament::find($id);

        if (empty($tournament)) {
            Flash::error('Tournament not found');

            return redirect(route('tournaments.index'));
        }

        $tournament->delete();

        Flash::success('Tournament deleted successfully.');

        return redirect(route('tournaments.index'));
    }
}
