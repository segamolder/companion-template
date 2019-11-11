<?php

namespace App\Providers;

use App\Repository\Contracts\BaseRepositoryContract;
use App\Repository\Contracts\CarBodyTypeRepositoryContract;
use App\Repository\Contracts\CarCommentsRepositoryContract;
use App\Repository\Contracts\CarMarkRepositoryContract;
use App\Repository\Contracts\CarModelRepositoryContract;
use App\Repository\Contracts\CarRatingRepositoryContract;
use App\Repository\Contracts\CarRepositoryContract;
use App\Repository\Contracts\PassengersRepositoryContract;
use App\Repository\Contracts\PreferencesRepositoryContract;
use App\Repository\Contracts\TripsRepositoryContract;
use App\Repository\Contracts\UserRepositoryContract;
use App\Repository\Contracts\UsersCommentRepositoryContract;
use App\Repository\Contracts\UsersRatingRepositoryContract;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\CarBodyTypeRepository;
use App\Repository\Eloquent\CarCommentsRepository;
use App\Repository\Eloquent\CarMarkRepository;
use App\Repository\Eloquent\CarModelRepository;
use App\Repository\Eloquent\CarRatingRepository;
use App\Repository\Eloquent\CarRepository;
use App\Repository\Eloquent\PassengersRepository;
use App\Repository\Eloquent\PreferencesRepository;
use App\Repository\Eloquent\TripsRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\UsersCommentRepository;
use App\Repository\Eloquent\UsersRatingRepository;
use App\Services\BaseService;
use App\Services\CarService;
use App\Services\Contracts\BaseServiceContract;
use App\Services\Contracts\CarServiceContract;
use App\Services\Contracts\FileServiceContract;
use App\Services\Contracts\PassengerServiceContract;
use App\Services\Contracts\PreferencesServiceContract;
use App\Services\Contracts\TripsServiceContract;
use App\Services\Contracts\UserServiceContract;
use App\Services\FileService;
use App\Services\PassengersService;
use App\Services\PreferencesService;
use App\Services\TripsService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(BaseRepositoryContract::class, BaseRepository::class);
        $this->app->singleton(UserRepositoryContract::class, UserRepository::class);
        $this->app->singleton(CarRepositoryContract::class, CarRepository::class);
        $this->app->singleton(CarBodyTypeRepositoryContract::class, CarBodyTypeRepository::class);
        $this->app->singleton(CarCommentsRepositoryContract::class, CarCommentsRepository::class);
        $this->app->singleton(CarMarkRepositoryContract::class, CarMarkRepository::class);
        $this->app->singleton(CarModelRepositoryContract::class, CarModelRepository::class);
        $this->app->singleton(CarRatingRepositoryContract::class, CarRatingRepository::class);
        $this->app->singleton(PassengersRepositoryContract::class, PassengersRepository::class);
        $this->app->singleton(PreferencesRepositoryContract::class, PreferencesRepository::class);
        $this->app->singleton(TripsRepositoryContract::class, TripsRepository::class);
        $this->app->singleton(UsersCommentRepositoryContract::class, UsersCommentRepository::class);
        $this->app->singleton(UsersRatingRepositoryContract::class, UsersRatingRepository::class);

        #region Services
        $this->app->singleton(BaseServiceContract::class, BaseService::class);
        $this->app->singleton(CarServiceContract::class, CarService::class);
        $this->app->singleton(PassengerServiceContract::class, PassengersService::class);
        $this->app->singleton(PreferencesServiceContract::class, PreferencesService::class);
        $this->app->singleton(TripsServiceContract::class, TripsService::class);
        $this->app->singleton(UserServiceContract::class, UserService::class);
        $this->app->singleton(FileServiceContract::class, FileService::class);
        #endregion
    }
}
