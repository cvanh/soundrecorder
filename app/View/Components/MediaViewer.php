<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

enum MediaTypes
{
    case mp4;
    case mp3;
}

class MediaViewer extends Component
{
    // public ?MediaTypes $mediaType;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.media-viewer');
    }
}
