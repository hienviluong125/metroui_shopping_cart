<?php 
    $flash = getSession('flash');   
?>
<div class="container">
        <div class="grid">
            <div class="row">
                <div class=" mt-20 cell-4 offset-4">
                    <h1 class="text-center text-medium my-login-form-color">WeedDev</h1>
                    <h6 class="text-center text-normal my-tieude">Dzô 1 tí tặng 1 tỷ</h6>
                    <form  
                        data-role="validator" 
                        data-interactive-check="true" 
                        method="POST"
                    >
                        <?php  if(isset($flash)){ ?>
                            <h5 class="border-radius-4 fg-white p-2 text-medium text-center <?php echo $flash['type']=='error' ? 'bg-red' : 'bg-green' ?>">
                               <?php echo $flash['content'] ?> 
                            </h5>
                        <?php clearSession('flash'); }?>
                        <div class="form-group">

                            <input type="text" name="username" placeholder="Username" data-validate="minlength=4" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Tên tài khoản ít nhất 4 ký tự
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" data-validate="minlength=4" data-interactive-check="true"  />
                            <span class="invalid_feedback">
                                Mật khẩu ít nhất 4 ký tự
                            </span>
                        </div>
        
                        <div class="form-group">

                            <button type="submit" class="my-btn bg-custom-blue button rounded cell-12">
                                <strong>Đăng Nhập</strong>
                            </button>
                            <a href="<?php echo (ROOTURL)?>/user/register" class="my-btn-dk mt-2 button rounded cell-12 fg-dark">
                                <strong>Chưa Có tài khoản? Tạo Ngay!</strong>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
