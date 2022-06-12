<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreSubscriberTest extends TestCase
{

    /**
     * Test that the store subscriber post endpoint works.
     *
     * @return void
     */
    public function test_subscriber_can_subscribe()
    {
        $response = $this->post('/api/v1/subscribers', [
            'email' => 'natghi2018@gmail.com',
            'name' => 'Natghi',
            'status' => 'active',
            'fields' => [
                [
                    'name' => 'first_name',
                    'value' => 'Natghi'
                ],
                [
                    'name' => 'last_name',
                    'value' => 'Nguyen'
                ]
            ]
        ]);

        $response->assertStatus(200);
    }

     /**
     * Test that the update subscriber post endpoint works.
     *
     * @return void
     */
    public function test_subscriber_can_be_update()
    {
        $response = $this->put('/api/v1/subscribers/1', [
            'email' => 'natghi2015@gmail.com',
            'name' => 'Natghi',
            'status' => 'active',
            'fields' => [
                [
                    'name' => 'first_name',
                    'value' => 'Natghi'
                ],
                [
                    'name' => 'last_name',
                    'value' => 'Nguyen'
                ]
            ]
        ]);

        $response->assertStatus(200);
    }

     /**
     * Test that the subscriber list works
     *
     * @return void
     */
    public function test_subscriber_list_works()
    {
        $response = $this->get('/api/v1/subscribers');

        $response->assertStatus(200);
    }

      /**
     * Test that the subscriber detail works
     *
     * @return void
     */
    public function test_subscriber_show_works()
    {
        $response = $this->get('/api/v1/subscribers/1');

        $response->assertStatus(200);
    }


}
