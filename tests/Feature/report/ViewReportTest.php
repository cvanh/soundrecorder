<?php

namespace Tests\Feature\Auth;

use App\Models\Report;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ViewReportTest extends TestCase
{
    use RefreshDatabase;

    // public function test_email_verification_screen_can_be_rendered(): void
    // {
    //     $user = User::factory()->create([
    //         'email_verified_at' => null,
    //     ]);

    //     $response = $this->actingAs($user)->get('/verify-email');

    //     $response->assertStatus(200);
    // }

    public function test_page_can_be_viewed(): void
    {
        $user = Report::factory()->create([
            'id' => 0,
            'type' => "sound",
            'description' => "super description",
            "filename" => "_U4A1486 FINAL WEB.jpg",
            "original_name" => "_U4A1486 FINAL WEB.jpg",
            'file_path' => "reportFile/PJ5iDjDYPo0mqoBYia74ju39DSLWeXWsCVP6JxNq.jpg",
            'created_at' => "2024-03-20 21:01:01",
            "updated_at" => "2024-03-20 21:01:01"
        ]);

        Event::fake();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(route('dashboard', absolute: false) . '?verified=1');
    }
}
