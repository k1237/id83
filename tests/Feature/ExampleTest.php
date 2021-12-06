<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        //トップページに正しくアクセスできてるかチェック
        $response = $this->get('/');
        $response->assertStatus(200);

        //ページ存在アクセスできない(302)
        $response = $this->get('/home');
        $response->assertStatus(302);


        $response = $this->get('/idea');
        $response->assertStatus(302);


        $response = $this->get('/schedule');
        $response->assertStatus(302);


        $response = $this->get('/excuted');
        $response->assertStatus(302);

        //Vue-routerを使用しているので302
        $response = $this->get('/no_route');
        $response->assertStatus(302);


        //ユーザーがログインした状態でアクセスできるのかチェック
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/home');


        $response = $this->get('/idea');
        $response->assertStatus(200);


        $response = $this->get('/schedule');
        $response->assertStatus(200);


        $response = $this->get('/excuted');
        $response->assertStatus(200);


        //Vue-routerを使用しているので200
        $response = $this->get('/no_route');
        $response->assertStatus(200);
    }
}
