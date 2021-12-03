<?php
function getHeader()
{
    require "./adminHeader.php";
}

function getFooter()
{
    require "./adminFooter.php";
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
        <div class="cards">
            <div class="card statics-card card-activate" style="background-color: #8CF0F0">
                <h4 class="statics statics-card">120k</h4>
                <span>Requests per day</span>
            </div>
            <div class="card statics-card">
                <h4 class="statics ">129k</h4>
                <span>New Users Register</span>
            </div>
            <div class="card statics-card">
                <h4 class="statics">140k</h4>
                <span>Booking Registers</span>
            </div>
        </div>
    </section>
</main>
<?php getFooter(); ?>