<?php

namespace LaravelAlterSendEmailValidator\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelAlterSendEmailValidator\Validators\AlterSendEmailValidator;

class AlterEmailValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/alter-email-validation.php' => config_path('alter-email-validation.php'),
        ]);

        \Swift::init(function () {
            \Swift_DependencyContainer::getInstance()
                ->register('email.validator')
                ->asSharedInstanceOf(AlterSendEmailValidator::class);
        });
    }
}
