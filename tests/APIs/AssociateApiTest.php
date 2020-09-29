<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Associate;

class AssociateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_associate()
    {
        $associate = factory(Associate::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/associates', $associate
        );

        $this->assertApiResponse($associate);
    }

    /**
     * @test
     */
    public function test_read_associate()
    {
        $associate = factory(Associate::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/associates/'.$associate->id
        );

        $this->assertApiResponse($associate->toArray());
    }

    /**
     * @test
     */
    public function test_update_associate()
    {
        $associate = factory(Associate::class)->create();
        $editedAssociate = factory(Associate::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/associates/'.$associate->id,
            $editedAssociate
        );

        $this->assertApiResponse($editedAssociate);
    }

    /**
     * @test
     */
    public function test_delete_associate()
    {
        $associate = factory(Associate::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/associates/'.$associate->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/associates/'.$associate->id
        );

        $this->response->assertStatus(404);
    }
}
