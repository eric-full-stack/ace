<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Player;
use Illuminate\Http\Request;
use Flash;
use Response;

class PlayerController extends AppBaseController
{
    /**
     * Display a listing of the Player.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Player $players */
        $players = Player::all();

        return view('players.index')
            ->with('players', $players);
    }

    /**
     * Show the form for creating a new Player.
     *
     * @return Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created Player in storage.
     *
     * @param CreatePlayerRequest $request
     *
     * @return Response
     */
    public function store(CreatePlayerRequest $request)
    {
        $input = $request->all();

        /** @var Player $player */
        $player = Player::create($input);

        Flash::success('Player saved successfully.');

        return redirect(route('players.index'));
    }

    /**
     * Display the specified Player.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Player $player */
        $player = Player::find($id);

        if (empty($player)) {
            Flash::error('Player not found');

            return redirect(route('players.index'));
        }

        return view('players.show')->with('player', $player);
    }

    /**
     * Show the form for editing the specified Player.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Player $player */
        $player = Player::find($id);

        if (empty($player)) {
            Flash::error('Player not found');

            return redirect(route('players.index'));
        }

        return view('players.edit')->with('player', $player);
    }

    /**
     * Update the specified Player in storage.
     *
     * @param int $id
     * @param UpdatePlayerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlayerRequest $request)
    {
        /** @var Player $player */
        $player = Player::find($id);

        if (empty($player)) {
            Flash::error('Player not found');

            return redirect(route('players.index'));
        }

        $player->fill($request->all());
        $player->save();

        Flash::success('Player updated successfully.');

        return redirect(route('players.index'));
    }

    /**
     * Remove the specified Player from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Player $player */
        $player = Player::find($id);

        if (empty($player)) {
            Flash::error('Player not found');

            return redirect(route('players.index'));
        }

        $player->delete();

        Flash::success('Player deleted successfully.');

        return redirect(route('players.index'));
    }
}
