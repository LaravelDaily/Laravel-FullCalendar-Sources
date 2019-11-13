<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Venues
    Route::apiResource('venues', 'VenuesApiController');

    // Events
    Route::apiResource('events', 'EventsApiController');

    // Meetings
    Route::apiResource('meetings', 'MeetingsApiController');
});
