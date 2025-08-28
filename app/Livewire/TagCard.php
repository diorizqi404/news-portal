<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tags;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Illuminate\Support\Str;

class TagCard extends Component
{
    public $tags = [''];

    protected $rules = [
        'tags.*' => 'required|string|max:255',
    ];

    public function addTagField()
    {
        $this->tags[] = '';
    }

    // Remove a tag field
    public function removeTagField($index)
    {
        if (count($this->tags) > 1) {
            array_splice($this->tags, $index, 1);
        }
    }

    public function createTags()
    {
        $this->validate();

        foreach ($this->tags as $name) {
            $slug = Str::slug($name);
            Tags::firstOrCreate(['name' => $name, 'slug' => $slug]);
        }

        $this->tags = [''];

        LivewireAlert::title('Tags created successfully!')
            ->success()
            ->show();
    }

    public function render()
    {
        return view('livewire.tags.tag-card');
    }
}
