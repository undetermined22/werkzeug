<?php

namespace App\Http\Livewire\Browser;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{

    public $path;

    public $directories;

    public $files;

    public $filteredDirectories;

    public $filteredFiles;
    
    public $search;

    public function mount()
    {
        $this->ls();
    }

    public function render()
    {
        return view('livewire.browser.index');
    }

    public function cd(string $path)
    {
        if (!Storage::exists($path)) {
            $this->addError('path', sprintf('Path not found (%s)', $path));
        } else {
            $this->path = $path;
            $this->search = '';
            $this->ls();
        }
    }

    public function filter()
    {
        if (!empty($this->search)) {
            $this->filteredDirectories = array_filter(
                $this->directories,
                fn ($directory) => Str::of($directory)->afterLast('/')->contains($this->search)
            );
            $this->filteredFiles = array_filter(
                $this->files,
                fn ($file) => Str::of($file)->afterLast('/')->contains($this->search)
            );
        } else {
            $this->filteredDirectories = $this->directories;
            $this->filteredFiles = $this->files;
        }
    }

    private function ls()
    {
        $this->directories = Storage::directories($this->path);
        $this->filteredDirectories = $this->directories;
        $this->files = Storage::files($this->path);
        $this->filteredFiles = $this->files;
    }
}
