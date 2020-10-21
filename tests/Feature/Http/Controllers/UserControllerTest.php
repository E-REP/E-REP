<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase {
    public function testUserReceivedComments() {
        $response = $this->get('/api/users/1');

        $response->assertStatus(200);
        $response->assertSeeText('ok');
    }
}
