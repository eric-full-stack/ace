<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Address;
use Illuminate\Http\Request;
use Flash;
use Response;

class AddressController extends AppBaseController
{
    /**
     * Display a listing of the Address.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Address $addresses */
        $addresses = Address::all();

        return view('addresses.index')
            ->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        /** @var Address $address */
        $address = Address::create($input);

        Flash::success('Address saved successfully.');

        return redirect(route('addresses.index'));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Address $address */
        $address = Address::find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Address $address */
        $address = Address::find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        return view('addresses.edit')->with('address', $address);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        /** @var Address $address */
        $address = Address::find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $address->fill($request->all());
        $address->save();

        Flash::success('Address updated successfully.');

        return redirect(route('addresses.index'));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Address $address */
        $address = Address::find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('addresses.index'));
        }

        $address->delete();

        Flash::success('Address deleted successfully.');

        return redirect(route('addresses.index'));
    }
}
