<?php

namespace App\Http\Controllers;

use App\Http\Requests\IceCreamRequest;
use App\Http\Controllers\Controller;
use App\IceCream;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class IceCreamController extends Controller
{
    /**
     * Create function
     *
     * @param IceCreamRequest $request
     * @return void
     */
    public function create()
    {
        return view('ice_creams.create');
    }

    /**
     * Create function
     *
     * @param IceCreamRequest $request
     * @return void
     */
    public function store(IceCreamRequest $request)
    {
        $iceCream = IceCream::create($request->all());
        return redirect()->route('ice-creams.list')->with('toastr', ['type'=>'success','text'=>'Ice Cream added successfully']);
    }
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $ice_creams = IceCream::orderByDesc('updated_at')->paginate(10);
        return view('ice_creams.index',compact('ice_creams'));
    }
    /**
     * Edit function
     *
     * @param IceCream $ice_cream
     * @return void
     */
    public function edit(IceCream $ice_cream)
    {
        return view('ice_creams.edit',compact('ice_cream'));
    }
    /**
     * Update function
     *
     * @param IceCream $ice_cream, IceCreamRequest $request
     * @return void
     */
    public function update(IceCream $ice_cream,IceCreamRequest $request)
    {
        $request_data = [];
        $request_data['name'] = $request->name;
        $request_data['brand'] = $request->brand;
        $request_data['type'] = $request->type;
        $request_data['price'] = $request->price;
        $ice_cream->update($request_data);
        return redirect()->route('ice-creams.list')->with('toastr', ['type'=>'success','text'=>'Ice Cream updated successfully',]);
    }
    /**
     * Show function
     *
     * @param IceCream $ice_cream
     * @return void
     */
    public function show(IceCream $ice_cream)
    {
        return view('ice_creams.show',compact('ice_cream'));
    }
    /**
     * Destroy function
     *
     * @param IceCream $ice_cream
     * @return void
     */
    public function destroy(IceCream $ice_cream)
    {
        $ice_cream->delete();
        return redirect()->route('ice-creams.list')->with('toastr', ['type'=>'success','text'=>'Ice Cream deleted successfully',]);
    }
}
