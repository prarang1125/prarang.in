<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class BooksLinks extends Component
{
    public $activeModal = null;
    public $books = [];
    public $e_books = [];
    public $links = [];
    public $cityName = '';
    public $cityNameLocal = '';

    public function mount($books = null, $links = null, $cityName = 'Meerut', $cityNameLocal = 'मेरठ')
    {
        $this->cityName = $cityName;
        $this->cityNameLocal = $cityNameLocal;

        // Parse Books Data
        if (is_string($books)) {
            try {
                $parsed = json_decode($books, true);
                $this->e_books = $parsed['e_books'] ?? [];
                $this->books = $parsed['books'] ?? [];
            } catch (\Exception $e) {
                $this->e_books = [];
                $this->books = [];
            }
        } elseif (is_array($books)) {
            $this->books = $books;
        } else {
            $this->books = [];
            $this->e_books = [];
        }

        // Parse links Data
        if (is_string($links)) {
            try {
                $parsed = json_decode($links, true);
                $this->links = $parsed ?? [];
            } catch (\Exception $e) {
                $this->links = [];
            }
        } elseif (is_array($links)) {
            $this->links = $links;
        } else {
            $this->links = [];
        }
    }


    public function render()
    {
        return view('livewire.portal.books-links');
    }
}
