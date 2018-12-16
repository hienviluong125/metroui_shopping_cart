<?php 
    $flash = getSession('flash');
    if(isset($flash)){
        echo '<br><br><h1>'. $flash . '</h1>';
        clearSession('flash');
    }
   
?>
<div class="container">
        <div class="grid">
            <div class="row">
                <div class=" mt-20 cell-4 offset-4">
                    <h1 class="text-center text-medium my-login-form-color">WeedDev</h1>
                    <h6 class="text-center text-normal my-tieude">Dzô 1 tí tặng 1 tỷ</h6>
                    <form method="POST">
                        <div class="form-group">

                            <input type="text" name="username" placeholder="Username" />
                        </div>
                        <div class="form-group">

                            <input type="password" name="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" data-role="checkbox" data-caption="Remember me">
                            <a class="float-right mt-2 my-remember" href="">Quên mật Khẩu</a>
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
