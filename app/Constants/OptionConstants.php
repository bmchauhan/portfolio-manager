<?php

namespace App\Constants;

class OptionConstants
{
    const MONTHS = [
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ];

    const EXPERIENCE_TYPES = [
        'full_time' => 'Full Time',
        'internship' => 'Internship',
        'freelance' => 'Freelance',
    ];

    const LOCATION_TYPES = [
        'onsite' => 'On-site',
        'remote' => 'Remote',
    ];

    const SKILL_CATEGORIES = [
        'skill' => 'Skill',
        'tool' => 'Tool',
    ];

    const PROFICIENCY_LEVELS = [
        'beginner' => 'Beginner',
        'intermediate' => 'Intermediate',
        'proficient' => 'Proficient',
    ];

    const START_YEAR = 2015;
}
