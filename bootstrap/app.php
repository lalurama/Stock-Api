<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ==========================================
        // VERSI 1: DENGAN CORS (Uncomment ini)
        // ==========================================
        $middleware->api(append: [
            \App\Http\Middleware\Cors::class,
        ]);

        // ==========================================
        // VERSI 2: TANPA CORS (Comment/hapus baris di atas)
        // ==========================================
        // Tidak perlu tambahan middleware apapun
        // API akan tetap jalan tapi hanya bisa diakses dari server yang sama
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
