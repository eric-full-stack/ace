<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssociateSportCourtPriceRequest;
use App\Http\Requests\UpdateAssociateSportCourtPriceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AssociateSportCourtPrice;
use Illuminate\Http\Request;
use Flash;
use Response;

class AssociateSportCourtPriceController extends AppBaseController
{
    /**
     * Display a listing of the AssociateSportCourtPrice.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AssociateSportCourtPrice $associateSportCourtPrices */
        $associateSportCourtPrices = AssociateSportCourtPrice::all();

        return view('associate_sport_court_prices.index')
            ->with('associateSportCourtPrices', $associateSportCourtPrices);
    }

    /**
     * Show the form for creating a new AssociateSportCourtPrice.
     *
     * @return Response
     */
    public function create()
    {
        return view('associate_sport_court_prices.create');
    }

    /**
     * Store a newly created AssociateSportCourtPrice in storage.
     *
     * @param CreateAssociateSportCourtPriceRequest $request
     *
     * @return Response
     */
    public function store(CreateAssociateSportCourtPriceRequest $request)
    {
        $input = $request->all();

        /** @var AssociateSportCourtPrice $associateSportCourtPrice */
        $associateSportCourtPrice = AssociateSportCourtPrice::create($input);

        Flash::success('Associate Sport Court Price saved successfully.');

        return redirect(route('associateSportCourtPrices.index'));
    }

    /**
     * Display the specified AssociateSportCourtPrice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AssociateSportCourtPrice $associateSportCourtPrice */
        $associateSportCourtPrice = AssociateSportCourtPrice::find($id);

        if (empty($associateSportCourtPrice)) {
            Flash::error('Associate Sport Court Price not found');

            return redirect(route('associateSportCourtPrices.index'));
        }

        return view('associate_sport_court_prices.show')->with('associateSportCourtPrice', $associateSportCourtPrice);
    }

    /**
     * Show the form for editing the specified AssociateSportCourtPrice.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AssociateSportCourtPrice $associateSportCourtPrice */
        $associateSportCourtPrice = AssociateSportCourtPrice::find($id);

        if (empty($associateSportCourtPrice)) {
            Flash::error('Associate Sport Court Price not found');

            return redirect(route('associateSportCourtPrices.index'));
        }

        return view('associate_sport_court_prices.edit')->with('associateSportCourtPrice', $associateSportCourtPrice);
    }

    /**
     * Update the specified AssociateSportCourtPrice in storage.
     *
     * @param int $id
     * @param UpdateAssociateSportCourtPriceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssociateSportCourtPriceRequest $request)
    {
        /** @var AssociateSportCourtPrice $associateSportCourtPrice */
        $associateSportCourtPrice = AssociateSportCourtPrice::find($id);

        if (empty($associateSportCourtPrice)) {
            Flash::error('Associate Sport Court Price not found');

            return redirect(route('associateSportCourtPrices.index'));
        }

        $associateSportCourtPrice->fill($request->all());
        $associateSportCourtPrice->save();

        Flash::success('Associate Sport Court Price updated successfully.');

        return redirect(route('associateSportCourtPrices.index'));
    }

    /**
     * Remove the specified AssociateSportCourtPrice from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AssociateSportCourtPrice $associateSportCourtPrice */
        $associateSportCourtPrice = AssociateSportCourtPrice::find($id);

        if (empty($associateSportCourtPrice)) {
            Flash::error('Associate Sport Court Price not found');

            return redirect(route('associateSportCourtPrices.index'));
        }

        $associateSportCourtPrice->delete();

        Flash::success('Associate Sport Court Price deleted successfully.');

        return redirect(route('associateSportCourtPrices.index'));
    }
}
