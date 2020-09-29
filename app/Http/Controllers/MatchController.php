<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Match;
use Illuminate\Http\Request;
use Flash;
use Response;

class MatchController extends AppBaseController
{
    /**
     * Display a listing of the Match.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Match $matches */
        $matches = Match::all();

        return view('matches.index')
            ->with('matches', $matches);
    }

    /**
     * Show the form for creating a new Match.
     *
     * @return Response
     */
    public function create()
    {
        return view('matches.create');
    }

    /**
     * Store a newly created Match in storage.
     *
     * @param CreateMatchRequest $request
     *
     * @return Response
     */
    public function store(CreateMatchRequest $request)
    {
        $input = $request->all();

        /** @var Match $match */
        $match = Match::create($input);

        Flash::success('Match saved successfully.');

        return redirect(route('matches.index'));
    }

    /**
     * Display the specified Match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Match $match */
        $match = Match::find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }

        return view('matches.show')->with('match', $match);
    }

    /**
     * Show the form for editing the specified Match.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Match $match */
        $match = Match::find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }

        return view('matches.edit')->with('match', $match);
    }

    /**
     * Update the specified Match in storage.
     *
     * @param int $id
     * @param UpdateMatchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatchRequest $request)
    {
        /** @var Match $match */
        $match = Match::find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }

        $match->fill($request->all());
        $match->save();

        Flash::success('Match updated successfully.');

        return redirect(route('matches.index'));
    }

    /**
     * Remove the specified Match from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Match $match */
        $match = Match::find($id);

        if (empty($match)) {
            Flash::error('Match not found');

            return redirect(route('matches.index'));
        }

        $match->delete();

        Flash::success('Match deleted successfully.');

        return redirect(route('matches.index'));
    }
}
