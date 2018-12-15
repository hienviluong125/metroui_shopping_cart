<?php 
    $flash = getSession('flash');
    if(isset($flash)){
        echo '<br><br><h1>'. $flash . '</h1>';
    }
    clearSession('flash');
?>
<div class="container">
        <div class="grid">
            <div class="row">
                <div class=" mt-20 cell-4 offset-4">
                    <h1 class="text-center text-medium my-login-form-color">Tạo tài khoản</h1>
                    <h6 class="text-center text-normal my-tieude">Đăng ký để nhận nhiều ưu đãi!</h6>
                    <form method="POST" class="mt-10">
                        <div class="form-group">

                            <input name="username" type="text" placeholder="Username" />
                        </div>
                        <div class="form-group">

                            <input  name="password" type="password" placeholder="Password" />
                            <small class="text-muted">Mật khẩu phải có ít nhất 6 ký tự...</small>
                        </div>
                        <div class="form-group my-form-group">
                            <input name="passwordConfirm" type="password" placeholder="Re-enter password" />
                        </div>
                        <div class="form-group">

                            <input name="fullname" type="text" placeholder="Your name" />
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" placeholder="Email" />
                        </div>

                        <div class="form-group">

                            <button type="submit" class="my-btn bg-custom-blue button rounded cell-12">
                                <strong>Đăng ký</strong>
                            </button>
                            <a href="<?php echo (ROOTURL)?>/user/login" class="my-btn-dk mt-2 button rounded cell-12 fg-dark">
                                <strong>Đã có tài khoản ?</strong>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>