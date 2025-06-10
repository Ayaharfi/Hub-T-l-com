<?php
namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Login as LoginModel;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [],
    ];

    public function boot(): void
    {
        parent::boot();

        Event::listen(Login::class, function ($event) {
            LoginModel::create([
                'user_id' => $event->user->id,
                'type' => $event->user->is_admin ? 'admin' : 'member',
                'login_at' => now(),
                'email' => $event->user->email,
            ]);
        });
    }
}
