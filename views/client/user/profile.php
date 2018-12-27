<?php 
    $flash = getSession('flash');   
?>

<div class="container main-container pt-0 my-cart">
    <div class="grid">
        <div class="row">
            <div class="cell-6 offset-3">
                <div class="row">
                    <div class="cell-6 mt-5">
                    <form data-role="validator" 
                        data-interactive-check="true" 
                        method="POST"
                        enctype='multipart/form-data'
                        >
                        <h2 class="text-light text-center">Ảnh đại diện</h2>
                        <div class="text-center">
                            <img class="preview-img" src="<?php echo ROOTURL . '/public/img/' . $data['user']->avatar?>" height="200px" width="200px" />
                        </div> 
                       
                        <input name="image" type="file" class="ml-16 mt-3" style="width:60%" data-role="file" data-button-title="Chọn ảnh">
                        <h4 class="text-light text-center mt-3">Chức vụ : <?php echo $data['user']->role?></h4>
                    </div>
                    <div class="cell-6 mt-5">
                        <?php  if(isset($flash)){ ?>
                            <h5 class="border-radius-4 fg-white p-2 text-medium text-center <?php echo $flash['type']=='error' ? 'bg-red' : 'bg-green' ?>">
                               <?php echo $flash['content'] ?> 
                            </h5>
                        <?php clearSession('flash'); }?>
                        <h2 class="text-light text-center">Thông tin cá nhân</h2>
                        <input type="hidden" name="oldImage" value="<?php echo $data['user']->avatar; ?>" />
                        <div class="form-group">
                            <p>Tên</p>
                            <input type="text" name="fullname" value="<?php echo $data['user']->fullname; ?>" placeholder="Tên...." data-validate="minlength=10" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Tên ít nhất 10 ký tự
                            </span>
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="email" name="email" value="<?php echo $data['user']->email; ?>"  placeholder="Email..." data-validate="minlength=4 email" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Email phải đúng định dạng và ít nhất 10 ký tự
                            </span>
                        </div>
                      
                        <div class="form-group">
                            <p>Số điện thoại</p>
                            <input type="number" name="phone" value="<?php echo $data['user']->phone; ?>"  placeholder="Số điện thoại" data-validate="number" data-interactive-check="true" />
                            <span class="invalid_feedback">
                               Sai định dạng số điện thoại
                            </span>
                        </div>
                        <div class="form-group">
                            <p>Địa chỉ</p>
                            <input type="text" name="address"  value="<?php echo $data['user']->address; ?>"  placeholder="Địa chỉ..." data-validate="text" data-interactive-check="true" />
                            
                        </div>
                        <div class="mt-5">
                        <em class="text-center fg-red"><strong>Lưu ý:</strong> Bạn chỉ có thể mua hàng khi đã cập nhật số điện thoại và địa chỉ</em>
                        </div>
                        
                        <button class="button cell-12 success rounded mt-5">Cập nhật thông tin</button>
                        <a href="<?php echo ROOTURL . '/user/changepassword' ?>" class="button cell-12 outline secondary rounded mt-2">Đổi mật khẩu</a>
                        </form>
                    </div>
                </div>
            </div>     
        </div>       
    </div>   
</div>