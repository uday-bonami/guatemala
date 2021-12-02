<?php
function getHeaders()
{
    require "./getHeader.php";
}

function getFooters()
{
    require "./getFooter.php";
}
?>

<?php getHeaders(); ?>
<section class="hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-12 banner_container">
                <div class="hero-content">
                    <div class="hero-heading">
                        <div class="main-logo text-center">
                            <img src="./img/big-logo.png" class="img-fluid py-2">
                        </div>
                        <h1 class="text-center">Shuttle & Private Transport</h1>
                        <!-- <p class="mt-2 mt-lg-4">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry.
              </p> -->
                        <div class="row  gx-0">
                            <div class=" col-12 bg-white booking-form p-3 mt-3">
                                <form class="row">
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                                        <label for="inputEmail4" class="form-label">From</label>
                                        <input type="text" class="form-control" placeholder="Guatemala" id="inputEmail4" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                                        <label for="inputPassword4" class="form-label">Destination</label>
                                        <input type="text" class="form-control" placeholder="Honduras" id="inputPassword4" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                                        <label for="date" class="form-label">Date</label>
                                        <input type="date" class="form-control" id="date" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                                        <label for="return" class="form-label">Return Date</label>
                                        <input type="date" class="form-control" id="return" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                                        <label for="passenger" class="form-label">Passenger</label>
                                        <input type="number" class="form-control" placeholder="2 Passenger" value="Passenger" id="passenger" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                                        <label for="passenger" class="form-label"></label>
                                        <button class="btn main-btn text-center">Search</button>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Return car to different location
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <!-- <div class="car-one"></div> -->
        <img src="./img/car.png" alt="" class="car-one img-fluid" />
    </div>
