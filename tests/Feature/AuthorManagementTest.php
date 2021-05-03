<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;
use Tests\TestCase;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_author_can_be_created()
    {
        $this->post('/authors', $this->data());

        $author = Author::all();
        $this->assertCount('1', $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('2005/05/05', $author->first()->dob->format('Y/m/d'));
    }

    /** @test */
    public function a_name_is_required()
    {
        $response = $this->post('/authors', array_merge($this->data(), array("name" => "")));

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_dob_is_required()
    {
        $response = $this->post('/authors/', array_merge($this->data(), ['dob' => '']));

        $response->assertSessionHasErrors('dob');
    }

    /**
     * @return string[]
     */
    private function data(): array
    {
        return [
            'name' => 'Author Name',
            'dob' => '05/05/2005'
        ];
    }
}
