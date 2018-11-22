<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssignmentsApiTest extends TestCase
{
    use MakeAssignmentsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAssignments()
    {
        $assignments = $this->fakeAssignmentsData();
        $this->json('POST', '/api/v1/assignments', $assignments);

        $this->assertApiResponse($assignments);
    }

    /**
     * @test
     */
    public function testReadAssignments()
    {
        $assignments = $this->makeAssignments();
        $this->json('GET', '/api/v1/assignments/'.$assignments->id);

        $this->assertApiResponse($assignments->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAssignments()
    {
        $assignments = $this->makeAssignments();
        $editedAssignments = $this->fakeAssignmentsData();

        $this->json('PUT', '/api/v1/assignments/'.$assignments->id, $editedAssignments);

        $this->assertApiResponse($editedAssignments);
    }

    /**
     * @test
     */
    public function testDeleteAssignments()
    {
        $assignments = $this->makeAssignments();
        $this->json('DELETE', '/api/v1/assignments/'.$assignments->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/assignments/'.$assignments->id);

        $this->assertResponseStatus(404);
    }
}
