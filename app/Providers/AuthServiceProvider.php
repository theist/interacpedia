<?php namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('update-challenge', function ($user, $challenge) {
            return $user->admin || ($user->id === $challenge->user_id);
        });
        $gate->define('delete-challenge', function ($user, $challenge) {
            return $user->admin;
        });
        $gate->define('delete-comment', function ($user, $comment) {
            return  ($user->id === $comment->user->id);
        });
        $gate->define('view-teamdetails', function ($user, $team) {
            return  ($user->admin
                    || $user->mentors->count() > 0
                    || $user->id == $team->course->user->id
                    || ($team->users->contains( function ( $key, $value )
                        {
                            return $value->id == Auth::user()->id;
                        })
                )
            );
        });
        $gate->define('view-challengedetails', function ($user, $challenge) {
            return  $user->inChallenge($challenge->id);
        });
        $gate->define('view-eventdetails', function ($user, $event) {
            return  $user->admin;
        });
        $gate->define('view-coursedetails', function ($user, $course) {
            return  ($user->admin
                || ($course->mentors->contains( function ( $key, $value )
                    {
                        return $value->user->id == Auth::user()->id;
                    })
                ) || $user->id == $course->user->id
                || ($course->students->contains( function ( $key, $value )
                    {
                        return $value->id == Auth::user()->id;
                    } )
                )
            );
        });
    }
}