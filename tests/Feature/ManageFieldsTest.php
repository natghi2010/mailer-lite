<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageFieldsTest extends TestCase
{
    use RefreshDatabase;

     /**
     * Test fields can be listed
     *
     * @return void
     */
    public function test_field_can_be_searched_by_subscriber_id()
    {
        $response = $this->get('/api/v1/subscribers/{id}/fields');

        $response->assertStatus(200);
    }

    /**
     * Test fields can be listed
     *
     * @return void
     */
    public function test_field_can_be_listed()
    {
        $response = $this->get('/api/v1/fields');

        $response->assertStatus(200);
    }

     /**
     * new fields can be created
     *
     * @return void
     */
    public function test_field_can_be_created()
    {
        $response = $this->post('/api/v1/fields', [
            'title' => 'title',
            'type'=> 'boolean'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test fields can be updated
     *
     * @return void
     */
    public function test_field_can_be_updated()
    {
        $response = $this->put('/api/v1/fields/1', [
            'title' => 'first_name',
            'type' => 'boolean'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test fields can be deleted
     *
     * @return void
     */
    public function test_field_can_be_deleted()
    {
        $response = $this->delete('/api/v1/fields/1');

        $response->assertStatus(200);
    }

}
