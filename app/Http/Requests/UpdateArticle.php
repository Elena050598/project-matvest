<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateArticle extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $id = $this->route('article')->id;
        return [
            'title' =>
                'required',
            'heading' => 'required',
            'annotation' => 'required',

        ];
    }
}
