<?php

namespace App\Http\Controllers\Establishment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Establishment\Address\AddressStoreRequest;
use App\Models\Establishment\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function store(AddressStoreRequest $request)
    {
        $input = $request->validated();

        // Trocar para scoped
        $establishment =  $request->user()->establishments()->findOrFail($request->establishment_id);

        $address = $establishment->address()->find($establishment->address_id);
        if (!empty($address)) {
            $address->update($input);

            return Redirect::back()->with('success', 'Estabelecimento atualizado com sucesso!.');
        }

        $address = Address::create($input);
        $establishment->update([
            'address_id' => $address->id,
        ]);

        return Redirect::back()->with('success', 'Estabelecimento atualizado com sucesso!.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
