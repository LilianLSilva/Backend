<?php

namespace App\Repositories;


use App\Models\People;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PeopleLocalRepository extends BaseRepository
{
    public function __construct(People $people)
    {
        parent::__construct($people);
    }

    public function getPerson(int $id)
    {
        return $this->model->where('people_id', '=', "{$id}")->first();
    }

    public function all(Request $request)
    {
        if (($request->get('offset') !== null) && ($request->get('limit') !== null)){
            return $this->model->offset($request->get('offset'))
                ->limit($request->get('limit'))
                ->get();
        } else {
            return $this->model->all();
        }
    }
}
