<div class="row" id="office-auth-form">
    <div class="col-md-6">
        <div class="row">
            <div class="col-xs-3">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" alt="{$fullname}" title="{$fullname}"
                     class="office-avatar" width="100"/>
            </div>
            <div class="col-xs-9 main-user">
                <p>{'office_auth_welcome' | lexicon} <b>{$fullname}</b> ({$username})</p>
                <a href="{$_modx->resource.id | url : [] : ['action' => 'remote/logout']}">
                    {'office_auth_logout' | lexicon} &rarr;
                </a>
            </div>
        </div>
    </div>
</div>