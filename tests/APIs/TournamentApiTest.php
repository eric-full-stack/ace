<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Tournament;

class TournamentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tournament()
    {
        $tournament = factory(Tournament::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tournaments', $tournament
        );

        $this->assertApiResponse($tournament);
    }

    /**
     * @test
     */
    public function test_read_tournament()
    {
        $tournament = factory(Tournament::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tournaments/'.$tournament->id
        );

        $this->assertApiResponse($tournament->toArray());
    }

    /**
     * @test
     */
    public function test_update_tournament()
    {
        $tournament = factory(Tournament::class)->create();
        $editedTournament = factory(Tournament::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tournaments/'.$tournament->id,
            $editedTournament
        );

        $this->assertApiResponse($editedTournament);
    }

    /**
     * @test
     */
    public function test_delete_tournament()
    {
        $tournament = factory(Tournament::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tournaments/'.$tournament->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tournaments/'.$tournament->id
        );

        $this->response->assertStatus(404);
    }
}
