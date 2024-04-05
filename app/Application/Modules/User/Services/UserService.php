<?php

namespace App\Application\Modules\User\Services;

use App\Application\Modules\User\Model\User;
use App\Application\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(private readonly UserRepository $repository)
    {

    }

    public function store(Request $request): bool
    {
        return User::createNewElement($request);
    }
}
