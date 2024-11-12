<?php

namespace App\Providers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('can-subscribe', function (User $user, Room $room) {
            return $room->participants->where('participant_id', $user->id)->first() === null;
        });
        Gate::define('can-unsubscribe', function (User $user, Room $room) {
            return $room->participants->where('participant_id', $user->id)->first() !== null;
        });
        Gate::define('can-send-message', function (User $user, Room $room) {
            return $room->participants->where('participant_id', $user->id)->first();
        });

        Gate::define('can-delete-room', function (User $user, Room $room) {
            return $user->id === $room->admin_id;
        });
        Gate::define('can-edit-room', function (User $user, Room $room) {
            return $user->id === $room->admin_id;
        });
    }
}
