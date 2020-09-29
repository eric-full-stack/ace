<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sport;

class SportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sport()
    {
        $sport = factory(Sport::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sports', $sport
        );

        $this->assertApiResponse($sport);
    }

    /**
     * @test
     */
    public function test_read_sport()
    {
        $sport = factory(Sport::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sports/'.$sport->id
        );

        $this->assertApiResponse($sport->toArray());
    }

    /**
     * @test
     */
    public function test_update_sport()
    {
        $sport = factory(Sport::class)->create();
        $editedSport = factory(Sport::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sports/'.$sport->id,
            $editedSport
        );

        $this->assertApiResponse($editedSport);
    }

    /**
     * @test
     */
    public function test_delete_sport()
    {
        $sport = factory(Sport::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sports/'.$sport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sports/'.$sport->id
        );

        $this->response->assertStatus(404);
    }
}
