<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGenderRequest;
use App\Http\Requests\UpdateGenderRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Gender;
use Illuminate\Http\Request;
use Flash;
use Response;

class GenderController extends AppBaseController
{
    /**
     * Display a listing of the Gender.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Gender $genders */
        $genders = Gender::all();

        return view('genders.index')
            ->with('genders', $genders);
    }

    /**
     * Show the form for creating a new Gender.
     *
     * @return Response
     */
    public function create()
    {
        return view('genders.create');
    }

    /**
     * Store a newly created Gender in storage.
     *
     * @param CreateGenderRequest $request
     *
     * @return Response
     */
    public function store(CreateGenderRequest $request)
    {
        $input = $request->all();

        /** @var Gender $gender */
        $gender = Gender::create($input);

        Flash::success('Gender saved successfully.');

        return redirect(route('genders.index'));
    }

    /**
     * Display the specified Gender.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Gender $gender */
        $gender = Gender::find($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('genders.index'));
        }

        return view('genders.show')->with('gender', $gender);
    }

    /**
     * Show the form for editing the specified Gender.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Gender $gender */
        $gender = Gender::find($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('genders.index'));
        }

        return view('genders.edit')->with('gender', $gender);
    }

    /**
     * Update the specified Gender in storage.
     *
     * @param int $id
     * @param UpdateGenderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGenderRequest $request)
    {
        /** @var Gender $gender */
        $gender = Gender::find($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('genders.index'));
        }

        $gender->fill($request->all());
        $gender->save();

        Flash::success('Gender updated successfully.');

        return redirect(route('genders.index'));
    }

    /**
     * Remove the specified Gender from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Gender $gender */
        $gender = Gender::find($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('genders.index'));
        }

        $gender->delete();

        Flash::success('Gender deleted successfully.');

        return redirect(route('genders.index'));
    }
}
