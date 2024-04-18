<?php

namespace App\Http\Controllers;

use App\Models\DentistsData;
use App\Models\PatientsData;
use App\Models\PhilippineBarangays;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\PhilippineProvinces;
use App\Models\PhilippineCities;
use App\Models\Service;
use App\Models\UsersData;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // reference to provinces data
    public function patientReferences(Request $request){
        return PatientsData::query()
            ->select('user_id', 'last_name', 'first_name')
            ->orderBy('last_name')
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('last_name', 'like', "%{$request->search}%"),
                fn (Builder $query) => $query->where('user_id', 'like', "%{$request->search}%"),
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('user_id', $request->input('selected', [])),
            )
            ->get();
    }

    //reference to doctors data
    public function doctorReferences(Request $request){
        return DentistsData::query()
            ->select('id', 'last_name', 'first_name')
            ->orderBy('last_name')
            ->when($request->search, fn (Builder $query) => $query->where('last_name', 'like', "%{$request->search}%"),
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', []))
            )
            ->get();
    }

    public function serviceReferences(Request $request){
        return Service::query()
            ->select('id', 'name', 'price')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"),
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', []))
            )
            ->get();
    }

    // reference to provinces data
    public function provinceReferences(Request $request){
        return PhilippineProvinces::query()
            ->select('id', 'province_description')
            ->orderBy('province_description')
            ->when(
                $request->search,
                fn (Builder $query) => $query->where('province_description', 'like', "%{$request->search}%"),
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get();
    }

    // reference to cities data
    public function cityReferences(Request $request){
        return PhilippineCities::query()
            ->select('id', 'city_municipality_description')
            ->orderBy('city_municipality_description')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('city_municipality_description', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )

            ->get();
    }

    // reference to cities data
    public function barangayReferences(Request $request){
        return PhilippineBarangays::query()
            ->select('id', 'barangay_description')
            ->orderBy('barangay_description')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('barangay_description', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->limit(10)
            ->get();
    }
}
