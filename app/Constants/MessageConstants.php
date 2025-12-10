<?php

namespace App\Constants;

class MessageConstants
{
    // Status Messages
    const SUCCESS = 'success';
    const ERROR = 'error';
    const WARNING = 'warning';
    const INFO = 'info';

    // Action Messages
    const CREATED_SUCCESSFULLY = 'Created successfully.';
    const UPDATED_SUCCESSFULLY = 'Updated successfully.';
    const DELETED_SUCCESSFULLY = 'Deleted successfully.';
    const SAVED_SUCCESSFULLY = 'Saved successfully.';
    const UPLOADED_SUCCESSFULLY = 'Uploaded successfully.';
    const CONFIRM_DELETE = 'Are you sure you want to delete this item?';
    
    // Error Messages
    const ERROR_OCCURRED = 'An error occurred. Please try again.';
    const NOT_FOUND = 'Resource not found.';
    const UNAUTHORIZED = 'Unauthorized action.';
    const VALIDATION_ERROR = 'Please check the form for errors.';
}
