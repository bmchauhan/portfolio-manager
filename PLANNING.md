# Portfolio Manager System - Implementation Plan

This document outlines the proposed database structure and components for your Portfolio Management System.

## 1. Database Schema

We will create the following tables to store your portfolio data.

### A. Personal Details (`personal_details`)
Stores your main profile information and resume.
- `id` (PK)
- `user_id` (FK -> users.id)
- `full_name` (string)
- `headline` (string, e.g., "Full Stack Developer")
- `email` (string)
- `phone` (string)
- `address` (string)
- `bio` (text)
- `linkedin_url` (string)
- `github_url` (string)
- `resume_path` (string, file path)
- `avatar_path` (string, file path)

### B. Education (`educations`)
- `id` (PK)
- `institution` (string)
- `degree` (string)
- `field_of_study` (string)
- `start_date` (date)
- `end_date` (date, nullable)
- `is_current` (boolean)
- `description` (text)

### C. Experience (`experiences`)
Handles both **Work Experience** and **Internships** via a `type` column.
- `id` (PK)
- `company` (string)
- `position` (string)
- `type` (enum: 'full_time', 'internship', 'freelance')
- `start_date` (date)
- `end_date` (date, nullable)
- `is_current` (boolean)
- `description` (text)

### D. Skills & Tools (`skills`)
Handles both **Skills** and **Tools/Technologies**.
- `id` (PK)
- `name` (string, e.g., "Laravel", "VS Code")
- `category` (enum: 'skill', 'tool')
- `proficiency` (integer 0-100, optional)

### E. Awards (`awards`)
- `id` (PK)
- `title` (string)
- `issuer` (string)
- `date` (date)
- `description` (text)

---

## 2. Application Structure

### Models
- `App\Models\PersonalDetail`
- `App\Models\Education`
- `App\Models\Experience`
- `App\Models\Skill`
- `App\Models\Award`

### Controllers
We will group these into an `Admin` namespace for better organization.
- `App\Http\Controllers\Admin\ProfileController` (Manages Personal Details & Resume)
- `App\Http\Controllers\Admin\EducationController`
- `App\Http\Controllers\Admin\ExperienceController`
- `App\Http\Controllers\Admin\SkillController`
- `App\Http\Controllers\Admin\AwardController`

### Routes
```php
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('profile', ProfileController::class);
    Route::resource('education', EducationController::class);
    Route::resource('experience', ExperienceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('awards', AwardController::class);
});
```

---

## 3. UI Components (Blade Views)

We will create reusable form components to make the UI consistent.

- **Profile Section**: A form to edit personal info and an upload field for the Resume (PDF).
- **CRUD Tables**: Each section (Education, Experience, etc.) will have:
    - An "Index" view (List of items with Edit/Delete buttons).
    - A "Create/Edit" modal or page.

## 4. Next Steps
1. Create Migrations & Models.
2. Create Controllers & Routes.
3. Build the Views (using Tailwind CSS).
