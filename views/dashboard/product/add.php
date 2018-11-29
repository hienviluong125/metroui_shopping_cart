<?php require_once(ROOTFOLDER . "/views/dashboard/layout/header.php");?>
<div class="container">
    <h2>Add new product</h2>
    <form>
    <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="email" class="form-control" id="productName" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="Price">Price</label>
        <input type="email" class="form-control" id="Price" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="productCategories">Categories</label>
        <select class="form-control" id="productCategories">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="productBrand">Brand</label>
        <select class="form-control" id="productBrand">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="productDesciption">Product desciption</label>
        <textarea class="form-control" id="productDesciption" rows="3"></textarea>
    </div>
    <button class="btn btn-primary">Add product</button>
    </form>
</div>
<?php require_once(ROOTFOLDER . "/views/dashboard/layout/footer.php");?>