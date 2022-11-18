<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý bình luận</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <!-- <a href="add-customer.php">
                    Thêm người dùng mới
                </a> -->
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm bình luận" value="<?php if (isset($_GET['search'])) {
                                                                                                            echo $_GET['search'];
                                                                                                        } ?>" />
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Nội dung bình luận</th>
                    <th>Người bình luận</th>
                    <th>Sản phẩm bình luận</th>
                    <th>Thời gian</th>
                    <th>Tính năng</th>
                </tr>
                <!-- render-products -->
                <?php foreach ($list_comments as $key => $each) : ?>
                <tr>
                    <td class="container__table-desc-parent">
                        <div class="container__table-desc">
                            <p><?= $each->comment_content; ?></p>
                        </div>
                    </td>
                    <td><?= $each->name_customer; ?></td>
                    <td><?= $each->name; ?></td>
                    <td><?= $each->timeComment; ?></td>
                    <td>
                        <a href="delete-comment.php?id=<?= $each->id_comment; ?>">
                            xóa
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination pb-3 d-flex justify-content-center">
                <?php for ($i = 1; $i <= $number_page; $i++) { ?>
                <li class="page-item">
                    <a class="page-link fs-3 px-3 text-danger mx-1"
                        href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
                        <?php echo $i ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </main>
</main>