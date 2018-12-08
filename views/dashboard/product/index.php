<!-- <div class="h-100 p-4">
    <div class="grid">
        <div class="row">
            <div class="cell-12">
            <button class="button secondary rounded" id="add_edit_frm">
                <span class="mif-add"></span>
                Thêm sản phẩm
            </button>
                <div class="pos-relative">
                    <div data-role="collapse" data-toggle-element="#add_edit_frm">
                        <div class="row mt-2">
                            <form>
                            <div class="cell-6">
                                <input type="text" placeholder="Nhập tên" data-role="input">
                                <input class="mt-2" type="file" data-role="file" data-prepend="Thêm hình:">
                                <input class="mt-2" type="text" placeholder="Giá bán" data-role="input">
                                <input class="mt-2" type="text" placeholder="Số lượng bán" data-role="input">
                                <button class="button rounded success mt-3">
                                    Thêm
                                </button>
                                <button class="button rounded alert mt-3">
                                    Hủy
                                </button>
                            </div>
                            <div class="cell-6">
                                <textarea data-role="textarea" placeholder="Mô tả" data-clear-button="false"></textarea>
                                <input class="mt-2" type="text" placeholder="Xuất xứ" data-role="input">
                                <select class="mt-3" data-role="select">
                                    <option value="1">Bàn Phím</option>
                                    <option value="1">Màn Hình</option>
                                    <option value="1">Amazon</option>
                                    <option value="1">Amazon</option>
                                </select>
                                <select data-role="select">
                                    <option value="1">Bàn Phím</option>
                                    <option value="1">Màn Hình</option>
                                    <option value="1">Amazon</option>
                                    <option value="1">Amazon</option>
                                </select>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="cell-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Giá bán</th>
                            <th>Lượt xem</th>
                            <th>Số lượng</th>
                            <th>Xuất xứ</th>
                            <th>Hình ảnh</th>
                            <th>Loại</th>                         
                            <th>NSX</th>
                            <th>Tình trạng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>sad</td>
                            <td>Billxxxxxxxxxxxxxxxxxxxx</td>
                            <td>Gates</td>
                            <td>@billy</td>
                            <td>sad</td>
                            <td>sad</td>
                            <td>sad</td>
                            <td>sad</td>
                            <td>sad</td>
                            <td>ád</td>
                            <td>
                                <button class="button rounded success ">
                                    <span class="mif-pencil">
                                    </span>
                                    Sửa
                                </button>
                                <button class="button rounded alert">
                                    <span class="mif-bin">
                                    </span>
                                    Xóa
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

 -->







 <div class="grid">
    <div class="row manager" data-state="adding">
        <div class="cell-12 adding">
            <button class="button secondary rounded" id="add_frm" >
                <span class="mif-add"></span>
                Thêm loại sản phẩm
            </button>
            <div class="pos-relative">
                <div data-role="collapse" data-toggle-element="#add_frm" data-collapsed="true">
                    <div class="row mt-2">
                        <div class="cell-12">
                            <form id="categoryAddForm" action="POST" enctype='multipart/form-data'>
                                <div class="row">
                                    <div class="cell-4">
                                        <input type="text" placeholder="Nhập tên" data-role="input">
                                        <input class="mt-2" type="file" data-role="file" data-prepend="Thêm hình:">
                                        <input class="mt-2" type="text" placeholder="Giá bán" data-role="input">
                                        <input class="mt-2" type="text" placeholder="Số lượng bán" data-role="input">
                                        <button class="button rounded success mt-3">
                                            Thêm
                                        </button>
                                        <button class="button rounded alert mt-3">
                                            Hủy
                                        </button>
                                    </div>
                                    <div class="cell-4">
                                        <textarea data-role="textarea" placeholder="Mô tả" data-clear-button="false"></textarea>
                                        <input class="mt-2" type="text" placeholder="Xuất xứ" data-role="input">
                                        <select class="mt-3" data-role="select">
                                            <option value="1">Bàn Phím</option>
                                            <option value="1">Màn Hình</option>
                                            <option value="1">Amazon</option>
                                            <option value="1">Amazon</option>
                                        </select>
                                        <select data-role="select">
                                            <option value="1">Bàn Phím</option>
                                            <option value="1">Màn Hình</option>
                                            <option value="1">Amazon</option>
                                            <option value="1">Amazon</option>
                                        </select>
                                    </div>
                                    <div class="cell-4 image-list">
                                        <input class="mt-2" type="file" data-role="file" data-prepend="Hình ảnh phụ 1:">
                                        <input class="mt-2" type="file" data-role="file" data-prepend="Hình ảnh phụ 2:">
                                        <input class="mt-2" type="file" data-role="file" data-prepend="Hình ảnh phụ 3:">
                                  
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="cell-12 editing" style="display:none">
                <button class="button secondary rounded" id="add_frm" >
                        <span class="mif-add"></span>
                        Thêm loại sản phẩm
                    </button>
                    <div class="pos-relative">
                        <div data-role="collapse" data-toggle-element="#add_frm" data-collapsed="true">
                            <div class="row mt-2">
                                <div class="cell-12">
                                    <form id="categoryAddForm" action="POST" enctype='multipart/form-data'>
                                        <div class="row">
                                            <div class="cell-6">
                                                <input type="text" placeholder="Nhập tên" data-role="input">
                                                <input class="mt-2" type="file" data-role="file" data-prepend="Thêm hình:">
                                                <input class="mt-2" type="text" placeholder="Giá bán" data-role="input">
                                                <input class="mt-2" type="text" placeholder="Số lượng bán" data-role="input">
                                                <button class="button rounded success mt-3">
                                                    Thêm
                                                </button>
                                                <button class="button rounded alert mt-3">
                                                    Hủy
                                                </button>
                                            </div>
                                            <div class="cell-6">
                                                <textarea data-role="textarea" placeholder="Mô tả" data-clear-button="false"></textarea>
                                                <input class="mt-2" type="text" placeholder="Xuất xứ" data-role="input">
                                                <select class="mt-3" data-role="select">
                                                    <option value="1">Bàn Phím</option>
                                                    <option value="1">Màn Hình</option>
                                                    <option value="1">Amazon</option>
                                                    <option value="1">Amazon</option>
                                                </select>
                                                <select data-role="select">
                                                    <option value="1">Bàn Phím</option>
                                                    <option value="1">Màn Hình</option>
                                                    <option value="1">Amazon</option>
                                                    <option value="1">Amazon</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
        </div>
        <div class="cell-12 mt-5">
            <div class="custom-table">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <ul data-page="1" class="pagination dark rounded flex-justify-center">
            </ul>
        </div>
    </div>
</div> 