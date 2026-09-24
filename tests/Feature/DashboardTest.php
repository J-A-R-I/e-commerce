<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('backend'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the backend', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('backend'));
    $response->assertOk();
});
