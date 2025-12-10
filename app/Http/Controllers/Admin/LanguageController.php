<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Services\LanguageService;
use App\Http\Requests\Admin\StoreLanguageRequest;
use App\Http\Requests\Admin\UpdateLanguageRequest;
use App\Constants\MessageConstants;

class LanguageController extends Controller
{
    protected $languageService;

    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index()
    {
        $languages = $this->languageService->getPaginatedLanguages(10);
        return view('admin.language.index', compact('languages'));
    }

    public function store(StoreLanguageRequest $request)
    {
        $this->languageService->createLanguage($request->all());
        return redirect()->route('admin.languages.index')->with(MessageConstants::SUCCESS, MessageConstants::CREATED_SUCCESSFULLY);
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $this->languageService->updateLanguage($language, $request->all());
        return redirect()->route('admin.languages.index')->with(MessageConstants::SUCCESS, MessageConstants::UPDATED_SUCCESSFULLY);
    }

    public function destroy(Language $language)
    {
        $this->languageService->deleteLanguage($language);
        return redirect()->route('admin.languages.index')->with(MessageConstants::SUCCESS, MessageConstants::DELETED_SUCCESSFULLY);
    }
}
