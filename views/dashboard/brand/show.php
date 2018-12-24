<div class="shifted-content-2 h-100 p-ab">
    
    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>

    <div class="h-100 p-4">
        <div class="grid">
            <h2 class="">Danh sách nhà sản xuất</h2>
            <div class="row category-manager manager" data-state="adding">
                <div class="cell-4">
                     <a href="<?php echo ROOTURL . '/dashboard/brand/add/' . $data['page'];?>" class="float-left button bg-darkGrayBlue rounded fg-white" id="add_frm">
                        <span class="mif-add"></span>
                        Thêm nhà sản xuất
                    </a>
                </div>
                <div class="float-right mt-2 cell-12">
                    <div class="custom-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Mã loại</th>
                                    <th>Tên loại</th>
                                    <th>Hình ảnh</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['brands'] as $brand){?>
                                <tr>
                                    <td>
                                        <?php echo $brand->id ?>
                                    </td>
                                    <td>
                                        <?php echo $brand->name ?>
                                    </td>
                                    <td>
                                        <img height="50px" src="<?php echo ROOTURL . '/public/img/' . $brand->image?>" />
                                    </td>
                                    <td>
                                        <a href="<?php echo ROOTURL . '/dashboard/brand/edit/' . $brand->id . '/' . $data['page']; ?>" class="edit-toggle-btn button border-btn success small">
                                            <span class="mif-pencil"></span>&ensp;Sửa
                                        </a>
                                        <button data-deleteid="<?php echo $brand->id; ?>" class="button border-btn delete-btn success small bg-red fg-white" >
                                            <span class="mif-bin"></span>&ensp;Xóa
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination dark flex-justify-center">
                         <?php if($data['page'] != 1){?>
                        <li class="page-item service"><a class="page-link" href="<?php echo ROOTURL . '/dashboard/brand/show/1'; ?>   "> << First</a></li>
                        <?php } ?>
                        <?php if($data['page'] > 1 ){?>
                        <li class="page-item service"><a class="page-link"  href="<?php echo ROOTURL . '/dashboard/brand/show/' . ($data['page'] -1 );?>" >Prev ></a></li>
                        <?php } ?>
                       
                        <?php for($i = $data['page'] - 3;$i < $data['page'] + 3;$i++){?>
                            <?php if($i > 0 && $i <= $data['lastPageNumber']){?>
                                <li class="page-item <?php echo ($i == $data['page'] ? 'active' : ''); ?>"><a class="page-link" href="<?php echo ROOTURL . '/dashboard/brand/show/' . ($i);?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                       
                        
                        <?php if($data['page'] < $data['lastPageNumber']){?>
                        <li class="page-item service"><a class="page-link"  href="<?php echo ROOTURL . '/dashboard/brand/show/' . ($data['page'] + 1);?>" >Next ></a></li>
                        <?php } ?>
                        
                        <?php if($data['page'] != $data['lastPageNumber']){?>
                        <li class="page-item service"><a class="page-link"  href="<?php echo ROOTURL . '/dashboard/brand/show/' . $data['lastPageNumber'];?>" >Last >></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="deleteDialog" class="dialog" data-role="dialog">
    <div class="dialog-title fg-red">Thông báo từ WeeDev</div>
    <div class="dialog-content">
       Bạn có thật sự muốn xóa không ? Dữ liệu đã <span class="fg-red">XÓA</span> sẽ không thể khôi phục lại
    </div>
    <div class="dialog-actions">
       
        <a href="#" class="button fg-white delete-confirm-btn alert js-dialog-close">Xóa</a>
        <button class="button js-dialog-close">Hủy</button>
    </div>
</div>