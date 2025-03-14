<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';
    public $results;

    public function render()
{
    if ($this->searchTerm == '') {
        $this->results = array();
    } else {
        // Split the search term into individual words
        $searchWords = array_filter(explode(' ', $this->searchTerm));
        
        // Start with a base query
        $query = Post::query();
        
        // Add search conditions for each word
        foreach ($searchWords as $word) {
            $query->where(function($q) use ($word) {
                $q->where('make', 'like', "%{$word}%")
                  ->orWhere('model', 'like', "%{$word}%")
                  // Add other fields you want to search
                  ->orWhere('description', 'like', "%{$word}%")
                  ->orWhere('vyear', 'like', "%{$word}%");
            });
        }
        
        $this->results = $query->get();
    }
    
    return view('livewire.search');
}
}
