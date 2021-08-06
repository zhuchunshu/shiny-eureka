<?php

namespace App\Plugins\FuckYou\src\Repositories;

use App\Plugins\FuckYou\src\Models\Fuckyou as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Fuckyou extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
