<?php

namespace App\Http\Controllers\API;
 
use App\Models\User;
use App\Models\Player;
use App\Models\Associate;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;
use Socialite;

class LoginController extends AppBaseController
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->user();

        $authUser = $this->findOrCreateUser($user, 'google', $request->input("type"));

        Auth::login($authUser, true);
        $token = $authUser->createToken($authUser->provider_id, ['transactions'])->plainTextToken;
        return $this->sendResponse($token, 'Logged successfully');
    }

     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $authUser = $this->findOrCreateUser($user, 'facebook', $request->input("type"));

        Auth::login($authUser, true);
        $token = $authUser->createToken($authUser->provider_id, ['transactions'])->plainTextToken;
        return $this->sendResponse($token, 'Logged successfully');
    }

    
    /**
     * Find User and return or Create User and return
     * @param  Object $user
     * @param  String $provider Returns either Facebook or Google
     * @return array User's data
     */
    private function findOrCreateUser($user, $provider, $type)
    {
        $newUser = User::updateOrCreate(
            ['email' => $user->getEmail()],
            [
                'provider_id' => $user->getId(),
                'oauth2_token' => $user->token,
                'avatar'    => $user->getAvatar(),
                'name'      => $user->getName(),
                'username'  => $user->getNickname(),
                'url'       => 'http://' . $provider . '.com/' . $user->getNickname(),
                'provider'  => $provider
            ]
        );
        $newUser->syncRoles([$type === 'associate' || $type === 'player' ? $type : 'player']);
        return $newUser;
    }
}