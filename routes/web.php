<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChooseUsController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\SubscriptionController;

// باقي الكنترولرات كما هي...

// الصفحة الرئيسية


// صفحات ثابتة
Route::get('/about-us', fn() => view('about-us'));
Route::get('/blog-details', fn() => view('blog-details'));
Route::get('/class-details', fn() => view('class-details'));
Route::get('/class-timetable', fn() => view('class-timetable'));
Route::get('/services', fn() => view('services'));
Route::get('/', [ClassController::class, 'index']);

// صفحة التواصل
Route::get('/contact', fn() => view('contact'));
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// BMI Calculator
Route::get('/bmi-calculator', fn() => view('bmi-calculator'));
Route::post('/bmi-calculator', [BmiController::class, 'calculate'])->name('bmi.calculate');

// لوحة تحكم الأدوار
Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/index', fn() => view('index'))->name('member.home');
});


// المصادقة باستخدام guard member
Route::middleware('guest:member')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

// تسجيل الخروج
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// مسارات تحتاج مصادقة
Route::middleware(['auth:member'])->group(function () {
    // مسارات لجميع الأعضاء المسجلين
    Route::get('/index', fn() => view('index'))->name('member.home');
});
    // مسارات الأدمن فقط
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });
    Route::middleware(['auth:member'])->group(function () {
        // المسارات المحمية
    });
    Route::post('/logout', function () {
        Auth::guard('member')->logout();
        return redirect('/');
    })->name('logout');

    Route::middleware(['auth:member', 'role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index']);
    });




Route::get('/', [ChooseUsController::class, 'index']);

Route::get('/', [PricingController::class, 'showPricingPlans'])->name('index');


//========================================== payment ==========================//
Route::get('/payment/{subscription}', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

Route::get('/payment/success', function() {
    return view('payment_success');
})->name('payment.success');
Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::prefix('admin')->middleware(['auth:member', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::prefix('admin')->middleware(['auth:member', 'admin'])->group(function () {
    // مسارات الاشتراكات

});
Route::resource('subscriptions', \App\Http\Controllers\Admin\SubscriptionController::class)
        ->names([
            'index' => 'admin.subscriptions.index',
            'create' => 'admin.subscriptions.create',
            'store' => 'admin.subscriptions.store',
            'show' => 'admin.subscriptions.show',
            'edit' => 'admin.subscriptions.edit',
            'update' => 'admin.subscriptions.update',
            'destroy' => 'admin.subscriptions.destroy'
        ]);

Route::prefix('admin')->middleware(['auth:member', 'admin'])->group(function () {
    Route::resource('subscriptions', SubscriptionController::class)->names([
        'index' => 'admin.subscriptions.index',
        // ... etc
    ]);
});
