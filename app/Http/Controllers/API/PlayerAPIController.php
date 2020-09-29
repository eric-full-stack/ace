<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlayerAPIRequest;
use App\Http\Requests\API\UpdatePlayerAPIRequest;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlayerController
 * @package App\Http\Controllers\API
 */

class PlayerAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->authorizeResource(Player::class, 'player');
    }
    /**
     * Display a listing of the Player.
     * GET|HEAD /players
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Player::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $players = $query->get();

        return $this->sendResponse($players->toArray(), 'Players retrieved successfully');
    }

    /**
     * Store a newly created Player in storage.
     * POST /players
     *
     * @param CreatePlayerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePlayerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Player $player */
        $player = Player::create($input);

        return $this->sendResponse($player->toArray(), 'Player saved successfully');
    }

    /**
     * Display the specified Player.
     * GET|HEAD /players/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(Player $player)
    {
        if (empty($player)) {
            return $this->sendError('Player not found');
        }

        return $this->sendResponse($player->toArray(), 'Player retrieved successfully');
    }

    /**
     * Update the specified Player in storage.
     * PUT/PATCH /players/{id}
     *
     * @param int $id
     * @param UpdatePlayerAPIRequest $request
     *
     * @return Response
     */
    public function update(Player $player, UpdatePlayerAPIRequest $request)
    {
        if (empty($player)) {
            return $this->sendError('Player not found');
        }

        $player->fill($request->all());
        $player->save();

        return $this->sendResponse($player->toArray(), 'Player updated successfully');
    }

    /**
     * Remove the specified Player from storage.
     * DELETE /players/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy(Player $player)
    {
        if (empty($player)) {
            return $this->sendError('Player not found');
        }

        $player->delete();

        return $this->sendSuccess('Player deleted successfully');
    }
}
