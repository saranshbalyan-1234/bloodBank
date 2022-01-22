<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UserNotificationRequest extends FormRequest
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
            case 'readNotification':
                return [
                    'notification_id'=>'required',
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



