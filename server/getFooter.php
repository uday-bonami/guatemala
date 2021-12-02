<?php
?>
<footer class="footer footer_padding_one">
    <div class="container footer-padding">
        <div class="row gx-0">
            <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4">
                <h2 class="mb-4 ms-3 mt-3">
                    Quick Links
                </h2>
                <div class="footer-contact ms-3">
                    <ul>
                        <li>
                            <a href="./index.html">Home</a>
                        </li>
                        <li>
                            <a href="./about.html">About Us</a>
                        </li>
                        <li>
                            <a href="./LearnMore.html">Learn More</a>
                        </li>
                        <li>
                            <a href="./faq.html">FAQ</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class=" col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4">
                <h2 class="mb-4 ms-3 mt-3">
                    Contact
                </h2>
                <div class="footer-contact ms-3">
                    <ul>
                        <li>
                            <i class="fas fa-phone-alt me-2 "></i> <a href="tel:(416) 519-3073">(416) 519-3073</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope me-2"></i><a href="mailto:contact@guatemala.com">contact@guatemala.com </a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt me-2"></i>Dummy Address , USA
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xxl-4">
                <h2 class="mb-4 ms-3 mt-3">
                    Social Media
                </h2>
                <div class="f-social ms-3">
                    <ul>
                        <li>
                            <a href="" target="_blank" class=""><i class="fab fa-youtube yt"></i></a>
                            <a href="" target="_blank" class=""><i class="fab fa-facebook-f fb"></i></a>
                            <a href="" target="_blank" class=""><i class="fab fa-instagram ig"></i></a>
                            <a href="" target="_blank" class=""><i class="fab fa-twitter tw"></i></a>
                            <a href="" target="_blank" class=""><i class="fab fa-linkedin-in li"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="py-3 mb-0 text-center border-top">
                    © 2021 Guatemala. All Rights Reserved. Privacy policy | Terms of use | Code of Ethics
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Option 1: Bootstrap Bundle with Popper -->
<!--Script-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="js/global.js"></script>
<script>
    $('.responsive2').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false,
                    nav: true,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
</body>

</html>