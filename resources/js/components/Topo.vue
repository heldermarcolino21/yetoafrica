<template> 
 <div :class="p">
                <div :class="p1">
                    <!-- Logo -->
                    <a :class="pl" :href="url">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img :src="'/backend/plugins/images/'+logo" alt="home" class="dark-logo" /><!--This is light logo icon--><img :src="'/backend/plugins/images/'+logo" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img :src="'/backend/plugins/images/'+logo1" alt="home" class="dark-logo" /><!--This is light logo text--><img src="/backend/plugins/images/ou.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
    <slot></slot>
            </div>
</template>

<script>
    export default {
        props:['titulo','url','logo','clas','logo1','p','p1','pl']
    }
</script>