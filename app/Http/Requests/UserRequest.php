<?php

namespace App\Http\Requests;
// use App\Http\Requests\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserRequest extends FormRequest
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
       
        $arr = explode('@', $this->route()->getActionName());
        $method = $arr[1]; // The controller method
    
        switch ($method) {
            case 'store':
                return [
                    'name'=>"required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                    'wo_do_so'=>"required|regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                    'phone' => "required|regex:/^([0-9]){10}$/;",
                    'email'=>'required|email|unique:users,email',
                    // 'age'=>'required',
                    'gender'=>'required',
                    'pincode'=>'required',
                    'address'=>'required',
                    'city'=>'required',
                    'state'=>'required',
                    'district'=>'required',
                    'password'=>'required',
                    'phone'=>'required',
                    'blood_type'=>'required',
                ];
               break;
            case 'login':
                return [
                    'email'=>'required|email',
                    'password'=>'required',
                ];
                break;
            case 'getDonorById':
                return ['id'=>'required'];
                break;
            case 'update':
                return [
                    'id'=>'required',
                    // 'name'=>"regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",
                    // 'email'=>'required|email|unique:users,email,'.Auth::user()->id,
                ];
                break;

          default: return [];
        }       
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors(),"status"=>"exception"], 403));
    }

}



