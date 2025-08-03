<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Determine allowed roles based on the current user's role.
        $allowedRoles = [];
        if (auth()->user()->hasRole('admin')) {
            $allowedRoles = ['admin', 'teacher', 'student'];
        } elseif (auth()->user()->hasRole('teacher')) {
            $allowedRoles = ['student'];
        }

        // Get the user ID from the route parameter (adjust 'user' if necessary)
        $userId = $this->route('user'); // If you're using route model binding, this will be the User model instance; if it's an id, you may need to cast it to a number.

        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . ($userId->id ?? $userId),
            'role'  => 'required|string|in:' . implode(',', $allowedRoles),
        ];
    }
}
