<?php

use App\Models\Assignments;
use App\Repositories\AssignmentsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssignmentsRepositoryTest extends TestCase
{
    use MakeAssignmentsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AssignmentsRepository
     */
    protected $assignmentsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->assignmentsRepo = App::make(AssignmentsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAssignments()
    {
        $assignments = $this->fakeAssignmentsData();
        $createdAssignments = $this->assignmentsRepo->create($assignments);
        $createdAssignments = $createdAssignments->toArray();
        $this->assertArrayHasKey('id', $createdAssignments);
        $this->assertNotNull($createdAssignments['id'], 'Created Assignments must have id specified');
        $this->assertNotNull(Assignments::find($createdAssignments['id']), 'Assignments with given id must be in DB');
        $this->assertModelData($assignments, $createdAssignments);
    }

    /**
     * @test read
     */
    public function testReadAssignments()
    {
        $assignments = $this->makeAssignments();
        $dbAssignments = $this->assignmentsRepo->find($assignments->id);
        $dbAssignments = $dbAssignments->toArray();
        $this->assertModelData($assignments->toArray(), $dbAssignments);
    }

    /**
     * @test update
     */
    public function testUpdateAssignments()
    {
        $assignments = $this->makeAssignments();
        $fakeAssignments = $this->fakeAssignmentsData();
        $updatedAssignments = $this->assignmentsRepo->update($fakeAssignments, $assignments->id);
        $this->assertModelData($fakeAssignments, $updatedAssignments->toArray());
        $dbAssignments = $this->assignmentsRepo->find($assignments->id);
        $this->assertModelData($fakeAssignments, $dbAssignments->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAssignments()
    {
        $assignments = $this->makeAssignments();
        $resp = $this->assignmentsRepo->delete($assignments->id);
        $this->assertTrue($resp);
        $this->assertNull(Assignments::find($assignments->id), 'Assignments should not exist in DB');
    }
}
