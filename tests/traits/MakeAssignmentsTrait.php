<?php

use Faker\Factory as Faker;
use App\Models\Assignments;
use App\Repositories\AssignmentsRepository;

trait MakeAssignmentsTrait
{
    /**
     * Create fake instance of Assignments and save it in database
     *
     * @param array $assignmentsFields
     * @return Assignments
     */
    public function makeAssignments($assignmentsFields = [])
    {
        /** @var AssignmentsRepository $assignmentsRepo */
        $assignmentsRepo = App::make(AssignmentsRepository::class);
        $theme = $this->fakeAssignmentsData($assignmentsFields);
        return $assignmentsRepo->create($theme);
    }

    /**
     * Get fake instance of Assignments
     *
     * @param array $assignmentsFields
     * @return Assignments
     */
    public function fakeAssignments($assignmentsFields = [])
    {
        return new Assignments($this->fakeAssignmentsData($assignmentsFields));
    }

    /**
     * Get fake data of Assignments
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAssignmentsData($assignmentsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'users_id' => $fake->randomDigitNotNull,
            'transaction_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $assignmentsFields);
    }
}
