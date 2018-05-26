<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class HotelServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('requiredIfNotNull', 'Tajawal\Validation\CustomValidator@validateRequiredIfNotNull');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Tajawal\Contracts\IDataMapper', 'Tajawal\DataMapper\HotelDataMapper');
        $this->app->singleton('Tajawal\Contracts\IDataSource', 'Tajawal\DataSource\HotelDataSource');
        $this->app->singleton('Tajawal\Contracts\IBusiness', 'Tajawal\Business\HotelBusiness');
        $this->app->singleton('Tajawal\Contracts\ISort', 'Tajawal\Business\Sort\SortHotels');
        $this->app->singleton('Tajawal\Validation\AbstractValidation', 'Tajawal\Validation\SearchValidatation');
    }
}
