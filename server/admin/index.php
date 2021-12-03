<?php
function getHeader()
{
    require "./adminHeader.php";
}
?>

<?php getHeader(); ?>
<main>
    <section class="admin-upgrades">
        <h1 style="font-weight: bold;">Hi, Admin</h1>
        <div class="cards">
            <div class="card">
                <img src="/admin/static/img/about.svg" class="card-img-top" alt="about">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">About Page</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
                </div>
            </div>
            <div class="card">
                <img src="/admin/static/img/faq.svg" class="card-img-top" alt="about">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">FAQ Page</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
                </div>
            </div>
            <div class="card">
                <img src="/admin/static/img/blog.svg" class="card-img-top" alt="about">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">Blog Page</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    </section>
    <section class="statics">
        <h2 style="font-weight: bold;">Analytics Overview</h2>
    </section>
</main>
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