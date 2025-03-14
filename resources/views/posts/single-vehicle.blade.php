<x-layout>


    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <div class="spinner-page-overlay"></div>
    <div class="spinner-border spinner-page" role="status" aria-hidden="true"></div>
    
    <div class="clearall" style="height:50px"></div>
    
    <section class="relative">
        <div class="container relative">
            <a class="c-green back-link" onclick="history.back()"><i class="fas fa-angle-double-left"></i> BACK TO SHOWROOM</a>
            <div class="clearall" style="height:10px"></div>
    
            <div class="row" style="position:relative">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12" style="padding-right:0px">
                            @if ($post->image1 )
                                <img src="{{ $post->image1 }}" class="card-img-top" alt="{{ $post->vehiclename }}">
                            @else  
                                <img src="https://fakeimg.pl/600x600" class="card-img-top" alt="{{ $post->vehiclename }}">
                            @endif
                            
                            @if ($post->description)
                                <div class="clearall" style="height:15px;"></div>
                                <h5 class="single-vehicle-h5-heading">Description</h5>
                                <div class="clearall" style="height:15px;"></div>
                                
                                <p class="c-black small-text">
                                    {{ $post->vdescription }}
                                </p>
                            @else
                                <div class="clearall" style="height:15px;"></div>
                                <h5 class="single-vehicle-h5-heading">Description</h5>
                                <div class="clearall" style="height:15px;"></div>
                                <p class="c-black small-text">Contact Us for more information.</p>
                                <div class="clearall" style="height:15px;"></div>
                            @endif
                            @if ($post->extras)
                                <div class="clearall" style="height:15px;"></div>
                                <h5 class="single-vehicle-h5-heading" >Extras</h5>
                                <div class="clearall" style="height:15px;"></div>
                                <div class="small-text">
                                    <div class="row">
                                        @php
                                            $stringy = $post->extras;
                                            $partsy = explode(",", $stringy);
                                        @endphp
                                        
                                        @foreach ($partsy as $part)
                                            <div class="col mw-25 c-black"><i class="fa-solid fa-circle-check c-red"></i> {{ trim($part) }}</div>
                                        @endforeach
                                    </div>
                                    
                                </div>
                                <div class="clearall " style="height:10px;"></div>
                            @else
                                <div class="clearall" style="height:15px;"></div>
                                <h5 class="single-vehicle-h5-heading" >Extras</h5>
                                <div class="clearall" style="height:15px;"></div>
                                <div class="small-text">
                                    <p class="c-black small-text">Contact Us for more information.</p>
                                </div>
                            @endif
                         </div>    
                        <div class="col-lg-6 col-md-12 col-sm-12" style="padding-right:0px">
                            <div class="inline">
                                <div class="small-text">Stock #: {{ $post->stockcode }}</div>
                                <div style="height:10px;width:10px;"></div>
                                <div class="small-text">Year: {{ $post->vyear }}</div>
                                @if ($post->vin)
                                    <div style="height:10px;width:10px;"></div>
                                    <div class="small-text">VIN: {{ $post->vin }}</div>
                                @endif
                            </div>
                            <div class="clearall" style="height:10px"></div>
                            <h5 class="c-black no-margin single-vehicle-h5-heading" >{{ $post->make }} {{ $post->variant }}</h5>
                            <div class="clearall" style="height:15px;"></div>
                            <div class="inline three-sections">
                                <div class="price-h inline one-part sc-price">
                                    R {{ $post->formattedsellingprice }}
                                </div>
                                <span class="estimated-monthly-price one-part"><span class="tiny">Estimated </span><span class="smallerhead">R {{ $post->installment }}</span> <span class="tiny">p/m</span> <span class="smallerhead"><i id="showText"class="far fa-question-circle circle-price"></i><div id="hiddenText" class="btt xbtt">The Calculation displayed assumes a 10% deposit, 72 month finance term at an interest rate of prime + 3%. Fees charged by the finance providers are not included in these calculations. VMG Omni accepts no responsibility for any misunderstanding related to the estimated amount provided on this website. You are strongly advised to submit a full finance application to get a real sense of YOUR actual monthly amounts. You may be pleasantly surprised with the results.</div></span></span>
    
                                
                            </div>
                            
                            <div class="inline feature-three-sections">
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/mileage-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Mileage</p>
                                            <h5 class="fs-12 fw-800">{{ $post->mileage }} KM</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/fuel-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Fuel Type</p>
                                            <h5 class="fs-12 fw-800">{{ $post->fueltype }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/transmission-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Transmission</p>
                                            <h5 class="fs-12 fw-800">{{$post->transmission}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/body-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Body Type</p>
                                            <h5 class="fs-12 fw-800">{{ $post->bodytype }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/seat-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Seats</p>
                                            <h5 class="fs-12 fw-800">{{ $post->seats}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/door-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Doors</p>
                                            <h5 class="fs-12 fw-800">{{ $post->doors }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-specs">
                            <div class="inline feature-three-sections">
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/colour-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Colour</p>
                                            <h5 class="fs-12 fw-800">{{ $post->colour }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/gear-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Gears</p>
                                            <h5 class="fs-12 fw-800">{{ $post->gears }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/cooling-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Cooling</p>
                                            <h5 class="fs-12 fw-800">{{ $post->cooling }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/width-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Width</p>
                                            <h5 class="fs-12 fw-800">{{ $post->width }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/height-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Height</p>
                                            <h5 class="fs-12 fw-800">{{ $post->height }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/length-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Length</p>
                                            <h5 class="fs-12 fw-800">{{ $post->vlength }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/wheel-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Front Tyre Size</p>
                                            <h5 class="fs-12 fw-800">{{ $post->fronttyresize}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/wheel-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Rear Tyre Size</p>
                                            <h5 class="fs-12 fw-800">{{ $post->reartyresize }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="one-feature-part">
                                    <div class="feature-item">
                                        <div class="feature-img">
                                            <img alt="icon"  class="feature-icon" src="{{ asset('/icons/tare-blue-icon.svg') }}">
                                        </div>
                                        <div class="feature-info">
                                            <p class="fs-12">Tare</p>
                                            <h5 class="fs-12 fw-800">{{ $post->tare }}</h5>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            </div>
                            <a class="see-more-btn" ><span class="changeText">More Specifications</span></a>
                            <div class="clearall" style="height:15px;"></div>                  
                            <ul class="vehicle-share-links-right one-part">
                                SHARE
                                <li class="link-items">
                                    <a class="link-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                                        <i class="fa-brands fa-facebook white-icon circle-icon-alt"></i>
                                    </a>
                                </li>
                                <li class="link-items">
                                    <a class="link-item" href="https://twitter.com/intent/tweet?text=Look+what+I+found+on+the+{{ str_replace(' ', '+', config('app.name')) }}+website%3A&&url={{ url()->current() }}" target="_blank">
                                        <i class="fa-brands fa-x-twitter white-icon circle-icon-alt"></i>
                                    </a>
                                </li>
                                <li class="link-items">
                                    <a class="link-item" href="mailto:?subject=Check what I found on the {{ config('app.name') }} Website!&body={{ url()->current() }}" target="_blank">
                                        <i class="fas fa-envelope white-icon circle-icon-alt"></i>
                                    </a>
                                </li>
                                <li class="link-items">
                                    <a class="link-item" href="https://api.whatsapp.com/send?text='Used%20{{ $post->year }}%20{{ $post->make }}%20{{ $post->model }}%20{{ $post->variant }}%20for%20Sale%20-%20R{{ $post->formattedsellingprice }}'+{{ url()->current() }}" target="_blank">
                                        <i class="fa-brands fa-whatsapp white-icon circle-icon-alt"></i>
                                    </a>
                                </li>
                            </ul>
                            
                                <div class="clearall" style="height:30px;"></div>
                            <h5 class="single-vehicle-h5-heading" >Vehicle Enquiry</h5>
                                <div class="clearall" style="height:15px;"></div>
                            <form action="https://newsendemail.vmgsoftware.co.za/api/sendemail" method="post" name="contactform" class="singlecontactform">
                              
                                
    
                                <input type="hidden" value="{{ $post->stockcode }}"
                                        id="vehicle"/>
                                <input type="hidden" value="{{ $post->vehiclename }}"
                                        id="vehicle_name"/>
                                <input type="hidden" value="{{ $post->companyid }}"
                                        id="company_id"/>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="Name" class="form-label">Your Full Name *</label>
                                        <input class="form-control-alt" type="text" placeholder="Your Full Name"aria-label="Your Name" name="name" id="name" required>
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="Phone" class="form-label">Contact Number *</label>
                                        <input class="form-control-alt" type="text" placeholder="Your Contact Number"aria-label="Your Cell NUmber" name="cell" id="cell" required>
                                                
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="Vin" class="form-label">Email Address *</label>
                                        <input class="form-control-alt" type="email" placeholder="Your Email"aria-label="Your Email" name="email" id="email" required>
                                                
                                    </div>
                                </div>
                                
                                <div class="row mb-3" style="padding:15px">
                                    <label for="Message" class="form-label">Message *</label>
                                    <textarea class="form-control-alt" name="message" id="message" rows="3"placeholder="Your Message" required></textarea>
                                </div>  
                                
                                
                                <div class="search-hold">
                                    <button type="submit" class="custom-btn">
                                        SUBMIT
                                    </button>
                                </div>
                                <div class="clearall" style="height:30px;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        
    
        <div class="clearall" style="height:25px;"></div>
        
        <hr class="hr2"/>
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="clearall" style="height:25px;"></div>
                    <h1 class="center josef-font uppercase">Related Vehicles</h1>
                    <div class="clearall" style="height:25px;"></div>
                           RELATED PLACEHOLDER
                            
                    </div>
                </div>
            </div>
            <div class="clearall" style="height:20px;"></div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#showText").on("mouseenter",function(){
                    $("#hiddenText").fadeIn("slow");
                })
                $("#showText").on("mouseleave",function(){
                    $("#hiddenText").fadeOut();
                })
                $(".see-more-btn").on("click",function(e){
                    e.preventDefault()
                    $(".more-specs").fadeToggle('slow');
                    $(".changeText").text(function(i, v){
                        return v === 'More Specifications' ? 'Less Specifications' : 'More Specifications'
                    })
                });
                
            });
        </script>
        <script>
    
            $(document).ready(function () {
                $(".spinner-page").hide();
                $(".spinner-page-overlay").hide();
                $(".singlecontactform").submit(function (event) {
                    event.preventDefault();
                    $(".spinner-page").show();
                    $(".spinner-page-overlay").show();
                    var name = $("#name").val();
                    var cell = $("#cell").val();
                    var email = $("#email").val();
                    var message = $("#message").val();
                    var vehicle = $("#vehicle").val();
                    var vehicleName = $("#vehicle_name").val();
                    var company_id = $("#company_id").val();
                    var branchCode = parseInt(company_id);
    
                    var maildata = {
                        "notification": {
                            "ToList": "jannie@vmgsoftware.co.za",
                            "CcList": email,
                            "BccList": "",
                            "Subject": "VMG Omnia Single Vehicle Enquiry",
                            "Message": "Enquirer Details:<br/>Name: " + name + "<br/>Cell Phone: " + cell + "<br/>Email: " + email + "<br/>Vehicle: " + vehicleName + " (Stock Code: " + vehicle  + ")<br/>Message: " + message,
                            "ToName": "VMG Omnia Support",
                            "FromName": "VMG Omia Support",
                            "FromEmail": "NoReply@vmgomnia.co.za",
                            "Attachments": {}
                        }
                    };
    
                    var post_url = "https://newsendemail.vmgsoftware.co.za/api/sendemail";
                    
                    var params = {
                        action: 'vmg_leads_send_lead',
                        company_id: branchCode,
                        lead_name: name,
                        lead_cellphone: cell,
                        lead_email: email,
                        lead_message: message,
                        lead_stock_code: vehicle
                    }
                  
    
                        $.ajax({
                            url: post_url,
                            type: "POST",
                            data: JSON.stringify(maildata),
                            contentType: "application/json",
                            success: function (response) {
                                
                                $(".spinner-page").hide();
                                $(".spinner-page-overlay").hide();
                                let dialog = bootbox.dialog({
                                    closeButton:false,
                                    title: '<img src="{{ asset("/logo.png") }}" class="img-responsive modal-logo" alt="VMG Omnia Image"/>Thank you for your enquiry.',
                                    message: "<p>We will be in contact with you shortly. Please feel free to contact us with any queries you may have.</p>",
                                    size: 'large',
                                    buttons: {
                                    apply: {
                                            label: "Close",
                                            className: 'btn-success',
                                            callback: function() {
                                                bootbox.hideAll();
                                                $("#name").val("");
                                                $("#cell").val("");
                                                $("#email").val("");
                                                $("#message").val("");
    
                                            }
                                            },
                                    browse: {
                                        label: "Contact Us",
                                        className: 'btn-success',
                                        callback: function(){
                                            
                                        }
                                    }
                                                
                                    }
                                });
                                
                            },
                        });
                  
                    
                });
            });
        </script>
    

    </x-layout>