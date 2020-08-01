<?php

namespace App\Http\Controllers\Cars\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        if (!$request->has('car') || !$request->has('user')):
            return response()->json([
                'status' => 'error',
                'message' => 'Request must contain car and user values',
                'data' => null
            ], 400);
        endif;

        try {
            $user = $this->user->find($request->user);
    
            if (intval($request->owned) === 1):
                $user->cars()->detach([$request->car]);
            else:
                $user->cars()->attach([$request->car]);
            endif;

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully updated user cars',
                'data' => $user->cars
            ], 200);
        } catch (\Throwable $th) {
            Log::debug('Error updating user cars: ' . $th->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Could not update user cars - check log',
                'data' => null
            ], 500);
        }

    }
}
