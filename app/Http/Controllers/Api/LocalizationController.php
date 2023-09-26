<?php

namespace App\Http\Controllers\Api;

use App\Contracts\LocalizationServiceContract;
use App\Http\Controllers\Controller;
use F9Web\ApiResponseHelpers;

class LocalizationController extends Controller
{
    protected LocalizationServiceContract $localizationService;

    public function __construct(LocalizationServiceContract $localizationService)
    {
        $this->localizationService = $localizationService;
    }

    /**
     * Display a listing of locales.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function locales()
    {
        return $this->respondWithSuccess($this->localizationService->locales());
    }

    /**
     * Display a listing of texts on app locale (sets by header in middleware).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function texts() {
        return $this->respondWithSuccess($this->localizationService->localization());
    }
}
