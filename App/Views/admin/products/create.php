<?php
require_once VIEWS.'partials/admin/_head.php';
?>
<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">
            <h3>
                <?= $title;?>
            </h3>
        </div>
        <a href="/admin/products"><button class="btn btn-primary pull-right"> Go back</button></a>
    </div>
</div>
<div class="table-responsive">
    <form class="form-horizontal" method="POST" role="form" id="idForm">
        <div class="panel-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
            </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Product Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
                
            </div>
            <div class="form-group">
                <label for="category" class="col-sm-2 control-label">Product Category</label>
                <select class="form-control" id="category" name="category">
                        <?php if (is_array($categories)) : ?>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->id; ?>">
                            <?php echo $category->name; ?>
                        </option>
                        <?php endforeach; ?>
                        <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="brand" class="col-sm-2 control-label">Product Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Product brand">
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="description">Product Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Product Description">
            </div>


            <div class="form-group">
                <label for="is_new" class="col-sm-2 control-label">Is New</label>
                <select name="is_new" class="form-control">
                        <option value="1" selected>Да</option>
                        <option value="0">Нет</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1" selected>Отображается</option>
                    <option value="0">Скрыт</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button id="save" type="submit" class="save btn btn-primary"><span data-feather="plus"></span> Add Product</button>
        </div>
    </form>

</div>

<?php
require_once VIEWS.'partials/admin/_footer.php';