<?php

namespace App\Application\Modules\User\Services;

use App\Application\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(private readonly UserRepository $repository)
    {

    }

    public function store(Request $request)
    {

    }
}
