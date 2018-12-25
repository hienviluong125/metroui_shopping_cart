<?php 
    $flash = getSession('flash'); 
?>
<div class="container">
        <div class="grid">
            <div class="row">
                <div class=" mt-20 cell-4 offset-4">
                    <h1 class="text-center text-medium my-login-form-color">Tạo tài khoản</h1>
                    <h6 class="text-center text-normal my-tieude">Đăng ký để nhận nhiều ưu đãi!</h6>
                    <form id="register" method="POST" class="mt-10"  data-role="validator" data-interactive-check="true" >
                        <?php  if(isset($flash) && $flash['type'] == 'error'){ ?>
                            <h5 class="border-radius-4 fg-white p-2 text-medium text-center bg-red">
                               <?php echo $flash['content'] ?> 
                            </h5>
                        <?php clearSession('flash'); }?>
                        
                        <div class="form-group">

                            <input name="username" type="text" value="<?php echo $data['username']; ?>" placeholder="Username" data-validate="minlength=4" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Tên tài ít nhất 4 ký tự
                            </span>
                        </div>
                        <div class="form-group">

                            <input name="password" type="password" placeholder="Password" data-validate="minlength=4" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Mật khẩu ít nhất 4 ký tự
                            </span>
                        </div>
                        <div class="form-group ">
                            <input name="passwordConfirm" type="password" placeholder="Re-enter password" data-validate="minlength=4 compare=password" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Mật khẩu không khớp với mật khẩu trên
                            </span>
                        </div>
                        <div class="form-group">
                            <input name="fullname" type="text" value="<?php echo $data['fullname']; ?>"  placeholder="Your name" data-validate="minlength=10" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Tên của bạn phải ít nhất 10 ký tự
                            </span>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" value="<?php echo $data['email']; ?>"  placeholder="Email" data-validate="email" data-interactive-check="true" />
                            <span class="invalid_feedback">
                                Sai định dạng email
                            </span>
                        </div>
                        <div class="form-group mt-4">
                            <div class="g-recaptcha" style="width:100%" data-callback="GGCaptchaChecked" data-sitekey="6LfBIYMUAAAAAOj48phCAzAINpdtysSvqiSopeDX"></div>
                            <span class="g-captcha-notification fg-red">
                                Vui lòng check captcha
                            </span>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" disabled class="my-btn register-btn bg-custom-blue button rounded cell-12">
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