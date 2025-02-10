<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GeneralSettingUpdateRequest;
use App\Models\SiteSetting;
use App\Services\Notify;
use App\Services\SiteSettingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    function index() : View {
        return view('admin.site-setting.index');
    }

    function updateGeneralSetting(GeneralSettingUpdateRequest $request) : RedirectResponse {
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $siteSetting = app()->make(SiteSettingService::class);
        $siteSetting->clearCachedSettings();

        Notify::updatedNotification();

        return redirect()->back();
    }



    function updateLogoSetting(Request $request) : RedirectResponse {
        $request->validate([
            'logo' => ['image', 'max:2000'],
            'favicon' => ['image', 'max:2000'],
        ]);

        $logoPath = $this->uploadFile($request, 'logo');
        $faviconPath = $this->uploadFile($request, 'favicon');

        $logoData = [];
        if($logoPath) $logoData['value'] = $logoPath;

        SiteSetting::updateOrCreate(
            ['key' => 'site_logo'],
            $logoData
        );

        $faviconData = [];
        if($faviconPath) $faviconData['value'] = $faviconPath;

        SiteSetting::updateOrCreate(
            ['key' => 'site_favicon'],
            $faviconData
        );

        $siteSetting = app()->make(SiteSettingService::class);
        $siteSetting->clearCachedSettings();

        Notify::updatedNotification();

        return redirect()->back();
    }
}
