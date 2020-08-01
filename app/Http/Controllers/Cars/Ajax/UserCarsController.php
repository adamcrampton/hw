<?php

namespace App\Http\Controllers\Cars\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Auth\User;

class UserCarsController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Toggle whether car ownership for user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function toggleOwnership(Request $request)
    {
        $car = $request->car;
        $user = $this->user->find($request->user);

        $user->cars()->sync([$car]);
    }
    
}
