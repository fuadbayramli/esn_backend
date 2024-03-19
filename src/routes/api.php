<?php

use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\BoardSecretariatController;
use App\Http\Controllers\API\ConceptController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\FileController;
use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\MemberRoleController;
use App\Http\Controllers\API\NationalChapterController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\OpportunityController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\SubscriberController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\TimelineController;
use App\Http\Controllers\API\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// AuthController routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'auth'])->name('login');
Route::post('/forgot/password', [AuthController::class, 'forgotPassword']);
Route::get('/resetPassword')->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword']);

// NationalChapterController routes
Route::get('/national/chapter', [NationalChapterController::class, 'all'])->withoutMiddleware("throttle:api");
Route::get('/national/chapter/{id}', [NationalChapterController::class, 'show'])->where(['id' => '[0-9]+']);

// NewsController routes
Route::get('/news', [NewsController::class, 'all']);
Route::get('/news/{id}', [NewsController::class, 'show'])->where(['id' => '[0-9]+']);

// CountryController routes
Route::get('/countries', [CountryController::class, 'all']);

// FaqController routes
Route::get('/faqs', [FaqController::class, 'all']);

//ContactController
Route::post('/send/message', [ContactController::class, 'message']);

// Subscriber controller
Route::post('/subscriber', [SubscriberController::class, 'store']);

//AboutController
Route::get('/about', [AboutController::class, 'all']);

//ConceptController
Route::get('/concepts', [ConceptController::class, 'all']);

//TimelineController
Route::get('/timelines', [TimelineController::class, 'all']);

//SettingsController
Route::get('/settings', [SettingsController::class, 'settings'])->withoutMiddleware("throttle:api");

//TestimonialController
Route::get('/testimonials', [TestimonialController::class, 'all']);

// Opportunity routes
Route::get('/opportunities', [OpportunityController::class, 'all']);
Route::get('/opportunity/{id}', [OpportunityController::class, 'show'])->where(['id' => '[0-9]+']);

// Project routes
Route::get('/projects', [ProjectController::class, 'all']);
Route::get('/project/{id}', [ProjectController::class, 'show'])->where(['id' => '[0-9]+']);

// BoardSecretariat routes
Route::get('/boardSecretariats', [BoardSecretariatController::class, 'all']);
Route::get('/boardSecretariat/{id}', [BoardSecretariatController::class, 'show'])->where(['id' => '[0-9]+']);

//Event routes
Route::get('/events', [EventController::class, 'all']);

//blog routes
Route::get('/blog', [BlogController::class, 'all']);
Route::get('/blog/{id}', [BlogController::class, 'show'])->where(['id' => '[0-9]+']);

//article routes
Route::get('/article', [ArticleController::class, 'all']);
Route::get('/article/{id}', [ArticleController::class, 'show'])->where(['id' => '[0-9]+']);

//file routes
Route::post('/file', [FileController::class, 'upload']);

Route::get('/email/verify/{id}', [VerifyEmailController::class, 'verify'])
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/email/resend', [VerifyEmailController::class, 'resend'])
        ->middleware(['throttle:6,1'])
        ->name('verification.resend');

    //member routes
    Route::put('/member/{id}', [MemberController::class, 'update'])
        ->middleware('access.denied')
        ->name('member.update');
    Route::get('/member/profile/{id}', [MemberController::class, 'show']);
    Route::get('/member/all', [MemberController::class, 'all']);
    Route::get('/member/roles', [MemberRoleController::class, 'all']);

    //blog routes
    Route::post('/blog', [BlogController::class, 'store']);

    //article routes
    Route::post('/article', [ArticleController::class, 'store']);

    //news like, dislike routes
    Route::post('/news/like', [NewsController::class, 'newsLike']);
    Route::post('/news/dislike', [NewsController::class, 'newsDislike']);

    Route::get('/logout', [AuthController::class, 'logout']);
});
