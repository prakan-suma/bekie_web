<?php require 'header.php'; ?>

<!-- ===============Body================= -->
<main class="p-5">

    <section class="search">
        <form action="search.php" method="post" class="m-auto col-5">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="ค้นหา....">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary"> ค้นหา </button>
                </div>
            </div>
        </form>
    </section>

    <div>
        <h4>สินค้าขายดี</h4>
        <div class="cd">
            <div class="cd-it">
                <img src="img/bamboo-shoot-soup.jpg" alt="">
                <p>แกงหน่อไม้</p>
                <div class="d-flex justify-content-between">
                    <p>อร่อยมาก</p>
                    <p>50 บาท</p>
                </div>
            </div>
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination dsd">
            <li class="page-item">
                <a class="btn-ac-link" href="" aria-label="Previous">
                    <span aria-hidden="true" class="btn btn-outline-primary">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            <li class="page-item ml-1 mr-1"> <a class="btn-ac-link" href=""></a> </li>

            <li class="page-item">
                <a class="btn-ac-link" href="" aria-label="Next">
                    <span aria-hidden="true" class="btn btn-outline-primary">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</main>

<?php require 'footer.php'; ?>