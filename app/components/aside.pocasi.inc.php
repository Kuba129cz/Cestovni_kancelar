<aside class="aside col-3" x-bind:class="{ 'aside--close': open }">
    <div>    
        <a href="#" class="btn btn--primary DX-menu" @click="open = !open"></a>
    </div>
    <div x-data="pocasiApp('muni_3859')" x-bind:class="{ 'sidemenu--close': open }">
        <template x-if="pocasi.length>0">
            <template x-for="den in pocasi" :key="den.localDate">
                <div class="item"><!--alpine je virtual tak musim pouzit realni DOM-->
                    <span x-text="den.localDate"></span>
                    <img src="app/resources/pocasi/1_skoro-jasno.svg"/>
                    <span x-text="den.tempMax"></span>
                    <span x-text="den.tempMin"></span>
                </div>                
            </template>
        </template>
        <template x-if="pocasi.length===0">
          <div>null</div>
        </template>
    </div>
    <?php include __DIR__.'/../js/pocasiApp.js.php'; ?>
</aside>