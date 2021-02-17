<template>
  <div>

                                        
                <div class="form-group">
                   <div class="input-group"> <span class="input-group-btn">
                      <button type="search" class="btn waves-effect waves-light btn-info"><i class="fa fa-search"></i></button>
                      </span>
                        <input type="text" id="example-input1-group2" name="example-input1-group2" v-model="buscar" class="form-control" placeholder="Buscar"> </div>
                                           
                                         
                        </div>
                                  
 <div class="col-md-6 col-lg-3 col-xs-12 col-sm-6"   v-for="(item,index) in lista" >
      <img class="img-responsive" alt="do utilizador" :src="'http://yetoafrica.com/storage/app/public/storage/app/public/'+item.curso_img" style="max-width: 100%;width: 350px;height: 250px;	object-fit: cover;">
                        <div class="white-box">
                            <h3 class="m-t-20 m-b-20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{item.curso_nome}}</font></font></h3>
                            <div class="text-muted"><span class="m-r-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{item.curso_preco}}</font></font></span> <a class="text-muted m-l-10" href="#">kz<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 38</font></font></a></div>
   
              <a v-if="ver" v-bind:href="ver+item.id" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>Detalhe </a>
          
    </div>
 </div>

  </div>

</template>

<script>
    export default {
      props:['titulos','itens','ordem','ordemcol','ver','token','modal'],
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
