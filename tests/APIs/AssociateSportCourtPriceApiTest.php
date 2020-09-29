<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AssociateSportCourtPrice;

class AssociateSportCourtPriceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_associate_sport_court_price()
    {
        $associateSportCourtPrice = factory(AssociateSportCourtPrice::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/associate_sport_court_prices', $associateSportCourtPrice
        );

        $this->assertApiResponse($associateSportCourtPrice);
    }

    /**
     * @test
     */
    public function test_read_associate_sport_court_price()
    {
        $associateSportCourtPrice = factory(AssociateSportCourtPrice::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/associate_sport_court_prices/'.$associateSportCourtPrice->id
        );

        $this->assertApiResponse($associateSportCourtPrice->toArray());
    }

    /**
     * @test
     */
    public function test_update_associate_sport_court_price()
    {
        $associateSportCourtPrice = factory(AssociateSportCourtPrice::class)->create();
        $editedAssociateSportCourtPrice = factory(AssociateSportCourtPrice::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/associate_sport_court_prices/'.$associateSportCourtPrice->id,
            $editedAssociateSportCourtPrice
        );

        $this->assertApiResponse($editedAssociateSportCourtPrice);
    }

    /**
     * @test
     */
    public function test_delete_associate_sport_court_price()
    {
        $associateSportCourtPrice = factory(AssociateSportCourtPrice::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/associate_sport_court_prices/'.$associateSportCourtPrice->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/associate_sport_court_prices/'.$associateSportCourtPrice->id
        );

        $this->response->assertStatus(404);
    }
}
