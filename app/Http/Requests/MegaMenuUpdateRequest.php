<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MegaMenuUpdateRequest extends FormRequest
{
		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array
		 */
		public function rules(): array
		{
				$id = $this->get('id');
				return [
						'title'     => ['required', 'unique:mega_menu,title,' . $id, 'max:255'],
						'url'       => ['required'],
						'sort'      => ['required', 'numeric'],
						'bold'      => ['boolean'],
						'uppercase' => ['boolean'],
						'external'  => ['boolean'],
						'active'    => ['boolean'],
				];
		}

		/**
		 * Determine if the user is authorized to make this request.
		 *
		 * @return bool
		 */
		public function authorize(): bool
		{
				return true;
		}
}
