@can('est')
<div id="menu">
			<div class="menu-lateral">
			
			<ul>
					<li><a href="/admin"><i class="ico home"></i>HOME</a></li>
					<li><a href="/carrinho/compras/"><i class="ico curso"></i>MEUS CURSOS</a></li>
					<li><a href="/perfil"><i class="ico perfil"></i>MEU PERFIL</a></li>
					<li><a href="/publicacao"><i class="ico duvida"></i>COMUNIDADE</a></li>
					<li> <a href="/"><i class="ico olho"></i>VER SITE</a> </li>
					<li><a href="{{route('admin.logout')}}"><i class="ico sair"></i>SAIR</a></li>
			</ul>
			</div>
</div>     
@endcan

@can('form')
<div class="menu-lateral">
			
			<ul>
					<li><a href="/admin"><i class="ico user"></i>HOME</a></li>
					<li><a href="/formanegocio"><i class="ico curso"></i>CURSOS</a></li>
				<!--	<li><a href="/financa"><i class="ico estatistica"></i>FINANÇAS</a></li> -->
					<li><a href="/meusalunos"><i class="ico perfil"></i>ALUNOS</a></li>
					<!--<li><a href="/perfil"><i class="ico perfil"></i>PERFIL</a></li>  -->
					<li><a href="/publicacao"><i class="ico duvida"></i>COMUNICAÇÃO</a></li>					
					<li><a href="/termos"><i class="ico duvida"></i>TERMOS DE USO</a></li>
					<li> <a href="/"><i class="ico olho"></i>VER SITE</a> </li>
					<li><a href="{{route('admin.logout')}}"><i class="ico sair"></i>SAIR</a></li>
			</ul>
		</div>
</div>     

			
	
</div>     
@endcan

@can('acad')
<div id="menu">
			<div class="menu-lateral">
		
			<ul>
					<li><a href="/admin"><i class="ico home"></i>HOME</a></li>
					<li><a href="/academia/"><i class="ico perfil"></i>FORMADORES</a></li>
					<li><a href="/formanegocio"><i class="ico curso"></i>MEUS CURSOS</a></li>
					<li><a href="/meusalunos"><i class="ico perfil"></i>MEUS ALUNOS</a></li>
					<li><a href="/perfil"><i class="ico perfil"></i>MEU PERFIL</a></li>
					<li><a href="/publicacao"><i class="ico duvida"></i>COMUNIDADE</a></li>
					<li> <a href="#"><i class="ico duvida"></i>RELATÓRIOS</a> </li>
					<li><a href="/termos"><i class="ico duvida"></i>TERMOS DE USO</a></li>
					<li> <a href="/"><i class="ico olho"></i>VER SITE</a> </li>
					<li><a href="{{route('admin.logout')}}"><i class="ico sair"></i>SAIR</a></li>
			</ul>
		</div>
</div>     
@endcan

@can('eAdmin')
<div id="menu">
			<div class="menu-lateral">
			
					</figcaption>
			</figure>
			<ul>
					<li><a href="/admin"><i class="ico home"></i>HOME</a></li>
<li><i class="ico home"></i><a data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false">Site</a>
  <div class="dropdown-menu">
  <a href="/banner">BANNER</a>
  <a href="/blog">BLOG</a>
  <a href="/cat_blog">CATEGORIAS BLOG</a>
  <a href="/sobre">SOBRE</a>
<a href="/faqs">FAQS</a>
<a href="/contactos">CONTACTOS</a>
<a href="/servicos">SERVIÇOS</a>
<a href="/termos">TERMOS DE USO</a>
<a href="/newslater">NEWSLATER</a>
</div>

  </li>


					<li><a href="/cursos"><i class="ico curso"></i>CURSOS</a></li>
					<li><a href="/utilizadores"><i class="ico perfil"></i>UTILIZADORES</a></li>
					<li><a href="/categoria"><i class="ico perfil"></i>CATEGORIAS</a></li>
					<li><a href="/perfil"><i class="ico perfil"></i>MEU PERFIL</a></li>
					<li><a href="/publicacao"><i class="ico perfil"></i>COMUNIDADE</a></li>
					<li> <a href="#"><i class="ico perfil"></i>RELATÓRIOS</a> </li>
					<li> <a href="/"><i class="ico perfil"></i>VER SITE</a> </li>
					<li><a href="{{route('admin.logout')}}"><i class="ico sair"></i>SAIR</a></li>
			</ul>
		</div>
</div>     
@endcan