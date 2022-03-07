<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerPolicies();


        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $spaUrl = "https://frontendbloodbank.herokuapp.com/#login?email_verify_url=".$url;

            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('You have been successfully registered','Please click the button below to verify your email address and continue')
                ->action('Verify Email Address', $spaUrl);
        });

    }
}
