<div class="shifted-content-2 h-100 p-ab">
    
    <div class="appbar bg-custom-blue pos-absolute z-1" data-role="appbar">
    </div>

    <div class="h-100 p-4">
        <div class="grid">
            <div class="row category-manager manager" data-state="adding">
                <h2 class="ml-5">Danh sách tài khoản</h2>
                <div class="float-right mt-2 cell-12">
                    <div class="custom-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Avatar</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['users'] as $u){?>
                                <tr>
                                    <td>
                                        <?php echo $u->username ?>
                                    </td>
                                    <td>
                                        <?php echo $u->fullname ?>
                                    </td>
                                    <td>
                                        <img height="50px" src="<?php echo ROOTURL . '/public/img/' . $u->avatar?>" />
                                    </td>
                                    
                                    <td>
                                        <?php echo $u->email?>
                                    </td>
                                    <td>
                                        <?php echo $u->role?>
                                    </td>
                                    <td>
                                        <?php echo $u->phone ?>
                                    </td>
                                    <td>
                                        <?php echo $u->address ?>
                                    </td>
                                  
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
