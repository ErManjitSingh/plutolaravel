<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;
use App\Models\District;
use App\Models\City;
use App\Models\Locationsite;
use App\Models\ActivityPrice;
use Illuminate\Http\Request;

class LocationsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = ActivityPrice::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $districts = District::all();
        return view('admin.locationsite',compact('countries','states','cities','districts','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'dist' => 'required',
            'city' => 'required',
            'lsite' => 'required',
        ]);

        $location = Locationsite::where('location_site', $request->lsite)->first();
        if ($location == Null) {
            $location = new Locationsite();
            $location->country_id = $request->country;
            $location->state_id = $request->state;
            $location->district_id = $request->dist;
            $location->city_id = $request->city;
            $location->location_site = $request->lsite;
            $location->save();
            session()->flash('success', 'new Location added successfully');
            return redirect()->back();
        }
        session()->flash('error', 'Location already exist');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
