<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\WithPagination;

class ListUser extends Component
{
    use WithPagination;

    public function deleteWriter($id)
    {
        $writer = User::find($id);
        if ($writer) {
            $writer->delete();
            $this->resetPage();
        }

        LivewireAlert::title('Writer deleted successfully!')
            ->success()
            ->show();
    }

    public function render()
    {
        $users = User::where('role', 'writer')->withCount('articles')->paginate(5);
        return view('livewire.list-user', compact('users'));
    }
}
