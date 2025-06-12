<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'surname' => $this->surname,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'birthdate_explicit' => explicitDate($this->birthdate),
            'age' => !empty($this->birthdate) ? $this->age() : null,
            'city' => $this->city,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'p_o_box' => $this->p_o_box,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
            'password' => $this->password,
            'email_verified_at' => $this->email_verified_at,
            'phone_verified_at' => $this->phone_verified_at,
            'remember_token' => $this->remember_token,
            'api_token' => $this->api_token,
            'avatar_url' => $this->avatar_url != null ? getWebURL() . '/public/storage/' . $this->avatar_url : getWebURL() . '/assets/img/avatar-' . $this->gender . '.png',
            'promo_code' => $this->promo_code,
            'email_frequency' => $this->email_frequency,
            'two_factor_secret' => $this->two_factor_secret,
            'two_factor_recovery_codes' => $this->two_factor_recovery_codes,
            'two_factor_confirmed_at' => $this->two_factor_confirmed_at,
            'two_factor_phone_confirmed_at' => $this->two_factor_phone_confirmed_at,
            'is_incognito' => $this->is_incognito,
            'country' => Country::make($this->whenLoaded('country')),
            'currency' => Currency::make($this->whenLoaded('currency')),
            'status' => Status::make($this->whenLoaded('status')),
            'roles' => Role::collection($this->roles),
            'favorite_works' => $this->favoriteWorks(),
            'unpaid_consultations' => $this->unpaidConsultations(),
            'total_unpaid_consultations' => formatDecimalNumber($this->totalUnpaidConsultations()),
            'has_valid_consultation' => $this->hasValidConsultation(),
            'valid_consultations' => $this->validConsultations(),
            'pending_consultations' => $this->pendingConsultations(),
            'unpaid_subscriptions' => $this->unpaidSubscriptions(),
            'total_unpaid_subscriptions' => formatDecimalNumber($this->totalUnpaidSubscriptions()),
            'has_valid_subscription' => $this->hasValidSubscription(),
            'valid_subscriptions' => $this->validSubscriptions(),
            'pending_subscriptions' => $this->pendingSubscriptions(),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'country_id' => $this->country_id,
            'currency_id' => $this->currency_id,
            'status_id' => $this->status_id
        ];
    }
}
