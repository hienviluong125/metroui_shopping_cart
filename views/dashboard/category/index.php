<div class="grid">
    <div class="row">
        <div class="cell-12">
            <div class="row">
                <div class="cell-6">
                    <form id="categoryAddForm" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Nhập loại:" name="name" id="cateName" data-role="input">
                        <input class="mt-2" type="file" id="file" name="image" data-role="file" data-prepend="Thêm hình:">
                        <button id="add-btn" class="button rounded success mt-3">
                            Thêm
                        </button>
                        <button id="cancel-btn" class="button rounded alert mt-3">
                            Hủy
                        </button>
                    </form>
                </div>
                <div class="cell-6" id="previewImage">
                    
                </div>
                <div class="cell-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>sad</td>
                                <td>Gates</td>
                                <td>
                                    <button class="button border-btn success small">
                                        <span class="mif-pencil"></span>&ensp;Sửa
                                    </button>
                                    <button class="button border-btn success small bg-red">
                                        <span class="mif-bin"></span>&ensp;Xóa
                                    </button>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>