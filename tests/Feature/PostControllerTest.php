<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guests_cannot_create_posts()
    {
        // Проверяем, что гости не могут получить доступ к странице создания поста
        $this->get('admin/posts/create')->assertRedirect('/login');

        // Проверяем, что гости не могут отправить создать пост
        $this->post('admin/posts', [
            'title' => 'Test Post',
            'body' => 'Post body',
            'category_id' => '12',
            'tags' => '[12]',
            '_token' => csrf_token()])
            ->assertRedirect('/login');
    }
}
