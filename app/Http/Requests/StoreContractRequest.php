<?php

namespace App\Http\Requests;

use App\Models\Contract;
use App\Rules\CnpjRule;
use App\Rules\CpfRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
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
        $requestValues = $this->request->all();
        $rules = [
            'email' => ['required', 'email'],
            'type' => ['required'],
            'property_id' => ['required'],
            'document' => ['required'],
            'name' => ['required'],
        ];

        if (isset($requestValues['type']) && $requestValues['type']) {
            $rules['document'][] = $requestValues['type'] === Contract::TYPE_PERSON ? new CpfRule : new CnpjRule;
        }

        return $rules;
    }


    public function attributes()
    {
        return [
            'property_id' => 'Propriedade',
        ];
    }
}
