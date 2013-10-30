{extends file="index.tpl"}

{block name="script" append}
{/block}

{block name="style" append}
<link href="{$template_url_s}/css/login.css" rel="stylesheet">
{/block}

{block name="content" append}
<div class="container row-fluid">
<div class="panel panel-default col-md-offset-4 pull-left">
  <div class="panel-heading">Iniciar secion</div>
  <div class="panel-body">
    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Email address" autofocus="">
        <input type="password" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
  </div>
</div>
</div>
{/block}