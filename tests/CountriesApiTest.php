<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountriesApiTest extends TestCase
{
    use MakeCountriesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCountries()
    {
        $countries = $this->fakeCountriesData();
        $this->json('POST', '/api/v1/countries', $countries);

        $this->assertApiResponse($countries);
    }

    /**
     * @test
     */
    public function testReadCountries()
    {
        $countries = $this->makeCountries();
        $this->json('GET', '/api/v1/countries/'.$countries->id);

        $this->assertApiResponse($countries->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCountries()
    {
        $countries = $this->makeCountries();
        $editedCountries = $this->fakeCountriesData();

        $this->json('PUT', '/api/v1/countries/'.$countries->id, $editedCountries);

        $this->assertApiResponse($editedCountries);
    }

    /**
     * @test
     */
    public function testDeleteCountries()
    {
        $countries = $this->makeCountries();
        $this->json('DELETE', '/api/v1/countries/'.$countries->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/countries/'.$countries->id);

        $this->assertResponseStatus(404);
    }
}
