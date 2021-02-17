<template>
<div>    
  
     
    <div class="form-inline" >
        <a v-if="criar" v-bind:href="criar">Criar</a>     
        <div class="form-group pull-right">
           <input type="search" class="form-control" placeholder="Buscar" v-model="buscar"> {{buscar}}
        </div>     
    </div> 
    <hr>
         <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          
                            <th v-for="titulo in titulos">{{titulo}}</th>

                            <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr v-for="(item,index) in lista">
                                  
                                    <td v-for="i in item">{{i}} </td>
                                     
                                    <td v-if="editar || deletar || detalhe"> 
                                      <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">     
                                          <input type="hidden" name="_method" value="delete">
                                            <input type="hidden" name="_token" v-bind:value="token"> 

                                        <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Editar </a>
                                         <modal_link v-if="editar && modal" v-bind:item="item" tipo="button" nome="editar" css="" titulo="Editar"></modal_link> 
                                         <a href="#" v-on:click="executaForm(index)" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> deletar</a>
                                         </form>
                                        <span v-if="!token">  
                                          <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Editar </a>
                                         <modal_link v-if="editar && modal" tipo="button" nome="editar" css="" titulo="Editar"></modal_link> 
                                         <a v-if="deletar" v-bind:href="deletar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> deletar</a>
                                        </span> 
                                         <span v-if="token && !deletar">  
                                          <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Editar </a>
                                         <modal_link v-if="editar && modal" tipo="button" nome="editar" css="" titulo="Editar"></modal_link> 
                                        </span> 
                                    </td>


                                </tr>
                          
                    </tbody>
                </table>   
                

            </div>
            </div>
 
</template>

<script>
    export default {
       props:['titulos','itens','criar','editar','deletar','token','modal'],
       data:function(){
           return{
               buscar:''
           }
       },
       methods:{
           executaForm: function(index){
               document.getElementById(index).submit();
           }
       },
       computed: {
           lista:function(){
               let busca="possivel";
               return this.itens.filter(res=>{
                   if (res[2].toLowerCase().indexOf(busca.toLowerCase())>=0) {
                            return true;       
                   }else{
                       return false;
                   }
                
               });
               return this.itens;
           }
       },
    }
</script>
