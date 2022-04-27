<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Nette\Utils\Json;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'twitter' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'socialmedia' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $acounts = ['twitter', 'github'];
            $social_media = [];

            for ($i=0; $i < count($acounts); $i++) {
                if (!empty($input[$acounts[$i]])) {
                    $social_media = array_merge($social_media, [$acounts[$i] => $input[$acounts[$i]]]);
                }
            }

            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'twitter' => $input['twitter'],
                'github' => $input['github'],
                'socialmedia' => json_encode($social_media)
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'twitter' => $input['twitter'],
            'github' => $input['github'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
