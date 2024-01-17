<?php

namespace App\Http\Controllers;

use App\Http\Resources\HouseCollection;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    private $allowedFilterNames = ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = House::query();
        $query->when(request()->filled('filter'), function ($query) {
            $filterStrings = explode(',', request('filter'));
            foreach ($filterStrings as $string) {
                if ([$filterName, $filterValue] = explode(':', $string)) {
                    if (in_array(trim($filterName), $this->allowedFilterNames)) {
                        switch ($filterName) {
                            case 'name':
                                $query->where('name', 'like' , $filterValue);
                                break;
                            case 'price':
                                [$priceMin, $priceMax] = explode('-', $filterValue);
                                $priceMin *= 1000;
                                $priceMax *= 1000;
                                $query->where('price', '>', (int)$priceMin);
                                $query->where('price', '<', (int)$priceMax);
                                break;
                            default:
                                $query->where($filterName, $filterValue);
                        }

                    }
                };
            }
        });
        return new HouseCollection($query->paginate(10));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return House::findOrFail((int)$id);
    }

}
