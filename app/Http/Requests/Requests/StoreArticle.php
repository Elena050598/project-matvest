<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreArticle extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'required',
            'heading' => 'required',
            'annotation' => 'required',
        ];
    }
}
