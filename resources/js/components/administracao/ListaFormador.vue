<template>
  <div>
  <div class="col-md-12" v-if="sms">
                           
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{sms}}</div>
                </div>
    <div  class="form-inline">
      <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
      <modal_link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Criar" css="btn btn-success"></modal_link>
      <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="Buscar" v-model="buscar" >
      </div>
    </div>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo,index) in titulos">{{titulo}}</th>

          <th v-if="editar || deletar">Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index) in lista">
           <td>{{item.id}}</td>
            <td><img :src="'http://localhost:82/nossafrica/storage/app/public/'+item.foto" alt="" class="img-responsive img-rounded img-thumbnail" width="120px"></td> 
          <td>{{item.name}}</td>
          <td>{{item.email}}</td>

          <td v-if="perfil || editar || deletar">
            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" v-bind:value="token">

              <a v-if="perfil && !modal" v-bind:href="perfil" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>perfil </a>
            <modal_link v-if="perfil && modal" v-bind:item="item" v-bind:url="perfil" tipo="button" nome="perfil" css="btn btn-xs btn-success" titulo="ver perfil" clas="fa fa-eye"></modal_link> 

               <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> editar </a>
                                         <modal_link v-if="editar && modal" v-bind:url="editar" v-bind:item="item" tipo="button" nome="editar" css="btn btn-info btn-xs" titulo="editar" clas="fa fa-edit"></modal_link> 
                                                                  
                 <a href="#" v-on:click="executaForm(index)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> deletar</a>
                                        
            </form>
            <span v-if="!token">
               <a v-if="perfil && !modal" v-bind:href="perfil" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>perfil </a>
                                         <modal_link v-if="perfil && modal" v-bind:item="item" v-bind:url="perfil" tipo="button" nome="perfil" css="btn btn-xs btn-success" titulo="ver perfil" clas="fa fa-eye"></modal_link> 

              <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> editar </a>
                                         <modal_link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="button" nome="editar" css="btn btn-info btn-xs" titulo="editar" clas="fa fa-edit"></modal_link> 
                                         <a v-if="deletar" v-bind:href="deletar" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> deletar</a>
                                      
            </span>
            <span v-if="token && !deletar">
             <a v-if="perfil && !modal" v-bind:href="perfil" class="btn btn-success"><i class="fa fa-eye"></i>perfil </a>
                                         <modal_link v-if="perfil && modal" v-bind:item="item" v-bind:url="perfil" tipo="button" nome="perfil" css="btn btn-xs btn-warning" titulo="ver perfil" clas="fa fa-eye"></modal_link> 

             <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> editar </a>
                                         <modal_link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="button" nome="editar" css="btn btn-info btn-xs" titulo="editar" clas="fa fa-edit"></modal_link> 
                                         <a v-if="deletar" v-bind:href="deletar" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> deletar</a>
                                      </span>


          </td>
        </tr>


      </tbody>

    </table>

  </div>

</template>

<script>
    export default {
      props:['titulos','itens','ordem','ordemcol','criar','perfil','editar','deletar','token','modal','sms'],
      data: function(){
        return {
          buscar:'',
          ordemAux: this.ordem || "asc",
          ordemAuxCol: this.ordemcol || 0
        }
      },
      methods:{
        executaForm: function(index){
          document.getElementById(index).submit();
        },
        ordenaColuna: function(coluna){
          this.ordemAuxCol = coluna;
          if(this.ordemAux.toLowerCase() == "asc"){
            this.ordemAux = 'desc';
          }else{
            this.ordemAux = 'asc';
          }
        }
      },
      filters: {
        formataData: function(valor){
          if(!valor) return '';
          valor = valor.toString();
          if(valor.split('-').length == 3){
            valor = valor.split('-');
            return valor[2] + '/' + valor[1]+ '/' + valor[0];
          }

          return valor;
        }
      },
      computed:{
        lista:function(){
          let lista = this.itens.data;
          let ordem = this.ordemAux;
          let ordemCol = this.ordemAuxCol;
          ordem = ordem.toLowerCase();
          ordemCol = parseInt(ordemCol);

          if(ordem == "asc"){
            lista.sort(function(a,b){
              if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return 1;}
              if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return -1;}
              return 0;
            });
          }else{
            lista.sort(function(a,b){
              if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return 1;}
              if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return -1;}
              return 0;
            });
          }

          if(this.buscar){
            return lista.filter(res => {
              res = Object.values(res);
              for(let k = 0;k < res.length; k++){
                if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                  return true;
                }
              }
              return false;

            });
          }


          return lista;
        }
      }
    }
</script>
