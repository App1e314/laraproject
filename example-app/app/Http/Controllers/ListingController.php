<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
       
        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
               'listings' => Listing::mostRecent()
               ->filter($filters)
               ->withoutSold()
               ->paginate(10)
               ->withQueryString()
            ]
        );
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {

        $listing->load(['images']);
        $offer = !Auth::user() ?
            null : $listing->offers()->byMe()->first();

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
                'offerMade' => $offer
            ]
        );
    }

    
    /**
     * Remove the specified resource from storage.
     */
    
}
