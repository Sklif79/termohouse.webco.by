<div class="office-remote-login">
    <a href="{$remote}" rel="nofollow">{'office_auth_remote_login' | lexicon}</a>
    {if $error?}
        <div class="alert alert-block alert-danger alert-error">{$error}</div>
    {/if}
</div>