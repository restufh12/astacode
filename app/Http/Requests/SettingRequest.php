<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'company_name' => 'required|max:255',
            'company_logo' => 'image',
            'company_address' => 'required',
            'company_email' => 'required|max:255',
            'company_tel' => 'required|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'link_twitter' => 'required|max:255',
            'link_instagram' => 'required|max:255',
            'link_facebook' => 'required|max:255',
            'link_linkedin' => 'required|max:255',
            'link_skype' => 'required|max:255',
            'slogan' => 'required',
            'sub_slogan' => 'required',
            'video_url' => 'required',
            'about_us' => 'required',
            'company_wa' => 'required|max:255',
            'google_maps_iframe' => 'required',
        ];
    }
}
