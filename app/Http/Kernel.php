<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		// 'auth' => 'App\Http\Middleware\Authenticate',
		// 'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',

		'sentry.auth' => \App\Http\Middleware\SentryAuth::class,
		// 'sentry.auth' => \Sentinel\Middleware\SentryAuth::class,
		  'sentry.admin' => \App\Http\Middleware\SentryAdminAccess::class,
		  // 'sentry.admin' => \Sentinel\Middleware\SentryAdminAccess::class,
		  'sentry.member' => \App\Http\Middleware\SentryMember::class,
		  // 'sentry.member' => \Sentinel\Middleware\SentryMember::class,
		  'sentry.guest' => \App\Http\Middleware\SentryGuest::class,
		  // 'sentry.guest' => \Sentinel\Middleware\SentryGuest::class,
	];

}
