<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Starter: a page that reads and writes the app's own database, so a customer sees at once that the app and its database are connected.
Route::get('/', function () {
    $db = ['driver' => config('database.default'), 'ok' => false, 'visits' => null, 'error' => null];
    try {
        DB::table('starter_visits')->insert(['created_at' => now()]);
        $db['visits'] = DB::table('starter_visits')->count();
        $db['ok'] = true;
    } catch (Throwable $e) {
        $db['error'] = 'La base de datos todavía no está lista (¿corrieron las migraciones?).';
    }

    return response(
        '<!doctype html><html lang="es"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">'
        . '<title>Tu app Laravel en FullHosting</title>'
        . '<body style="font-family:system-ui;max-width:40rem;margin:4rem auto;padding:0 1rem">'
        . '<h1>fh-starter laravel ok</h1>'
        . '<p>Laravel ' . app()->version() . ' · PHP ' . PHP_VERSION . '</p>'
        . ($db['ok']
            ? '<p>Base de datos (' . e($db['driver']) . ') conectada: esta página se abrió <strong>' . (int) $db['visits'] . '</strong> veces.</p>'
            : '<p>' . e($db['error']) . '</p>')
        . '</body></html>'
    );
});

Route::get('/report.json', fn () => response()->json(['starter' => 'laravel', 'laravel' => app()->version(), 'db' => config('database.default')]));
