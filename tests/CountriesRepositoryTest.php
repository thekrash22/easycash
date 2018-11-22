<?php

use App\Models\Countries;
use App\Repositories\CountriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountriesRepositoryTest extends TestCase
{
    use MakeCountriesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CountriesRepository
     */
    protected $countriesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->countriesRepo = App::make(CountriesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCountries()
    {
        $countries = $this->fakeCountriesData();
        $createdCountries = $this->countriesRepo->create($countries);
        $createdCountries = $createdCountries->toArray();
        $this->assertArrayHasKey('id', $createdCountries);
        $this->assertNotNull($createdCountries['id'], 'Created Countries must have id specified');
        $this->assertNotNull(Countries::find($createdCountries['id']), 'Countries with given id must be in DB');
        $this->assertModelData($countries, $createdCountries);
    }

    /**
     * @test read
     */
    public function testReadCountries()
    {
        $countries = $this->makeCountries();
        $dbCountries = $this->countriesRepo->find($countries->id);
        $dbCountries = $dbCountries->toArray();
        $this->assertModelData($countries->toArray(), $dbCountries);
    }

    /**
     * @test update
     */
    public function testUpdateCountries()
    {
        $countries = $this->makeCountries();
        $fakeCountries = $this->fakeCountriesData();
        $updatedCountries = $this->countriesRepo->update($fakeCountries, $countries->id);
        $this->assertModelData($fakeCountries, $updatedCountries->toArray());
        $dbCountries = $this->countriesRepo->find($countries->id);
        $this->assertModelData($fakeCountries, $dbCountries->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCountries()
    {
        $countries = $this->makeCountries();
        $resp = $this->countriesRepo->delete($countries->id);
        $this->assertTrue($resp);
        $this->assertNull(Countries::find($countries->id), 'Countries should not exist in DB');
    }
}
