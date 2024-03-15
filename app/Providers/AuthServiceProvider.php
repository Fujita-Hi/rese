<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      $this->registerPolicies();

      // 管理者以上に許可
      Gate::define('admin', function ($user) {
        return ($user->role >= 1 && $user->role <= 10);
      });
      // オーナー以上に許可
      Gate::define('owner', function ($user) {
        return ($user->role <= 100);
      });
    }
}
