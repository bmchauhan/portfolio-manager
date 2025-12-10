<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Constants\MessageConstants;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function edit()
    {
        $user = Auth::user();
        $personalDetail = $this->profileService->getProfile($user->id);

        return view('admin.profile.edit', compact('personalDetail'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        
        $data = $request->except(['resume', 'avatar', '_token', '_method']);
        
        $this->profileService->updateProfile(
            $user->id, 
            $data, 
            $request->file('resume'), 
            $request->file('avatar')
        );

        return redirect()->route('admin.profile.edit')->with(MessageConstants::SUCCESS, MessageConstants::UPDATED_SUCCESSFULLY);
    }

    public function deleteResume()
    {
        $this->profileService->deleteResume(Auth::id());
        return redirect()->route('admin.profile.edit')->with(MessageConstants::SUCCESS, MessageConstants::DELETED_SUCCESSFULLY ?? 'Deleted Successfully');
    }

    public function deleteAvatar()
    {
        $this->profileService->deleteAvatar(Auth::id());
        return redirect()->route('admin.profile.edit')->with(MessageConstants::SUCCESS, MessageConstants::DELETED_SUCCESSFULLY ?? 'Deleted Successfully');
    }
}
