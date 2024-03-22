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
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // User::fake();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

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

        $report = 

        Report::fake();

        $response = $this->actingAs($this->user)->withSession(["banned" => false])->get(route('report.view', ["id" => 0]));
        dd($response->dump());

        $response->assertStatus(200);
        // $response->assert(route('index', absolute: false));
    }
}