<div class="grid">
    <div class="row categories-manager" data-state="adding">
        <div class="cell-6 adding">
            <button class="button secondary rounded" id="add_frm" >
                <span class="mif-add"></span>
                Thêm loại sản phẩm
            </button>
            <div class="pos-relative">
                <div data-role="collapse" data-toggle-element="#add_frm" data-collapsed="true">
                    <div class="row mt-2">
                        <div class="cell-12">
                            <form id="categoryAddForm" action="POST" enctype='multipart/form-data'>
                                <input type="text" name="name" placeholder="Nhập tên" data-role="input">
                                <input class="mt-2" type="file" name="image" data-role="file" data-prepend="Thêm hình:">
                                <button id="add-btn" class="button rounded success mt-3">
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
        </div>
        <div class="cell-6 editing" style="display:none">
            <button class="button info rounded" id="edit_frm">
                <span class="mif-pencil"></span>
                Sửa loại sản phẩm
            </button>
            <button class="float-right button alert rounded open-adding-btn" >
                <span class="mif-cancel"></span>
                Đóng
            </button>
            <div class="float-right">
            
            </div>
            <div class="pos-relative">
                <div data-role="collapse" data-toggle-element="#edit_frm">
                    <div class="row mt-2">
                        <div class="cell-12">
                            <form id="categoryAddForm" action="POST" enctype='multipart/form-data'>
                                <input type="text" name="name" placeholder="Nhập tên" data-role="input">
                                <input class="mt-2" type="file" name="image" data-role="file" data-prepend="Thêm hình:">
                                <button id="add-btn" class="button rounded success mt-3">
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
        </div>
        <div class="cell-12 mt-5">
            <table class="table">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
            <ul data-page="1"  class="pagination dark rounded flex-justify-center">
            </ul>
        </div>
    </div>
</div>