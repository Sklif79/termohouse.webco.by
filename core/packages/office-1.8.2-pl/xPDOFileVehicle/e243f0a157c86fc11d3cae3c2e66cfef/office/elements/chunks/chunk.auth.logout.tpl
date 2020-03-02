<div class="row" id="office-auth-form">
    <div class="col-md-6">
        <div class="row">
            <div class="col-xs-3">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" alt="{$fullname}" title="{$fullname}"
                     class="office-avatar" width="100"/>
            </div>
            <div class="col-xs-9 main-user">
                <p>{'office_auth_welcome' | lexicon} <b>{$fullname}</b> ({$username})</p>
                <a href="{$_modx->resource.id | url : [] : ['action' => 'auth/logout']}">
                    {'office_auth_logout' | lexicon} &rarr;
                </a>
            </div>
        </div>
        {if $authorized?}
            <div class="authorized">
                {foreach $authorized as $id => $user}
                    <div class="user row">
                        <div class="col-xs-2">
                            <img src="{if $user.photo?}{$user.photo}{else}{$user.gravatar}?s=50{/if}"
                                 alt="{$user.fullname}" title="{$user.fullname}" class="office-avatar" width="50"/>
                        </div>
                        <div class="col-xs-8">
                            <a href="{$_modx->resource.id | url : [] : ['action' => 'auth/change', 'user_id' => $id]}">
                                <b>{$user.fullname}</b> ({$user.username})
                            </a>
                        </div>
                        <div class="col-xs-2 logout">
                            <a href="{$_modx->resource.id | url : [] : ['action' => 'auth/logout', 'user_id' => $id]}">&rarr;</a>
                        </div>
                    </div>
                {/foreach}
            </div>
        {/if}
    </div>
    <div class="col-md-6">
        <form method="post" class="form-horizontal" id="office-auth-login">
            <div class="form-group">
                <label for="office-auth-login-email" class="col-md-3 control-label">
                    {'office_auth_login_username' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-8">
                    <input type="text" name="username" placeholder="" class="form-control"
                           id="office-auth-login-username" value=""/>

                </div>
            </div>
            <div class="form-group">
                <label for="office-auth-login-password" class="col-md-3 control-label">
                    {'office_auth_login_password' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-8">
                    <input type="password" name="password" placeholder="" class="form-control"
                           id="office-login-form-password" value=""/>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="auth/formAdd"/>
                <input type="hidden" name="return" value=""/>
                <div class="col-sm-offset-3 col-sm-8">
                    <p class="help-block">
                        <small>{'office_auth_add_desc' | lexicon}</small>
                    </p>
                    <button type="submit" class="btn btn-primary">{'office_auth_login_btn' | lexicon}</button>
                </div>
            </div>
        </form>
    </div>
</div>