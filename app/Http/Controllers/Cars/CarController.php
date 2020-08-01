<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Auth\User;
use App\Models\Cars\Car;

class CarController extends Controller
{
    private $car;
    private $user;

    public function __construct(Car $car, User $user)
    {
        $this->car = $car;
        $this->user = $user;
    }

    /**
     * Display a listing of cars.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user->find(Auth::user()->id);

        return view('index', [
            'cars' => $this->car->with(['type', 'series'])
                                ->get(),
            'user' => $user,
            'owned' => $this->car->whereHas('owners', function ($q) use ($user) {
                                    $q->where('users_id', $user->id);                  
                                })
                            ->get()
        ]);
    }

    /**
     * Show the form for creating a new car.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create', []);
    }

    /**
     * Store a newly created car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified car.
     *
     * @param  \App\Models\Cars\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = $this->car->find($id);

        return view('cars.show', [
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param  \App\Models\Cars\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = $this->car->find($id);

        return view('cars.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cars\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = $this->car->find($id);
    }
}
