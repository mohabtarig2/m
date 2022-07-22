 
                  <template>
    <div class="categoreies">

                <span v-if="category==1">{{$t('consulting_company')}}</span>
                <span v-else-if="category==6">{{$t('construcion_company')}}</span>
                <span v-else-if="category==4">{{$t('HVAC_companies')}}</span>
                <span v-else-if="category==3">{{$t('Stone_companies')}}</span>
                <span v-else-if="category==5">{{$t('interior_decoration')}}</span>
                       <span v-else-if="category==7">{{$t('other')}}</span>
        

    </div>
</template>

<script>
export default {
    props:{category:Number}
}
</script>


<style scoped>
.uae{
    display:inline-block;
}
</style>
