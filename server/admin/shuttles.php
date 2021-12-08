<?php
function getHeaders()
{
    require "./adminHeader.php";
}

function getFooter()
{
    require "./adminFooter.php";
}
?>

<?php getHeaders(); ?>
<div class="c-container">
    <h1>Shuttles</h1>
    <button class="c-button">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
            <path d="M0 0h24v24H0z" fill="none" />
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
        </svg>
        Add
    </button>
</div>
<div class="c-container" style="padding: 0px 25px">
    <div class="input-container">
        <input type="text" style="border: none; width: 100%;" id="search" class="c-input" placeholder="Search" />
        <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 0 24 24" width="35px" fill="rgba(0, 0, 0, 0.67)">
            <path d="M0 0h24v24H0z" fill="none" />
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
        </svg>
    </div>
</div>
<div class="table">
    <div class="t-row thead">
        <span class="t-data t-data-b">id</span>
        <span class="t-data">Shuttle</span>
        <span class="t-data">Price</span>
        <span class="t-data">Passenger capacity</span>
        <span class="t-data">Date</span>
        <span class="t-data">Return Date</span>
    </div>
    <div class="t-row t-body">
        <span class="t-data t-data-b">1</span>
        <span class="t-data">Maharaja</span>
        <span class="t-data">$500</span>
        <span class="t-data">200</span>
        <span class="t-data">20-01-2021</span>
        <span class="t-data">20-01-2021</span>
    </div>
    <div class="t-row t-body">
        <span class="t-data t-data-b">2</span>
        <span class="t-data">Spider-man</span>
        <span class="t-data">$500</span>
        <span class="t-data">200</span>
        <span class="t-data">20-01-2021</span>
        <span class="t-data">20-01-2021</span>
    </div>
</div>
<?php getFooter(); ?>