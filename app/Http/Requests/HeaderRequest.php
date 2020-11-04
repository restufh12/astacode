<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
        return [
             'about_us'            => 'required',
             'why_us'              => 'required',
             'skills'              => 'required',
             'services'            => 'required',
             'call_to_action'      => 'required',
             'portfolios'          => 'required',
             'teams'               => 'required',
             'pricing'             => 'required',
             'faqs'                => 'required',
             'testimonials'        => 'required',
             'articles'            => 'required',
             'contact'             => 'required',
             'join_our_newsletter' => 'required',
             'our_social_network'  => 'required'
        ];
    }
}
