<div class="tablecontent">
<div class="alert-box">		
    <?php if(!empty($errmsg)){ echo show_msg($errmsg); } ?>
</div>
<form action="" method="post" name="changepassword" id="changepassword" onSubmit="return pass_valid()">
<div class="box addeditform">
        <h2 class="title">Change Password</h2>
        <div class="row">
            <span class="red bold">Note:</span><p>1) Password length should not be less than 8 and Not more than 20 characters,<br>2) Password should contain At least <span class="bold">One Character</span>, <span class="bold">One Symbol</span>, and <span class="bold">One Number</span>.</p>
            <div class="clear"></div>
        </div>
        
        <div class="row">
            <span class="label">Username <span class="red">*</span></span><span class="item" style="padding-top:8px;"><?=$row_qur['doc_username'];?></span><div class="clear"></div>
        </div>
        
        <div class="row">
            <span class="label">Old Password <span class="red">*</span></span><span class="item"><input name="pwd1" type="password" id="pwd1"/></span><div class="clear"></div>
        </div>
        
        <div class="row">
            <span class="label">New Password <span class="red">*</span></span><span class="item"><input name="pswd" type="password" id="pswd" onBlur="return passwordCheck(this.value);" /></span><div class="clear"></div>
        </div>
        
        <div class="row">
            <span class="label">Confirm Password <span class="red">*</span></span><span class="item"><input name="pwd3" type="password" id="pwd3"/></span><div class="clear"></div>
        </div>

        <div class="row">
            <span class="label">&nbsp;</span><input name="Submit" type="submit" class="button-green" id="button" value="Change Password" /><input name="Submit2" type="button" class="button-orange ml10" value="Cancel" onClick="history.back()" /><div class="clear"></div>
        </div>
</div>
</form>
</div>