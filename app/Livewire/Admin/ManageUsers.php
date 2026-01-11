<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Add Hash facade
use Illuminate\Validation\Rule;      // Add Rule facade
use Illuminate\Validation\Rules\Password; // Add Password rule

class ManageUsers extends Component
{
    use WithPagination;

    // Restore modal state and form properties
    public $showModal = false;
    public $isEdit = false;
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $is_admin = false;

    // Restore validation rules
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->userId)],
            'password' => [$this->isEdit ? 'nullable' : 'required', 'confirmed', Password::defaults()],
            'is_admin' => ['required', 'boolean'],
        ];
    }

    // Restore create method
    public function create()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->showModal = true;
    }

    // Restore edit method
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = $user->is_admin;
        $this->password = null;
        $this->password_confirmation = null;
        $this->isEdit = true;
        $this->showModal = true;
    }

    // Restore save method
    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->isEdit) {
            $user = User::findOrFail($this->userId);
            $user->update($data);
            session()->flash('success', 'User updated successfully.');
        } else {
            if (empty($data['password'])) {
                 $this->addError('password', 'The password field is required.');
                 return;
            }
            $data['email_verified_at'] = now();
            User::create($data);
            session()->flash('success', 'User created successfully.');
        }

        $this->closeModal();
    }

    // Restore closeModal method
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    // Restore resetForm method
    private function resetForm()
    {
        $this->reset(['userId', 'name', 'email', 'password', 'password_confirmation', 'is_admin', 'isEdit']);
        $this->resetErrorBag();
    }

    /**
     * Delete a user.
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);

        // Prevent self-deletion
        if (Auth::id() === $user->id) {
            session()->flash('error', 'You cannot delete yourself.');
            return;
        }

        // Prevent deleting the last administrator
        if ($user->is_admin && User::where('is_admin', true)->count() <= 1) {
             session()->flash('error', 'Cannot delete the last administrator.');
             return;
        }

        $user->delete();
        session()->flash('success', 'User deleted successfully.');
    }

    public function render()
    {
        $users = User::orderBy('name')->paginate(10); // Paginate users
        $adminCount = User::where('is_admin', true)->count();

        return view('livewire.admin.manage-users', [
            'users' => $users,
            'adminCount' => $adminCount,
        ]);
    }
}
