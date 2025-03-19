<?php
namespace App\Livewire;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostFilter extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $minPrice = '';
    public $maxPrice = '';
    public $make = '';
    public $variant = '';
    public $minMileage = '';
    public $maxMileage = '';
    public $vyear = '';
    public $colour = '';
    public $vcondition = '';
    public $transmission = '';
    public $fueltype = '';
    public $bodytype = '';
    public $perPage = 12;
    
    public function render()
    {
        // Base query for counting and filtering
        $baseQuery = Post::query();
        
        // Apply filters to the base query
        $filteredQuery = $this->applyFilters(clone $baseQuery);
        
        // Get paginated results
        $posts = $filteredQuery->paginate($this->perPage);
        
        // Get makes with counts
        $makesQuery = Post::selectRaw('make, COUNT(*) as count')
            ->groupBy('make')
            ->orderBy('make');
        $makes = $makesQuery->get();
        
        // Get variants with counts (filtered by make if selected)
        $variantsQuery = Post::selectRaw('variant, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->groupBy('variant')
            ->orderBy('variant');
        $variants = $variantsQuery->get();
        
        // Get years with counts (filtered by make and variant if selected)
        $yearsQuery = Post::selectRaw('vyear, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->when($this->variant, function($query) {
                return $query->where('variant', $this->variant);
            })
            ->groupBy('vyear')
            ->orderBy('vyear', 'desc');
        $years = $yearsQuery->get();
        
        // Get colors with counts (filtered by make and variant if selected)
        $coloursQuery = Post::selectRaw('colour, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->when($this->variant, function($query) {
                return $query->where('variant', $this->variant);
            })
            ->groupBy('colour')
            ->orderBy('colour');
        $colours = $coloursQuery->get();
        
        // Get conditions with counts (filtered by make and variant if selected)
        $conditionsQuery = Post::selectRaw('vcondition, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->when($this->variant, function($query) {
                return $query->where('variant', $this->variant);
            })
            ->groupBy('vcondition')
            ->orderBy('vcondition');
        $conditions = $conditionsQuery->get();

        $transmissionsQuery = Post::selectRaw('transmission, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->when($this->variant, function($query) {
                return $query->where('variant', $this->variant);
            })
            ->groupBy('transmission')
            ->orderBy('transmission');
        $transmissions = $transmissionsQuery->get();

        $fueltypeQuery = Post::selectRaw('fueltype, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->when($this->variant, function($query) {
                return $query->where('variant', $this->variant);
            })
            ->groupBy('fueltype')
            ->orderBy('fueltype');
        $fueltypes = $fueltypeQuery->get();

        $bodytypeQuery = Post::selectRaw('bodytype, COUNT(*) as count')
            ->when($this->make, function($query) {
                return $query->where('make', $this->make);
            })
            ->when($this->variant, function($query) {
                return $query->where('variant', $this->variant);
            })
            ->groupBy('bodytype')
            ->orderBy('bodytype');
        $bodytypes = $bodytypeQuery->get();
        
        // Total count of filtered results
        $totalResults = $filteredQuery->count();
        
        return view('livewire.post-filter', [
            'posts' => $posts,
            'makes' => $makes,
            'variants' => $variants,
            'colours' => $colours,
            'conditions' => $conditions,
            'transmissions' => $transmissions,
            'fueltypes' => $fueltypes,
            'bodytypes' => $bodytypes,
            'priceRanges' => $this->getPriceRanges(), 
            'mileageRanges' => $this->getMileageRanges(), 
            'years' => $years,
            'totalResults' => $totalResults
        ]);
    }

    private function getPriceRanges()
    {
        $ranges = ['']; // Add an empty option
        for ($i = 0; $i <= 500000; $i += 10000) { // Adjust max as needed
            $ranges[$i] = number_format($i); //Formatting the display value only.
        }
        return $ranges;
    }

    private function getMileageRanges()
    {
        $ranges = ['']; // Add an empty option
        for ($i = 0; $i <= 300000; $i += 10000) { // Adjust max as needed
            $ranges[$i] = number_format($i); //Formatting the display value only.
        }
        return $ranges;
    }
    
    private function applyFilters($query)
    {
        if ($this->minPrice !== '') {
            $query->where('sellingprice', '>=', (int) $this->minPrice);
        }
    
        if ($this->maxPrice !== '') {
            $query->where('sellingprice', '<=', (int) $this->maxPrice);
        }
    
        if ($this->minMileage !== '') {
            $query->where('mileage', '>=', (int) $this->minMileage);
        }
    
        if ($this->maxMileage !== '') {
            $query->where('mileage', '<=', (int) $this->maxMileage);
        }
        
        
        if ($this->make) {
            $query->where('make', $this->make);
        }
        
        if ($this->variant) {
            $query->where('variant', $this->variant);
        }
        
        
        if ($this->vyear) {
            $query->where('vyear', $this->vyear);
        }
        
        if ($this->colour) {
            $query->where('colour', $this->colour);
        }
        
        if ($this->vcondition) {
            $query->where('vcondition', $this->vcondition);
        }

        if ($this->transmission) {
            $query->where('transmission', $this->transmission);
        }

        if ($this->fueltype) {
            $query->where('fueltype', $this->fueltype);
        }

        if ($this->bodytype) {
            $query->where('bodytype', $this->bodytype);
        }
        
        return $query;
    }
    
    // Reset dependent filters when make changes
    public function updatedMake()
    {
        $this->variant = '';
        $this->vyear = '';
        $this->colour = '';
        $this->vcondition = '';
        $this->priceRanges = '';
        $this->mileageRanges = '';
        $this->transmissions = '';
        $this->fueltypes = '';
        $this->bodytypes = '';
        $this->resetPage();
    }
    
    // Reset other filters when variant changes
    public function updatedVariant()
    {
        $this->vyear = '';
        $this->colour = '';
        $this->vcondition = '';
        $this->priceRanges = '';
        $this->mileageRanges = '';
        $this->transmissions = '';
        $this->fueltypes = '';
        $this->bodytypes = '';
        $this->resetPage();
    }
    
    public function updating($property){
        $this->resetPage();
    }
}