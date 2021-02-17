@can('est')
<div class="base-topo">
		<div class="conteudo">
			<a href="" class="menu-m">menu mobile esquerdo</a><!-- aqui fica icone reponsavel pelo menu da esquerda-->
			<a href="" class="menu-grade">menu mobile direito</a><!--aqui fica o menu responsavel pelo menu do topo-->
			<a href="/admin" class="logo"></a>
			<div id="grade">
			<ul class="menu-topo">
			<!--	<li class="sub"><a href=""><i class="ico cursos"></i>Cursos</a>
					<ul>
						<li><a href="">Java</a></li>
						<li><a href="">PHP</a></li>
						<li><a href="">Lógica de programação</a></li> 
						<li><a href="">Androind</a></li>
						<li><a href="">Delphi</a></li>
					</ul>
				</li> -->
				<li class="sub user"><a href="" class="thumb"><img src="http://localhost:/nossafrica/storage/app/public/{{auth()->user()->foto}}"></a>
					<ul>
						<li><b>{{auth()->user()->name}}</b><small><a href="{{route('admin.logout')}}">Sair</a></small></li>
					</ul>
				</li>
			</ul>
		</div>
		</div>
    </div>
@endcan
 

@can('form')
<div class="base-topo">
		<div class="conteudo">
			<a href="" class="menu-m">menu mobile esquerdo</a><!-- aqui fica icone reponsavel pelo menu da esquerda-->
			<a href="" class="menu-grade">menu mobile direito</a><!--aqui fica o menu responsavel pelo menu do topo-->
			<a href="/admin" class="logo"></a>
			<div id="grade">
			<ul class="menu-topo">
				<!--	<li class="sub"><a href=""><i class="ico cursos"></i>Cursos</a>
					<ul>
						<li><a href="">Java</a></li>
						<li><a href="">PHP</a></li>
						<li><a href="">Lógica de programação</a></li>
						<li><a href="">Androind</a></li>
						<li><a href="">Delphi</a></li>
					</ul>
				</li>  -->
				<li class="sub user"><a href="" class="thumb"><img src="http://localhost:/nossafrica/storage/app/public/{{auth()->user()->foto}}"></a>
					<ul>
						<li><b>{{auth()->user()->name}}</b><small><a href="{{route('admin.logout')}}">Sair</a></small></li>
				
					</ul>
				</li>
			</ul>
		</div>
		</div>
    </div>
@endcan

@can('acad')
<div class="base-topo">
		<div class="conteudo">
			<a href="" class="menu-m">menu mobile esquerdo</a><!-- aqui fica icone reponsavel pelo menu da esquerda-->
			<a href="" class="menu-grade">menu mobile direito</a><!--aqui fica o menu responsavel pelo menu do topo-->
			<a href="/admin" class="logo"></a>
			<div id="grade">
			<ul class="menu-topo">
			<!--	<li class="sub"><a href=""><i class="ico cursos"></i>Cursos</a>
					<ul>
						<li><a href="">Java</a></li>
						<li><a href="">PHP</a></li>
						<li><a href="">Lógica de programação</a></li>
						<li><a href="">Androind</a></li>
						<li><a href="">Delphi</a></li>
					</ul>
				</li> -->
				<li class="sub user"><a href="" class="thumb"><img src="http://localhost:/nossafrica/storage/app/public/{{auth()->user()->foto}}"></a>
					<ul>
						<li><b>{{auth()->user()->name}}</b><small><a href="{{route('admin.logout')}}">Sair</a></small></li>
					</ul>
				</li>
			</ul>
		</div>
		</div>
    </div>
@endcan


@can('eAdmin')
<div class="base-topo">
		<div class="conteudo">
			<a href="" class="menu-m">menu mobile esquerdo</a><!-- aqui fica icone reponsavel pelo menu da esquerda-->
			<a href="" class="menu-grade">menu mobile direito</a><!--aqui fica o menu responsavel pelo menu do topo-->
			<a href="/admin" class="logo"></a>
			<div id="grade">
			<ul class="menu-topo">
				<!--	<li class="sub"><a href=""><i class="ico cursos"></i>Cursos</a>
				<ul>
						<li><a href="">Java</a></li>
						<li><a href="">PHP</a></li>
						<li><a href="">Lógica de programação</a></li>
						<li><a href="">Androind</a></li>
						<li><a href="">Delphi</a></li>
					</ul>
				</li> -->
				<li class="sub user"><a href="" class="thumb"><img src="http://localhost:/nossafrica/storage/app/public/{{auth()->user()->foto}}"></a>
					<ul>
						<li><b>{{auth()->user()->name}}</b><small><a href="{{route('admin.logout')}}">Sair</a></small></li>
					</ul>
				</li>
			</ul>
		</div>
		</div>
    </div>
@endcan