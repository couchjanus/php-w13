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
    <form class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
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
                <label for="category_id" class="col-sm-2 control-label">Product Category</label>
                <select class="form-control" id="category_id" name="category_id">
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
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Product Description">
            </div>

            <div class="form-group row" id="drop-area">
                <div class="container-fluid">
                    <div class="card border-success text-center mb-3">
                        <div class="card-header bg-transparent border-success">
                            <label for="title">Add Image To Post:</label>
                        </div>
                        <div class="card-body text-success">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="file" id="fileElem" multiple accept="image/*"
                                        name="image">
                                </div>
                                <div class="col-md-4">
                                    <p>Drop Picture Here</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-success">Footer</div>
                    </div>
                </div>
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
            <button id="save" type="submit" class="save btn btn-primary"><span data-feather="plus"></span> Add
                Product</button>
        </div>
    </form>
</div>