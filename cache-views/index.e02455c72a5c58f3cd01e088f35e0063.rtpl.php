<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div style="border:1px  solid blue;width:500px;margin-left:400px;margin-top:200px">	
	<form  action='/admin/index' method="post">
  <div class="form-group">
    <label for="user">Usuário</label>
    <input type="text" class="form-control" id="user"  name="user" placeholder="">
  </div>
  <div class="form-group">
    <label for="passwords">Senha</label>
    <input type="password" class="form-control" id="password"  name="password"  placeholder="Senha">
     <a href="">esqueci a senha</a>
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>
	</div>