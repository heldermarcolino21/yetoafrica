<template>
<div>    
    <div class="col-md-12" v-if="sms">
                           
      <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{sms}}</div>
    </div>

  <div class="form-inline" >
   <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
    <modal_link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Curso" css="btn btn-success"></modal_link>    
    <div class="form-group pull-right">
  
    </div>     
  </div> 
        <hr>
			
			<div class="rows cursos py-4" >
        
                <div class="col-4" v-for="(item,index) in lista" :key="item.id">
                        <div class="caixa">
                             <a v-if="modulo" v-bind:href="modulo+item.id"> <img :src="'http://localhost:8000/nossafrica/storage/app/public/'+item.curso_img"> </a>
                                <div class="del-curso">
                                        <p>{{item.curso_nome}}</p>
                                        <small>Desempenho <b>50%</b></small>
                                        <progress value="4" max="7"></progress>
                                        
                                          <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">     
                                          <input type="hidden"   name="_method" value="DELETE">
                                            <input type="hidden" name="_token" v-bind:value="token"> 
                                          <a v-if="modulo" v-bind:href="modulo+item.id" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>Ver curso</a>
          
                                         <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> editar </a>
                                         <modal_link v-if="editar && modal" v-bind:url="editar" v-bind:item="item" tipo="button" nome="editar" css="btn btn-info btn-xs" titulo="editar" clas="fa fa-edit"></modal_link> 
                                         <a href="#" v-on:click="executaForm(index)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> deletar</a>
                                         </form>
                                         <span v-if="!token">  
                                          <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> editar </a>
                                         <modal_link v-if="editar && modal" v-bind:item="item" v-bind:url="editar" tipo="button" nome="editar" css="btn btn-info btn-xs" titulo="editar" clas="fa fa-edit"></modal_link> 
                                         <a v-if="deletar" v-bind:href="deletar" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> deletar</a>
                                        </span> 
                                         <span v-if="token && !deletar">  
                                          <a v-if="editar && !modal" v-bind:item="item"   v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> editar </a>
                                         <modal_link v-if="editar && modal" v-bind:url="editar" tipo="button" nome="editar" css="btn btn-info btn-xs" titulo="editar" clas="fa fa-edit"></modal_link>  </span> 
          
                                </div>
                        </div>
                </div>
                
                        </div>
        
            </div>
 
</template>

<script>
      ($(".table tr").css("background", "red"));
    export default {
     props:['titulos','itens','criar','editar','deletar','token','status','modal','ordem','ordemcol','modulo','alunos','sms'],
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
