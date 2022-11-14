<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý sản phẩm</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <!-- container main -->
    <main class="container__main">
        <div class="container__main-handler">
            <div class="container__main-link">
                <a data-bs-toggle="modal" data-bs-target="#openModal" class="text-white">
                    <i class="fa-solid fa-plus"></i>
                    Tạo sản phẩm mới
                </a>
            </div>
            <div class="container__main-search">
                <form action="">
                    <input type="search" name="search" id="" placeholder="Tìm kiếm sản phẩm">
                </form>
            </div>
        </div>
        <div class="container__table">
            <table>
                <tr>
                    <th>Tên loại sản phẩm</th>
                    <th>Miêu tả</th>
                    <th>Tính năng</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td class="container__table-desc-parent">
                        <div class="container__table-desc">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit eos recusandae unde
                                itaque laborum laboriosam voluptatibus assumenda! Unde sint provident earum,
                                repellendus placeat saepe maiores commodi nisi temporibus tempora quo natus? Neque
                                perferendis quia mollitia at facere est soluta autem! Voluptatem eum porro esse
                                necessitatibus architecto? Reiciendis facilis nisi laborum inventore! Dolore aliquid
                                ullam cum odit labore officiis expedita quo soluta dicta, vitae consequatur ratione
                                eveniet, quod itaque, minus dolores magnam. Repudiandae magnam voluptatibus sed
                                debitis culpa, nesciunt est soluta dolor explicabo inventore dolorum neque nobis
                                pariatur quae totam, sequi laboriosam quidem. Neque totam, exercitationem incidunt
                                architecto quos inventore nemo autem quo dicta doloremque odit facilis! Ea, facilis
                                quam officiis minus eum itaque porro iste, libero vitae odio quaerat corrupti.
                                Distinctio ut aliquam illum at itaque porro, expedita laboriosam quas sequi dolorum
                                fugit molestiae, atque iusto eaque iste fugiat qui magnam similique minus a?
                                Deserunt ipsam ad praesentium quisquam minus reiciendis reprehenderit minima
                                accusamus, consequuntur a dolore perspiciatis fugit aperiam? Impedit tempore
                                recusandae laudantium maxime magnam! Vero, at officia unde consequuntur, fugit
                                blanditiis cupiditate dolore qui eligendi deleniti vitae incidunt accusantium animi
                                rerum soluta doloremque veniam laboriosam exercitationem earum, reprehenderit error
                                maxime ad aliquid. Rem, quis. Ex quia nostrum harum?</p>
                        </div>
                    </td>
                    <td>
                        <a href="edit.html">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</main>

<!-- Modal -->
<div class="modal fade modal-xl" id="openModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3" id="exampleModalLabel">Thêm danh mục sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="action-product-category.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Tên danh mục</label>
                        <input type="text" class="form-control fs-3" name="name-product-category"
                            placeholder="Tên danh mục">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fs-3">Mô tả danh mục</label>
                        <textarea class="form-control fs-3" id="" rows="3" name="desc-product-category"></textarea>
                    </div>
                    <!-- <button id="btnSubmit" class="btn btn-primary">oke</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger fs-4" data-bs-target="submit-form">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>