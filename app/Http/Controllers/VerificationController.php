<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;


class VerificationController extends Controller
{
    use VerifiesEmails;

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        // Find the user by ID and verification hash
        $user = User::find($request->route('id'));

        // Verify the hash
        if (! $user || ! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        // Check if the email has already been verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user-account.index');
        }

        // Mark the email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Update the user's status to active
        $user->status = 1;
        $user->save();

        // Fire the Verified event
        event(new Verified($user));

        // Redirect to a designated success page
        return redirect()->route('user-account.index');
    }
}
