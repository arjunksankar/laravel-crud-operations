<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Http\Exceptions\HttpResponseException;
use App\IceCream;


/**
 * Class IceCreamRequest.
 */
class IceCreamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = [];
        $unit_cost = '';
        if($this->method() == 'POST'){
            $ice_creams_of_same_brand = IceCream::where('brand',$this->brand)->first();
        } else {
            $ice_creams_of_same_brand = IceCream::where('brand',$this->ice_cream->brand)->where('id','!=',$this->ice_cream->id)->first();
        }
        if($ice_creams_of_same_brand){
            if($ice_creams_of_same_brand->type == "cup"){
                $unit_cost = $ice_creams_of_same_brand->price/4;
            } else if($ice_creams_of_same_brand->type == "cone"){
                $unit_cost = ($ice_creams_of_same_brand->price - 3)/4;
            } else if($ice_creams_of_same_brand->type == "large-cup"){
                $unit_cost = ($ice_creams_of_same_brand->price - 2.5)/4;
            } else if($ice_creams_of_same_brand->type == "large-cone"){
                $unit_cost = ($ice_creams_of_same_brand->price - 5.5)/4;
            }
        } 
        if($this->method() == 'POST'){
            $request['name'] = 'unique:ice_creams|required|max:50|min:3';
            $request['type'] = 'required|max:20';
            $request['brand'] = 'required|max:20';
            if(!empty($unit_cost)){
                if($this->type == 'cup'){
                    $price = 4*$unit_cost;
                } elseif($this->type == 'cone'){
                    $price = (4*$unit_cost) + 3;
                } elseif($this->type == 'large-cup'){
                    $price = (4*$unit_cost) + 2.5;
                } elseif($this->type == 'large-cone'){
                    $price = (4*$unit_cost) + 5.5;
                }
                $request['price'] = 'required|between:0,9999.99|in:'.$price;
            } else {
                $request['price'] = 'required|between:0,9999.99';
            }
        }  else {
            $request['name'] = 'unique:ice_creams,name,'.$this->ice_cream->id.'|required|min:3|max:50';
            $request['type'] = 'required|max:20';
            $request['brand'] = 'required|max:20';
            if(!empty($unit_cost)){
                if($this->ice_cream->type == 'cup'){
                    $price = 4*$unit_cost;
                } elseif($this->ice_cream->type == 'cone'){
                    $price = (4*$unit_cost) + 3;
                } elseif($this->ice_cream->type == 'large-cup'){
                    $price = (4*$unit_cost) + 2.5;
                } elseif($this->ice_cream->type == 'large-cone'){
                    $price = (4*$unit_cost) + 5.5;
                }
                $request['price'] = 'required|between:0,9999.99|in:'.$price;
            } else {
                $request['price'] = 'required|between:0,9999.99';
            }
        }
        return $request;
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.unique' => 'Name must be unique.',
            'brand.required' => 'Brand is required.',
            'brand.unique' => 'The product with the given brand and type already exists.',
            'type.required' => 'Type is required.',
            'price.required'  => 'Price is required.',
            'price.*'  => "Price does'nt satisfy the given algorithm.",
        ];
    }
    // protected function failedValidation(Validator $validator) {
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}
