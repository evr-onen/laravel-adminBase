<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckToken;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

Route::view('login', 'auth.boxed-signin')->name('login');
Route::view('register', 'auth.boxed-signup')->name('register');
Route::get('deneme',  [ProductController::class, 'index']);

// Route::view('/', 'home');
Route::get('/', [PagesController::class, 'viewMainPAge']);
Route::view('/portfolio', 'portfolio');

Route::group(['middleware' => CheckToken::class, 'prefix' => 'dashboard'], function () {

    Route::view('/', 'dashboard');
    Route::get('/blog/create', [BlogsController::class, 'viewDashboardCreateBlogs']);
    Route::get('/blog/list', [BlogsController::class, 'getBlogs']);
    Route::view('/options/header', 'dashboard.options.header');
    Route::view('/options/footer', 'dashboard.options.footer');

    Route::group(['prefix' => '/options'], function () {
        Route::view('/header', 'dashboard.options.header');
        Route::view('/footer', 'dashboard.options.footer');

        Route::group(['prefix' => '/pages'], function () {
            Route::get('/home-options',  [OptionsController::class, 'getHomeOptions']);
            Route::view('/contact-options', 'dashboard.options.pages.contactOptions');
            Route::view('/about-options', 'dashboard.options.pages.aboutusOptions');
            Route::view('/portfolio-options', 'dashboard.options.pages.portfolioOptions');
        });
    });
});

