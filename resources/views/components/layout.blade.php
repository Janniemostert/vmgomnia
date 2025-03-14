<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VMG Omni</title>
    {{-- <link rel="stylesheet" href="/main.css"> --}}

    <link rel="stylesheet" href="/bootstrap.css">
    <link rel="stylesheet" href="/bootbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
<section class="top-bar" >
    <div class="container sm">
        <div class="inline">
            <ul class="info-links-left">
                <li class="link-item">
                    <a class="link-alt mh-link" href="mailto:vmgomni@vmg.co.za" target="_blank">
                        <i class="fa-regular fa-envelope"></i>
                        <span style="height:10px;width:10px;"></span>vmgomni@vmg.co.za
                    </a>
                </li>
                
                <li class="link-item">
                    <a class="link-alt mh-link" href="tel:0649072469" target="_blank">
                        <i class="fa-solid fa-phone-flip"></i>
                        <span style="height:10px;width:10px;"></span>+27 64 907 2469
                    </a>
                </li>
            </ul>

            <ul class="info-links-right">
                <li class="link-item">
                    <a class="link-item mh-link" href="https://www.facebook.com" target="_blank">
                        <i class="fa-brands fa-facebook-f" style="font-size:18px"></i>
                    </a>
                </li>
                <li class="link-item">
                    <a class="link-item mh-link" href="https://www.instagram.com" target="_blank">
                        <i class="fa-brands fa-instagram" style="font-size:18px"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<div class="clearall"></div>
    
    <nav class="navbar navbar-expand-xl" >
    
        <div class="container justify-content-between">
            <a wire:navigate class="navbar-brand"style="position:relative" href="/">
                <img src="{{ asset('/logo.png') }}" alt="" width="auto" height="auto" class="d-inline-block align-text-top top-logo">
                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars white-bars"></i>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a wire:navigate class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="nav-link" href="/showroom">Showroom</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href=""><i class="fa-solid fa-user"></i></a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" href=""><i class="fa-regular fa-comment"></i></a>
                        </li>
                        <li class="nav-item relative">
                            <livewire:search/>
                           
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
{{$slot}}

<footer class="footer">
    <div class="container">
        <span class="c-white">Place sticky footer content here.</span>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="/bootstrap.bundle.js"></script>
<script src="/bootbox.all.js"></script>
<script>

document.querySelectorAll("[class^='c-']").forEach((el) => {
    const color = el.className.match(/c-(.+)/)[1]; // Extracts "green" from "c-green"
    el.style.color = getComputedStyle(document.documentElement).getPropertyValue(`--${color}`);
});

</script>
</body>
</html>