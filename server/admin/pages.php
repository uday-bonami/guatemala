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
<div class="cards" style="flex-direction: column;">
    <h1>Site Pages</h1>
    <div class="cards">
        <div class="card">
            <img src="/img/about.svg" class="card-img-top" alt="about">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold">About Page</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/admin/editor" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
            </div>
        </div>
        <div class="card">
            <img src="/img/faq.svg" class="card-img-top" alt="faq">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold">FAQ Page</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/admin/editor" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
            </div>
        </div>
        <div class="card">
            <img src="/img/blog.svg" class="card-img-top" alt="blog">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold">Blog Page</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/admin/editor" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
            </div>
        </div>
    </div>
</div>
<?php getFooter(); ?>