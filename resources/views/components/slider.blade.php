<section class=" slider_section position-relative">
    <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="object-fit: cover; height:400px;">
                <div class="img-box">
                    <img src="{{ asset('storage/images/wallpaperbetter.com_1920x1080.jpg') }}" alt="">
                </div>
            </div>
            <div class="carousel-item"style="object-fit: cover; height:400px;">
                <div class="img-box">
                    <img src="{{ asset('storage/images/slider-img.jpg') }}" alt="">
                </div>
            </div>
            <div class="carousel-item"style="object-fit: cover; height:400px;">
                <div class="img-box">
                    <img src="{{ asset('storage/images/wallpaperbetter.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <img src="{{ asset('storage/images/prev.png') }}" alt="" style="margin-right: -30px">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <img src="{{ asset('storage/images/next.png') }}" alt="" style="margin-left: -30px">
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
