
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/link', function () {
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/public/storage'; // Added a slash (/)

    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return 'Symlink created successfully.';
    } else {
        return 'Symlink already exists.';
    }
});
Route::get('/opt', function () {
    Artisan::call('optimize:clear');
    return redirect()->route('login');
});
