<?php

namespace App\Http\Controllers;

use App\Models\Stakeholder;
use App\Http\Requests\StoreStakeholderRequest;
use App\Http\Requests\UpdateStakeholderRequest;
use App\Models\Crop;
use App\Models\Farm;
use Illuminate\Support\Facades\DB;

class StakeholderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Total number of farms
        $totalFarms = Farm::count();

        // Average farm size
        $averageSize = Farm::average('size');

        // Total employees
        $totalEmployees = Farm::sum(DB::raw('CAST(employees AS UNSIGNED)'));

        // Farming practices distribution
        $farmingPractices = Farm::select('farming_practices', DB::raw('count(*) as count'))
            ->groupBy('farming_practices')
            ->get();

        // Land type distribution
        $landTypes = Farm::select('land_type', DB::raw('count(*) as count'))
            ->groupBy('land_type')
            ->get();

        // Ownership distribution
        $ownershipDistribution = Farm::select('ownership', DB::raw('count(*) as count'))
            ->groupBy('ownership')
            ->get();

        // Water sources distribution
        $waterSourcesDistribution = Farm::select('water_sources', DB::raw('count(*) as count'))
            ->groupBy('water_sources')
            ->get();

        // Establishment year distribution using strftime()
        $establishmentYears = DB::table('farms')
            ->select(DB::raw("strftime('%Y', establishment_date) as year"), DB::raw('count(*) as count'))
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        // Average size by land type
        $averageSizeByLandType = Farm::select('land_type', DB::raw('AVG(size) as average_size'))
            ->groupBy('land_type')
            ->get();

        // Crop popularity
        $cropPopularity = Crop::select('name', DB::raw('count(*) as count'))
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->get();

        // Most common planting dates
        $plantingDates = Crop::select('planting', DB::raw('count(*) as count'))
            ->groupBy('planting')
            ->orderBy('count', 'desc')
            ->get();

        return view('stakeholders.index', compact(
            'totalFarms',
            'averageSize',
            'totalEmployees',
            'farmingPractices',
            'landTypes',
            'ownershipDistribution',
            'waterSourcesDistribution',
            'establishmentYears',
            'averageSizeByLandType',
            'cropPopularity',
            'plantingDates'
        ));
    }
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStakeholderRequest $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(Stakeholder $stakeholder)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stakeholder $stakeholder)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStakeholderRequest $request, Stakeholder $stakeholder)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stakeholder $stakeholder)
    {


    }
}
