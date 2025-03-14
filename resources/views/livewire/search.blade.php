<div x-data="{ isOpen: false }">
    <button x-on:click="isOpen = true; setTimeout(() => document.querySelector('#live-search-field').focus(), 50)" style="background: none; border: none; padding: 0; margin: 0; outline: none; cursor: pointer" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fa-solid fa-magnifying-glass floating-search-icon"></i></button>


    <div class="search-overlay" x-bind:class="isOpen ? 'search-overlay--visible' : ''">
    <div class="search-overlay-top shadow-sm">
        
      <div class="container results-container">
        <label for="live-search-field" class="search-overlay-icon"><i class="fa-solid fa-magnifying-glass"></i></label>
        <input x-on:keydown="document.querySelector('.circle-loader').classList.add('circle-loader--visible'); if (document.querySelector('#no-results')) {document.querySelector('#no-results').style.display = 'none'}" wire:model.live.debounce.750ms="searchTerm" autocomplete="off" type="text" id="live-search-field" class="live-search-field" placeholder="What are you interested in?">
        <span x-on:click="isOpen = false" class="close-live-search"><i class="fas fa-times-circle"></i></span>
      </div>
    </div>

    <div class="search-overlay-bottom">
      <div class="container results-container xxx">
        <div class="circle-loader"></div>
        <div class="live-search-results live-search-results--visible">
            
            @if (count($results) == 0 && $searchTerm !== "")
            {{-- <style>.results-container.xxx{position:relative;left:-8px;}</style> --}}
            <div class="" style="height:15px;"></div>
            <p id="no-results" class="alert alert-danger text-center shadow-sm">Sorry, we could not find any results for that search.</p>
            <div class="" style="height:15px;"></div>
            @endif

            @if (count($results) > 0)
            <div class="list-group shadow-sm">
                <div class="" style="height:15px;"></div>
      <div class="list-group-item active"><strong>Search Results</strong>
    
        ({{count($results)}} {{count($results) > 1 ? "results" : "result"}} found)

    </div>

    @foreach($results as $post)
    <li>
        {{-- <a class="vehicle-link" href="/showroom/{{ $post->id }}">{{ $post->make }} - {{ $post->model }}</a> --}}
        <a class="vehicle-link" href="/showroom/{{ $post->id }}">
            <div class="mini-vehicle">
                <div class="mini-details-left">
                    <div class="mini-thumbnail" style="background: url('@if ($post->image1){{ $post->image1 }}@else https://fakeimg.pl/300x300 @endif');"></div>
                    <div class="mini-desc">
                        <h6 class="very-small">{{ $post->make }}</h6>, <br/>
                        <span class="super-small mini-car-variant" >{{ $post->model }}</span>
                    </div>
                </div>
                
                <div class="mini-details">
                    <div class="mini-price">
                        R {{ $post->formattedsellingprice }}
                    </div>
                    <div class="clearall" style="height:2px;"></div>
                    <div class="mini-mileage">
                        {{ $post->formattedmileage}} Km
                    </div>
                    <div class="clearall" style="height:2px;"></div>
                    <div class="mini-year">
                        {{ $post->vyear }}
                    </div>
                </div>
            </div>
        </a>
    </li>
@endforeach
</div>
@endif
        </div>
      </div>
    </div>
  </div>
</div>
