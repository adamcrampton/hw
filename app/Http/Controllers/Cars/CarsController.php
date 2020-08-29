<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Auth\User;
use App\Models\Cars\Car;
use App\Models\Taxonomy\Series;
use App\Models\Taxonomy\Type;

class CarsController extends Controller
{
    private $car;
    private $series;
    private $type;
    private $user;

    public function __construct(
        Car $car, 
        Series $series,
        Type $type,
        User $user
    )
    {
        $this->car = $car;
        $this->series = $series;
        $this->type = $type;
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
        $years = [];

        for ($i=1968; $i < 2022; $i++):
            $years[$i] = $i;
        endfor;

        $series = $this->series->all()->pluck('name', 'id');
        $type = $this->type->all()->pluck('name', 'id');

        return view('cars.create', [
            'series' => $series,
            'type' => $type,
            'years' => $years
        ]);
    }

    /**
     * Store a newly created car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->car->create([
            'number' => $request->number ?? 0,
            'name' => $request->name ?? 'TBC',
            'colour' => $request->colour ?? 'TBC',
            'year' => $request->year ?? date('Y'),
            'series_id' => $request->series,
            'type_id' => $request->type,
            'series_number' => $request->series_number ?? 0,
            'treasure_hunt' => $request->has('treasure_hunt') ?? 0,
            'super_treasure_hunt' => $request->has('super_treasure_hunt') ?? 0,
            'notes' => $request->notes ?? null
        ]);

        return redirect()->route('index')->with([
            'success' => 'Successfully created car'
        ]);
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

        for ($i=1968; $i < 2022; $i++):
            $years[$i] = $i;
        endfor;

        $series = $this->series->all()->pluck('name', 'id');
        $type = $this->type->all()->pluck('name', 'id');

        return view('cars.edit', [
            'car' => $car,
            'series' => $series,
            'type' => $type,
            'years' => $years
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

        $car->update([
            'name' => $request->name ?? 'TBC',
            'number' => $request->number ?? 0,
            'colour' => $request->colour ?? 'TBC',
            'year' => $request->year ?? date('Y'),
            'series_id' => $request->series,
            'type_id' => $request->type,
            'series_number' => $request->series_number ?? 0,
            'treasure_hunt' => $request->has('treasure_hunt') ?? 0,
            'super_treasure_hunt' => $request->has('super_treasure_hunt') ?? 0,
            'notes' => $request->notes ?? null
        ]);

        return redirect()->back()->with([
            'success' => 'Successfully updated car'
        ]);
    }
}