Route::group(['middleware' => CheckToken::class, 'prefix' => 'admin'], function () {

    Route::view('/', 'admin');
    Route::view('/analytics', 'analytics');
    Route::view('/finance', 'finance');
    Route::view('/crypto', 'crypto');

    Route::view('/apps/chat', 'apps.chat');
    Route::view('/apps/mailbox', 'apps.mailbox');
    Route::view('/apps/todolist', 'apps.todolist');
    Route::view('/apps/notes', 'apps.notes');
    Route::view('/apps/scrumboard', 'apps.scrumboard');
    Route::view('/apps/contacts', 'apps.contacts');
    Route::view('/apps/calendar', 'apps.calendar');

    Route::view('/apps/invoice/list', 'apps.invoice.list');
    Route::view('/apps/invoice/preview', 'apps.invoice.preview');
    Route::view('/apps/invoice/add', 'apps.invoice.add');
    Route::view('/apps/invoice/edit', 'apps.invoice.edit');

    Route::view('/components/tabs', 'ui-components.tabs');
    Route::view('/components/accordions', 'ui-components.accordions');
    Route::view('/components/modals', 'ui-components.modals');
    Route::view('/components/cards', 'ui-components.cards');
    Route::view('/components/carousel', 'ui-components.carousel');
    Route::view('/components/countdown', 'ui-components.countdown');
    Route::view('/components/counter', 'ui-components.counter');
    Route::view('/components/sweetalert', 'ui-components.sweetalert');
    Route::view('/components/timeline', 'ui-components.timeline');
    Route::view('/components/notifications', 'ui-components.notifications');
    Route::view('/components/media-object', 'ui-components.media-object');
    Route::view('/components/list-group', 'ui-components.list-group');
    Route::view('/components/pricing-table', 'ui-components.pricing-table');
    Route::view('/components/lightbox', 'ui-components.lightbox');

    Route::view('/elements/alerts', 'elements.alerts');
    Route::view('/elements/avatar', 'elements.avatar');
    Route::view('/elements/badges', 'elements.badges');
    Route::view('/elements/breadcrumbs', 'elements.breadcrumbs');
    Route::view('/elements/buttons', 'elements.buttons');
    Route::view('/elements/buttons-group', 'elements.buttons-group');
    Route::view('/elements/color-library', 'elements.color-library');
    Route::view('/elements/dropdown', 'elements.dropdown');
    Route::view('/elements/infobox', 'elements.infobox');
    Route::view('/elements/jumbotron', 'elements.jumbotron');
    Route::view('/elements/loader', 'elements.loader');
    Route::view('/elements/pagination', 'elements.pagination');
    Route::view('/elements/popovers', 'elements.popovers');
    Route::view('/elements/progress-bar', 'elements.progress-bar');
    Route::view('/elements/search', 'elements.search');
    Route::view('/elements/tooltips', 'elements.tooltips');
    Route::view('/elements/treeview', 'elements.treeview');
    Route::view('/elements/typography', 'elements.typography');

    Route::view('/charts', 'charts');
    Route::view('/widgets', 'widgets');
    Route::view('/font-icons', 'font-icons');
    Route::view('/dragndrop', 'dragndrop');

    Route::view('/tables', 'tables');

    Route::view('/datatables/advanced', 'datatables.advanced');
    Route::view('/datatables/alt-pagination', 'datatables.alt-pagination');
    Route::view('/datatables/basic', 'datatables.basic');
    Route::view('/datatables/checkbox', 'datatables.checkbox');
    Route::view('/datatables/clone-header', 'datatables.clone-header');
    Route::view('/datatables/column-chooser', 'datatables.column-chooser');
    Route::view('/datatables/export', 'datatables.export');
    Route::view('/datatables/multi-column', 'datatables.multi-column');
    Route::view('/datatables/multiple-tables', 'datatables.multiple-tables');
    Route::view('/datatables/order-sorting', 'datatables.order-sorting');
    Route::view('/datatables/range-search', 'datatables.range-search');
    Route::view('/datatables/skin', 'datatables.skin');
    Route::view('/datatables/sticky-header', 'datatables.sticky-header');

    Route::view('/forms/basic', 'forms.basic');
    Route::view('/forms/input-group', 'forms.input-group');
    Route::view('/forms/layouts', 'forms.layouts');
    Route::view('/forms/validation', 'forms.validation');
    Route::view('/forms/input-mask', 'forms.input-mask');
    Route::view('/forms/select2', 'forms.select2');
    Route::view('/forms/touchspin', 'forms.touchspin');
    Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
    Route::view('/forms/switches', 'forms.switches');
    Route::view('/forms/wizards', 'forms.wizards');
    Route::view('/forms/file-upload', 'forms.file-upload');
    Route::view('/forms/quill-editor', 'forms.quill-editor');
    Route::view('/forms/markdown-editor', 'forms.markdown-editor');
    Route::view('/forms/date-picker', 'forms.date-picker');
    Route::view('/forms/clipboard', 'forms.clipboard');

    Route::view('/users/profile', 'users.profile');
    Route::view('/users/user-account-settings', 'users.user-account-settings');

    Route::view('/pages/knowledge-base', 'pages.knowledge-base');
    Route::view('/pages/contact-us', 'pages.contact-us');
    Route::view('/pages/faq', 'pages.faq');
    Route::view('/pages/coming-soon', 'pages.coming-soon');
    Route::view('/pages/error404', 'pages.error404');
    Route::view('/pages/error500', 'pages.error500');
    Route::view('/pages/error503', 'pages.error503');
    Route::view('/pages/maintenence', 'pages.maintenence');


    Route::view('/auth/boxed-lockscreen', 'auth.boxed-lockscreen');
    Route::view('/auth/boxed-password-reset', 'auth.boxed-password-reset');
    Route::view('/auth/cover-login', 'auth.cover-login');
    Route::view('/auth/cover-register', 'auth.cover-register');
    Route::view('/auth/cover-lockscreen', 'auth.cover-lockscreen');
    Route::view('/auth/cover-password-reset', 'auth.cover-password-reset');
});

Route::get('/change-language/{language}', function ($language) {
    if (in_array($language, ['en', 'tr'])) {
        app()->setLocale($language);
    }

    // if (Cookie::has('lang')) {
    //     Cookie::queue(Cookie::forget('lang'));
    // }
    return redirect()->back()->cookie('lang', $language, null, '/', null, false, false);
})->name('changeLanguage');
// time() + (10 * 365 * 24 * 60 * 60)
