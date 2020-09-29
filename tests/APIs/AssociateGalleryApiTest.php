<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AssociateGallery;

class AssociateGalleryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_associate_gallery()
    {
        $associateGallery = factory(AssociateGallery::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/associate_galleries', $associateGallery
        );

        $this->assertApiResponse($associateGallery);
    }

    /**
     * @test
     */
    public function test_read_associate_gallery()
    {
        $associateGallery = factory(AssociateGallery::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/associate_galleries/'.$associateGallery->id
        );

        $this->assertApiResponse($associateGallery->toArray());
    }

    /**
     * @test
     */
    public function test_update_associate_gallery()
    {
        $associateGallery = factory(AssociateGallery::class)->create();
        $editedAssociateGallery = factory(AssociateGallery::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/associate_galleries/'.$associateGallery->id,
            $editedAssociateGallery
        );

        $this->assertApiResponse($editedAssociateGallery);
    }

    /**
     * @test
     */
    public function test_delete_associate_gallery()
    {
        $associateGallery = factory(AssociateGallery::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/associate_galleries/'.$associateGallery->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/associate_galleries/'.$associateGallery->id
        );

        $this->response->assertStatus(404);
    }
}
