
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div>
                <h4 class="mb-3">Filter Vehicles</h4>
                <div class="filter-container">
                    <!-- Total Results -->
                    <div class="mb-3">
                        <strong>{{ $totalResults }} vehicles found</strong>
                    </div>
                    
                    <!-- Make Filter -->
                    <div class="form-group mb-3">
                        <label for="make">Make</label>
                        <select wire:model.live="make" id="make" class="form-select">
                            <option value="">All Makes</option>
                            @foreach($makes as $makeOption)
                                <option value="{{ $makeOption->make }}">
                                    {{ $makeOption->make }} ({{ $makeOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Variant/Model Filter -->
                    <div class="form-group mb-3">
                        <label for="variant">Model</label>
                        <select wire:model.live="variant" id="variant" class="form-select" {{ $make ? '' : 'disabled' }}>
                            <option value="">{{ $make ? 'All Models' : 'Select Make First' }}</option>
                            @foreach($variants as $variantOption)
                                <option value="{{ $variantOption->variant }}">
                                    {{ $variantOption->variant }} ({{ $variantOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Year Filter -->
                    <div class="form-group mb-3">
                        <label for="vyear">Year</label>
                        <select wire:model.live="vyear" id="vyear" class="form-select">
                            <option value="">All Years</option>
                            @foreach($years as $yearOption)
                                <option value="{{ $yearOption->vyear }}">
                                    {{ $yearOption->vyear }} ({{ $yearOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Colour Filter -->
                    <div class="form-group mb-3">
                        <label for="colour">Colour</label>
                        <select wire:model.live="colour" id="colour" class="form-select">
                            <option value="">All Colours</option>
                            @foreach($colours as $colourOption)
                                <option value="{{ $colourOption->colour }}">
                                    {{ $colourOption->colour }} ({{ $colourOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <!-- Condition Filter -->
                    <div class="form-group mb-3">
                        <label for="vcondition">Condition</label>
                        <select wire:model.live="vcondition" id="vcondition" class="form-select">
                            <option value="">All Conditions</option>
                            @foreach($conditions as $conditionOption)
                                <option value="{{ $conditionOption->vcondition }}">
                                    {{ $conditionOption->vcondition }} ({{ $conditionOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group mb-3">
                        <label for="transmission">Transmission</label>
                        <select wire:model.live="transmission" id="transmission" class="form-select">
                            <option value="">All Transmissions</option>
                            @foreach($transmissions as $transmissionOption)
                                <option value="{{ $transmissionOption->transmission }}">
                                    {{ $transmissionOption->transmission }} ({{ $transmissionOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fueltype">Fuel Type</label>
                        <select wire:model.live="fueltype" id="fueltype" class="form-select">
                            <option value="">All Fuel Types</option>
                            @foreach($fueltypes as $fueltypeOption)
                                <option value="{{ $fueltypeOption->fueltype }}">
                                    {{ $fueltypeOption->fueltype }} ({{ $fueltypeOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="bodytype">Body Type</label>
                        <select wire:model.live="bodytype" id="bodytype" class="form-select">
                            <option value="">All Body Types</option>
                            @foreach($bodytypes as $bodytypeOption)
                                <option value="{{ $bodytypeOption->bodytype }}">
                                    {{ $bodytypeOption->bodytype }} ({{ $bodytypeOption->count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Price Range</label>
                        <div class="d-flex">
                            <select wire:model.live="minPrice" class="form-select me-2">
                                <option value="">Min Price</option>
                                @foreach($priceRanges as $price => $formattedPrice)
                                    <option value="{{ $price }}">{{ $formattedPrice }}</option>
                                @endforeach
                            </select>
                            <select wire:model.live="maxPrice" class="form-select">
                                <option value="">Max Price</option>
                                @foreach($priceRanges as $price => $formattedPrice)
                                    <option value="{{ $price }}">{{ $formattedPrice }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label>Mileage Range</label>
                        <div class="d-flex">
                            <select wire:model.live="minMileage" class="form-select me-2">
                                <option value="">Min Mileage</option>
                                @foreach($mileageRanges as $mileage => $formattedMileage)
                                    <option value="{{ $mileage }}">{{ $formattedMileage }}</option>
                                @endforeach
                            </select>
                            <select wire:model.live="maxMileage" class="form-select">
                                <option value="">Max Mileage</option>
                                @foreach($mileageRanges as $mileage => $formattedMileage)
                                    <option value="{{ $mileage }}">{{ $formattedMileage }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
                    <!-- Results per page -->
                    <div class="form-group mb-3">
                        <label for="perPage">Results per page</label>
                        <select wire:model.live="perPage" id="perPage" class="form-select">
                            <option value="12">12</option>
                            <option value="24">24</option>
                            <option value="48">48</option>
                        </select>
                    </div>
                </div>
                
                
            </div>
        </div>
        <div class="col-md-9">
            @if($posts->count() > 0)
                <div class="alert alert-info mt-3">
                    {{ $totalResults }}  vehicles match your filter criteria.
                </div>
                <div class="row">
                
                    @foreach ($posts as $post)
                        <div class="col-md-4 mb-4">
                            <a wire:navigate href="/showroom/{{ $post->id }}" class="vehicle-link">
                                <div class="vehicles">
                                    <div class="img-holder">
                                        @if ($post->image1)
                                            <img src="{{ $post->image1 }}" class="car-img" alt="{{ $post->vehiclename }}">
                                        @else
                                            <img src="https://fakeimg.pl/300x300" class="car-img" alt="{{ $post->vehiclename }}">
                                        @endif
                                    </div>
                                    <div class="heading-holder">
                                        <h3 class="car-price">
                                            R {{ $post->formattedsellingprice }}
                                        </h3>
                                        <h6 class="vehicle-heading">{{ $post->make }}<br/>{{ $post->variant }}</h6>
                                    </div>
                                    <div class="car-content">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="vehicle-text">
                                                    Year: {{ $post->vyear }}<br />
                                                    Mileage: {{ $post->formattedmileage }}<br />
                                                    Colour: {{ $post->colour }}<br />
                                                    Condition: {{ $post->vcondition }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info mt-3">
                    No vehicles match your filter criteria. Try adjusting your filters.
                </div>
            @endif
        </div>
            
        <div class="d-flex justify-content-center">
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
       
    </div>
</div>
