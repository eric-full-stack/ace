<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SportCourt;

class SportCourtApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sport_court()
    {
        $sportCourt = factory(SportCourt::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sport_courts', $sportCourt
        );

        $this->assertApiResponse($sportCourt);
    }

    /**
     * @test
     */
    public function test_read_sport_court()
    {
        $sportCourt = factory(SportCourt::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sport_courts/'.$sportCourt->id
        );

        $this->assertApiResponse($sportCourt->toArray());
    }

    /**
     * @test
     */
    public function test_update_sport_court()
    {
        $sportCourt = factory(SportCourt::class)->create();
        $editedSportCourt = factory(SportCourt::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sport_courts/'.$sportCourt->id,
            $editedSportCourt
        );

        $this->assertApiResponse($editedSportCourt);
    }

    /**
     * @test
     */
    public function test_delete_sport_court()
    {
        $sportCourt = factory(SportCourt::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sport_courts/'.$sportCourt->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sport_courts/'.$sportCourt->id
        );

        $this->response->assertStatus(404);
    }
}