</section>
<main>
    <!-- beer card -->
    <section class="pt-5">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-md-0 col-xxl-3 gx-5">
                    <div class="free-beer row align-items-center py-sm-5 py-md-3 ">
                        <div class="col-4 col-lg-12 order-1 order-md-0 cardDiv">
                            <img src="img/1.png" class="img-fluid" />
                        </div>
                        <div class="beer-content mt-3 col-8 col-sm-8 col-md-12 ">
                            <h5>The Cheapest!</h5>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and typesetting
                                industry.
                            </p>
                            <a href="./LearnMore.html" class="home_readMore"> Read more <i class="fas fa-arrow-right arrow_hover"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-md-0 col-xxl-3 gx-5">
                    <div class="free-beer py-sm-5 py-md-3 row align-items-center">
                        <div class="col-4 col-lg-12 order-1 order-md-0 cardDiv">
                            <img src="img/2.png" class="img-fluid" />

                        </div>
                        <div class="beer-content mt-3 col-8 col-sm-8 col-md-12 ">
                            <h5>Free Beer</h5>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and typesetting
                                industry.
                            </p>
                            <a href="./LearnMore.html" class="home_readMore"> Read more <i class="fas fa-arrow-right arrow_hover"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-xxl-0 col-xxl-3 gx-5">
                    <div class="free-beer row align-items-center py-sm-5 py-md-3">
                        <div class="col-4 col-lg-12 order-1 order-md-0 cardDiv">
                            <img src="img/3.png" class="img-fluid" />
                        </div>
                        <div class="beer-content mt-3 col-8 col-sm-8 col-md-12 ">
                            <h5>Loyalty Program</h5>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and typesetting
                                industry.
                            </p>
                            <a href="./LearnMore.html" class="home_readMore"> Read more <i class="fas fa-arrow-right arrow_hover"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-4 mt-xxl-0 col-xxl-3 gx-5">
                    <div class="free-beer row align-items-center py-sm-5 py-md-3">
                        <div class="col-4 col-lg-12 order-1 order-md-0 cardDiv">
                            <img src="img/4.png" class="img-fluid" />
                        </div>
                        <div class="beer-content mt-3 col-8 col-sm-8 col-md-12">
                            <h5>Plan Your Holiday</h5>
                            <p>
                                Lorem Ipsum is simply dummy text of printing and typesetting
                                industry.
                            </p>
                            <a href="./LearnMore.html" class="home_readMore"> Read more <i class="fas fa-arrow-right arrow_hover"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end beer cards -->
    <!-- Explore Top Routes -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="global-heading-1">
                    <h1>Explore Top Routes</h1>
                </div>
            </div>
            <div class="row pt-5 responsive2">
                <div class="col-12 col-md-6 col-lg-4 col-xl-">
                    <div class="explore-img">
                        <img src="img/Rectangle 757.png" class="w-100 img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <p class="mb-0 ">Lorem lpsum</p>
                        <h4>Enjoy the Beauty of the Floating City</h4>
                        <div class="stars-main d-flex align-items-center">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="go-icon ms-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-">
                    <div class="explore-img">
                        <img src="img/Rectangle 759.png" class="w-100 img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <p class="mb-0 ">Lorem lpsum</p>
                        <h4>Enjoy the Beauty of the Floating City</h4>
                        <div class="stars-main d-flex align-items-center">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="go-icon ms-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-1 mt-md-0 col-lg-4">
                    <div class="explore-img">
                        <img src="img/Rectangle 758.png" class="w-100 img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <p class="mb-0">Lorem lpsum</p>
                        <h4>Enjoy the Beauty of the Floating City</h4>
                        <div class="stars-main d-flex align-items-center">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="go-icon ms-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-1 mt-lg-0 col-lg-4">
                    <div class="explore-img">
                        <img src="img/Rectangle 759.png" class="w-100 img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <p class="mb-0">Lorem lpsum</p>
                        <h4>Enjoy the Beauty of the Floating City</h4>
                        <div class="stars-main d-flex align-items-center">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="go-icon ms-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-1 mt-lg-0 col-lg-4">
                    <div class="explore-img">
                        <img src="img/Rectangle 759.png" class="w-100 img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <p class="mb-0">Lorem lpsum</p>
                        <h4>Enjoy the Beauty of the Floating City</h4>
                        <div class="stars-main d-flex align-items-center">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="go-icon ms-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="section_padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6">
                    <img src="img/Group 20.png" class="img-fluid">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xxl-6 bg-about">
                    <div class="global-heading-1">
                        <h1 class="my-4">About Us</h1>
                    </div>
                    <p>
                        We are travelers, just like you. Looking for flexibility and
                        adventure.
                    </p>
                    <p>Let me start off with a question. "Why would you pay more"</p>
                    <p>
                        While traveling in, for example, Mexico or Colombia, we always
                        book our shuttles and busses through the website of the big bus
                        companies themself. Why would we pay more to a hotel, hostel or
                        shuttle service to do something that we could so easily do
                        ourselves?
                    </p>
                    <p>
                        In countries like Guatemala, it's different. There are dozens of
                        small local companies, all doing only a few connections in their
                        specific part of the country. They don't have websites or take
                        individual bookings. Your only option was to use shuttle
                        services.
                    </p>
                    <p>That's when the idea of 'Guatemala shuttles' was born!</p>
                    <a href="./about.html" class="btn main-btn text-center">Read more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- service -->
    <section class="pt-5 pb-3 section-padding bg-service">
        <div class="container bg-white service-container px-5 py-3">
            <div class="row">
                <div class="global-heading-1">
                    <h1 class="text-center mt-4">Services</h1>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-12 col-lg-6 col-xl-4 gx-5 mb-5">
                    <div class="explore-img justify-content-center d-flex">
                        <img src="img/service-1.png" class="img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <h4>Shuttles</h4>
                        <div class="d-flex">
                            <p class="mb-0 service_para" style="line-height: 26px">
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.
                            </p>
                            <div class="go-icon mt-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 gx-5 mb-5">
                    <div class="explore-img justify-content-center d-flex">
                        <img src="img/service-2.png" class="img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <h4>Private Transportation</h4>
                        <div class="d-flex">
                            <p class="mb-0 service_para" style="line-height: 26px">
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.
                            </p>
                            <div class="go-icon mt-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-4 gx-5 mb-5">
                    <div class="explore-img justify-content-center d-flex">
                        <img src="img/service-3.png" class="img-fluid" />
                    </div>
                    <div class="explore-card mx-4">
                        <h4>International Shuttles</h4>
                        <div class="d-flex">
                            <p class="mb-0 service_para" style="line-height: 26px">
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.
                            </p>
                            <div class="go-icon mt-auto d-flex align-items-center justify-content-center">
                                <a href=""><i class="fas fa-arrow-right d-flex justify-content-center"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php getFooters(); ?>