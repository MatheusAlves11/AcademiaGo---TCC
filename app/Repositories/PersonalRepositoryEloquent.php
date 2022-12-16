<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\personalRepository;
use App\Entities\Personal;
use App\Validators\PersonalValidator;

/**
 * Class PersonalRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PersonalRepositoryEloquent extends BaseRepository implements PersonalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Personal::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PersonalValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
