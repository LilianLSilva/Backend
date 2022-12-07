<?php

namespace App\Services;

use App\Repositories\PeopleLocalRepository;
use Illuminate\Http\Request;

class PeopleService
{
    private $peopleLocalRepository;

    public function __construct(PeopleLocalRepository $peopleLocalRepository)
    {
        $this->peopleLocalRepository = $peopleLocalRepository;
    }

    public function getPerson(int $id)
    {
        return $this->peopleLocalRepository->getPerson($id);
    }

    public function getPeople(Request $request)
    {
        return $this->peopleLocalRepository->all($request);
    }

}
