<?php 
    $flash = getSession('flash'); 
?>
<div class="container">
        <div class="grid">
            <div class="row">
                <div class=" mt-20 cell-4 offset-4">
                    <h1 class="text-center text-medium my-login-form-color">Tạo tài khoản</h1>
                    <h6 class="text-center text-normal my-tieude">Đăng ký để nhận nhiều ưu đãi!</h6>
                    <form method="POST" class="mt-10">
                        <?php  if(isset($flash)){ ?>
                            <h5 class="border-radius-4 fg-white p-2 text-medium text-center <?php echo $flash['type']=='error' ? 'bg-red' : 'bg-green' ?>bg-red">
                               <?php echo $flash['content'] ?> 
                            </h5>
                        <?php clearSession('flash'); }?>
                        
                        <div class="form-group">

                            <input name="username" type="text" value="<?php echo $data['username']; ?>" placeholder="Username" />
                        </div>
                        <div class="form-group">

                            <input  name="password" type="password" placeholder="Password" />
                            <small class="text-muted">Mật khẩu phải có ít nhất 6 ký tự...</small>
                        </div>
                        <div class="form-group my-form-group">
                            <input name="passwordConfirm" type="password" placeholder="Re-enter password" />
                        </div>
                        <div class="form-group">

                            <input name="fullname" type="text" value="<?php echo $data['fullname']; ?>"  placeholder="Your name" />
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" value="<?php echo $data['email']; ?>"  placeholder="Email" />
                        </div>
                        <div class="form-group mt-4">
                            <div class="g-recaptcha" style="width:100%" data-sitekey="6LfBIYMUAAAAAOj48phCAzAINpdtysSvqiSopeDX"></div>
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