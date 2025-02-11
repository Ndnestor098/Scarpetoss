<?php

test('Render_Home', function () {
    $response = $this->get(route("home"));

    $response->assertStatus(200);
});
