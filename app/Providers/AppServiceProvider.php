<?php

declare(strict_types=1);

namespace App\Providers;

use Imhotep\Database\Events\QueryExecuted;
use Imhotep\Facades\Auth;
use Imhotep\Facades\DB;
use Imhotep\Framework\Providers\ServiceProvider;
use Imhotep\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {

    }
}