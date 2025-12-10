/**
 * Date Validation Script for Admin Forms
 * Handles interactions between start date, end date, and "is current" checkbox.
 * 
 * Required DOM Elements (IDs):
 * - is_current (Checkbox)
 * - start_year (Select)
 * - end_month (Select)
 * - end_year (Select)
 */

document.addEventListener('DOMContentLoaded', function() {
    const isCurrentCheckbox = document.getElementById('is_current');
    const startYearSelect = document.getElementById('start_year');
    const endMonthSelect = document.getElementById('end_month');
    const endYearSelect = document.getElementById('end_year');

    // Only proceed if all elements exist to avoid errors on pages that might miss one
    if (!isCurrentCheckbox || !startYearSelect || !endMonthSelect || !endYearSelect) {
        return;
    }

    function toggleEndDate() {
        if (isCurrentCheckbox.checked) {
            endMonthSelect.disabled = true;
            endYearSelect.disabled = true;
            endMonthSelect.value = '';
            endYearSelect.value = '';
        } else {
            endMonthSelect.disabled = false;
            endYearSelect.disabled = false;
            updateEndYearOptions();
        }
    }

    function updateEndYearOptions() {
        if (isCurrentCheckbox.checked) return;

        const startYear = parseInt(startYearSelect.value);
        const currentEndYear = parseInt(endYearSelect.value);
        
        // If no start year selected, we can't restrict end year properly, 
        // but generally we might want to reset logic. 
        // For now, if no start year, we assume all end years are valid unless we want to enforce start date first.
        // But logic below requires startYear to compare.
        if (!startYear) return;

        Array.from(endYearSelect.options).forEach(option => {
            if (option.value === "") return; // Skip placeholder
            
            const year = parseInt(option.value);
            if (year < startYear) {
                option.disabled = true;
                // If currently selected year is now disabled, unselect it
                if (year === currentEndYear) {
                    endYearSelect.value = "";
                }
            } else {
                option.disabled = false;
            }
        });
    }

    isCurrentCheckbox.addEventListener('change', toggleEndDate);
    startYearSelect.addEventListener('change', updateEndYearOptions);

    // Initial check
    toggleEndDate();
    // We also run updateEndYearOptions in case there are pre-filled values (edit mode)
    // toggleEndDate calls it if not current, but we call it explicitly if needed or rely on toggleEndDate
    // logic inside toggleEndDate calls updateEndYearOptions if checked is false.
});
