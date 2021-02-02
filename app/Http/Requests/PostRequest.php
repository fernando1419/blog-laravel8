<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
      $post           = $this->route()->parameter('post');
      $slugValidation = 'required|unique:posts';

      if ($post) {
         $slugValidation .= ',slug,' . $post->id;
      }

      $rules = [
       'name'   => 'required',
       'slug'   => $slugValidation,
       'status' => 'required|in:1,2',
       'file'   => 'image'
      ];

      if ($this->status == 2) {
         $rules = array_merge($rules, [
         'category_id' => 'required',
         'tags'        => 'required',
         'extract'     => 'required',
         'body'        => 'required',
       ]);
      }

      return $rules;
   }
}
