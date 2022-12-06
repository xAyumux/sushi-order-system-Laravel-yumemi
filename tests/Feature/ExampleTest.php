<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_making_an_api_request()
    {
        $response = $this->postJson('/api/user', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }

    /**
     * 基本的な機能テストの例
     *
     * @return void
     */
    public function test_fluent_json()
    {
        $response = $this->getJson('/users/1');

        $response
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('id', 1)
                    ->where('name', 'Victoria Faith')
                    ->whereNot('status', 'pending')
                    ->has('data')
                    ->hasAll(['message', 'code'])
                    ->missing('password')
                    ->etc()
            );

        $response
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->has('meta')
                    ->has('users', 3)
                    ->has(
                        'users.0',
                        fn ($json) =>
                        $json->where('id', 1)
                            ->where('name', 'Victoria Faith')
                            ->missing('password')
                            ->etc()
                    )
            );

        $response->assertJson(
            fn (AssertableJson $json) =>
            $json->whereType('id', 'integer')
                ->whereAllType([
                    'users.0.name' => 'string',
                    'meta' => 'array'
                ])
        );

        $response->assertJson(
            fn (AssertableJson $json) =>
            $json->whereType('name', 'string|null')
                ->whereType('id', ['string', 'integer'])
        );
    }
}
