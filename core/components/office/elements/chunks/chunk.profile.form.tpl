<form action="" method="post" class="form-horizontal well" id="office-profile-form" enctype="multipart/form-data">
    <div class="header">
        <small>{'office_profile_header' | lexicon}</small>
    </div>

    <div class="form-group avatar">
        <label class="col-sm-2 control-label">{'office_profile_avatar' | lexicon}</label>
        <div class="col-sm-10">
            <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" id="profile-user-photo"
                 data-gravatar="{$gravatar}?s=100" width="100"/>
            <a href="#" id="office-user-photo-remove"{if !$photo} style="display:none;"{/if}>
                {'office_profile_avatar_remove' | lexicon}
                <i class="glyphicon glyphicon-remove"></i>
            </a>
            <p class="help-block">{'office_profile_avatar_desc' | lexicon}</p>
            <input type="hidden" name="photo" value="{$photo}"/>
            <input type="file" name="newphoto" id="profile-photo"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">{'office_profile_username' | lexicon}<sup class="red">*</sup></label>
        <div class="col-sm-10">
            <input type="text" name="username" value="{$username}" placeholder="{'office_profile_username' | lexicon}"
                   class="form-control"/>
            <p class="help-block message">{$error_username}</p>
            <p class="help-block desc">{'office_profile_username_desc' | lexicon}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">{'office_profile_fullname' | lexicon}<sup class="red">*</sup></label>
        <div class="col-sm-10">
            <input type="text" name="fullname" value="{$fullname}" placeholder="{'office_profile_fullname' | lexicon}"
                   class="form-control"/>
            <p class="help-block message">{$error_fullname}</p>
            <p class="help-block desc">{'office_profile_fullname_desc' | lexicon}</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">{'office_profile_email' | lexicon}<sup class="red">*</sup></label>
        <div class="col-sm-10">
            <input type="text" name="email" value="{$email}" placeholder="{'office_profile_email' | lexicon}"
                   class="form-control"/>
            <p class="help-block message">{$error_email}</p>
            <p class="help-block desc">{'office_profile_email_desc' | lexicon}</p>
        </div>
    </div>

<div class="form-group">
    <label class="col-sm-2 control-label">
        {'office_profile_phone' | lexicon}{if $_modx->config.office_auth_mode == 'phone'}&nbsp;<span class="red">*</span>{/if}
    </label>
    <div class="col-md-10">
        <input type="text" name="mobilephone" placeholder="" value="{$mobilephone}" class="form-control"/>
        <p class="help-block message">{$error_mobilephone}</p>
        <p class="help-block desc">{'office_profile_phone_desc' | lexicon}</p>
    </div>
</div>

<div class="form-group hidden">
    <label class="col-sm-2 control-label">{'office_profile_phone_code' | lexicon}</label>
    <div class="col-md-10">
        <input type="text" name="phone_code" value="" class="form-control"/>
        <p class="help-block message">{$error_phone_code}</p>
        <p class="help-block desc">{'office_profile_phone_code_desc' | lexicon}</p>
    </div>
</div>

    <div class="form-group">
        <label class="col-sm-2 control-label">{'office_profile_password' | lexicon}</label>
        <div class="col-sm-10">
            <input type="password" name="specifiedpassword" value="" placeholder="********" class="form-control"/>
            <p class="help-block message">{$error_specifiedpassword}</p>
            <p class="help-block desc">{'office_profile_specifiedpassword_desc' | lexicon}</p>
            <input type="password" name="confirmpassword" value="" placeholder="********" class="form-control"/>
            <p class="help-block message">{$error_confirmpassword}</p>
            <p class="help-block desc">{'office_profile_confirmpassword_desc' | lexicon}</p>
        </div>
    </div>

    {if $providers?}
        <div class="form-group">
            <label class="col-sm-2 control-label">{'ha.providers_available' | lexicon}</label>
            <div class="col-sm-10">
                {$providers}
            </div>
        </div>
    {/if}

    <hr/>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">{'office_profile_save' | lexicon}</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-danger" href="{$_modx->resource.id | url : [] : ['action' => 'auth/logout']}">{'office_profile_logout' | lexicon}</a>
        </div>
    </div>
</form>
