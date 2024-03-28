<aside class="aside col-3" x-bind:class="{ 'aside--close': open }">
    <a href="#" class="btn btn--primary DX-menu" @click="open = !open"></a>
    <div>
        <div class="sidePair">
            od
            <input type="date" id="dateFrom" name="trip-start"/>
        </div>
        <div class="sidePair">
            <span>do</span>
            <input type="date" id="dateTo" name="trip-end"/>
        </div>
        <script>
          document.getElementById('dateFrom').valueAsDate = new Date();
          document.getElementById('dateTo').valueAsDate = new Date();
        </script>
    </div>
    <div>
        <div>
            destinace
            <select x-model="newItem.destination_id">
                <option>Vybrat</option>
                <!--<template x-for="destination in destinations" :key="destination.dest_id">
                    <option x-bind:value="destination.dest_id" x-text="destination.dest_name"></option>
                </template>-->
            </select>
        </div>
        <div>
            typ stravy
            <select x-model="newItem.destination_id">
                <option>Vybrat</option>
                <!--<template x-for="destination in destinations" :key="destination.dest_id">
                    <option x-bind:value="destination.dest_id" x-text="destination.dest_name"></option>
                </template>-->
            </select>
        </div>
        <div>
            cena
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
        </div>
    </div>
</aside>