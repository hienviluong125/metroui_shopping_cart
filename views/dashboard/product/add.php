<div class="shifted-content-2 h-100 p-ab">

    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>

    <div class="h-100 p-4">
        <div class="grid">
            <div class="row">
                <form class="ml-2"  method="POST" enctype='multipart/form-data'>
                    <p class="float-left bg-darkGrayBlue fg-white p-2 mb-2  border-radius-4" id="add_frm">
                        <span class="mif-add"></span>
                        Thêm sản phẩm
                    </p>
                    <input type="text" name="name" placeholder="Nhập tên" data-role="input">
                    <input class="mt-2" type="file" name="image" data-role="file" data-prepend="Thêm hình:">
                    <input class="mt-2" type="text" name="price" placeholder="Nhập giá" data-role="input">
                    <select class="mt-2" name="category"  data-role="select" filter="false">
                        <?php foreach($data['categories'] as $item){ ?>
                        <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
                        <?php } ?>
                    </select>
                    <select class="mt-2" name="brand" data-role="select" filter="false">
                        <?php foreach($data['brands'] as $item){ ?>
                        <option value="<?php echo $item->id ?>"><?php echo $item->name ?></option>
                        <?php } ?>
                    </select>
                    <input class="mt-2" type="text" name="quantity" placeholder="Nhập số lượng" data-role="input">
                    <input class="mt-2" type="text" name="origin" placeholder="Nhập xuất xứ" data-role="input">
                    <textarea class="mt-2" placeholder="Nhập mô tả" name="description" data-role="textarea"></textarea>

                    <button name="add" id="add-btn" type="submit" class="button rounded success mt-3">
                        Thêm
                    </button>
                    <button id="cancel-btn" class="button rounded alert mt-3">
                        Hủy
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>