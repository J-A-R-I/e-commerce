<?php

use App\Models\Role;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('backend'));
    $response->assertRedirect(route('login'));
});

test('admin users can visit the backend', function () {
    $role = Role::firstOrCreate(['name' => 'admin'], ['description' => 'Administrator']);
    $user = User::factory()->create(['role_id' => $role->id]);
    $this->actingAs($user);

    $response = $this->get(route('backend'));
    $response->assertOk();
});
