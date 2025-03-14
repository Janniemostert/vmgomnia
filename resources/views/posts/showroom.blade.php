<x-layout>
    <div class="container">
        <h1 class="head1">Available Cars</h1>
        
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-3 mb-4">
                    <a wire:navigate href="/showroom/{{ $post->id }} " class="vehicle-link">
                        <div class="vehicles">
                            <div class="img-holder" >
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
                                <h6 class="vehicle-heading">{{ $post->make }}<br/>{{ $post->variant}}</h6>
                            </div>
                            
                            <div class="car-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="vehicle-text">
                                            Year: {{ $post->vyear}}
                                            <br />
                                            Mileage: {{ $post->formattedmileage}}
                                            <br />
                                            Colour: {{ $post->colour}}
                                            <br />
                                            Condition: {{ $post->vcondition}}
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center">
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
            
        </div>
        <div class="clearall" style="height:50px"></div>
    </div>
    </x-layout>