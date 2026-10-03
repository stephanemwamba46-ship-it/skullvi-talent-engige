<?php
namespace Tests\Feature;
use Tests\TestCase;
class ExampleTest extends TestCase
{
    public function test_homepage_is_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Skullvi Talent Engine');
        $response->assertSee('Postuler maintenant');
    }
    public function test_candidate_application_page_is_accessible(): void
    {
        $response = $this->get('/candidature');
        $response->assertStatus(200);
        $response->assertSee('Déposer une candidature');
    }
}