<?php 
    $flash = getSession('flash');   
?>

<div class="container main-container pt-0 my-cart">
    <div class="grid">
        <div class="row">
            <div class="cell-6 offset-3">
                <div class="row">
                    <div class="cell-6 mt-5">
                        <h2 class="text-light text-center">Ảnh đại diện</h2>
                        <div class="text-center">
                            <img src="<?php echo ROOTURL . '/public/img/' . $data['user']->avatar?>" height="200px" />
                        </div> 
                        <h4 class="text-light text-center">Chức vụ : <?php echo $data['user']->role?></h4>
                       
                       
                    </div>
                    <div class="cell-6 mt-5">
                        <?php  if(isset($flash)){ ?>
                            <h5 class="border-radius-4 fg-white p-2 text-medium text-center <?php echo $flash['type']=='error' ? 'bg-red' : 'bg-green' ?>">
                               <?php echo $flash['content'] ?> 
                            </h5>
                        <?php clearSession('flash'); }?>
                        <h2 class="text-light text-center">Đổi mật khẩu</h2>
                        <form data-role="validator" 
                        data-interactive-check="true" 
                        method="POST">
                        <div class="form-group">
                            <p>Mật khẩu cũ</p>
                            <input type="password" name="currentpassword" placeholder="current password..." data-validate="minlength=4" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Mật khẩu cũ ít nhất 4 ký tự
                            </span>
                        </div>
                        <div class="form-group">
                            <p>Mật khẩu mới</p>
                            <input name="newpassword" type="password" placeholder="new password ..." data-validate="minlength=4" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Mật khẩu mới ít nhất 4 ký tự
                            </span>
                        </div>
                        <div class="form-group ">
                            <p>Xác nhận mật khẩu mới</p>
                            <input name="newpasswordConfirm" type="password" placeholder="Re-enter new password..." data-validate="minlength=4 compare=newpassword" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Mật khẩu không khớp với mật khẩu trên
                            </span>
                        </div>
                        
                        
                        <button type="submit" class="button cell-12 secondary rounded mt-5">Đổi mật khẩu</button>
                        <a href="<?php echo ROOTURL . '/user/profile' ?>" class="button cell-12 outline success rounded mt-2">Cập nhật thông tin</a>
                        </form>
                    </div>
                </div>
            </div>     
        </div>       
    </div>   
</div>