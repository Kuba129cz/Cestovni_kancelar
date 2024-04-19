<script>

    function buildWhere(sideFiltr, pageFiltr) 
    {
        let where = pageFiltr ? pageFiltr : "id_zajezd>0"; //tautologie aby se to nesesypalo kvůli AND
        if(sideFiltr.datum_prijezdu) { where += " AND datum_prijezdu='" + sideFiltr.datum_prijezdu + "'"; }
        if(sideFiltr.datum_odjezdu) { where += " AND datum_odjezdu='" + sideFiltr.datum_odjezdu + "'"; }
        if(sideFiltr.cena_osoba) { where += " AND cena_osoba<=" + sideFiltr.cena_osoba; }
        if(sideFiltr.fk_strava) { where += " AND fk_strava=" + sideFiltr.fk_strava; }
        if(sideFiltr.fk_Adresa) { where += " AND fk_Adresa=" + sideFiltr.fk_Adresa; }
    
        return where;
    }

    function shared_orderBy(attribute, orderdir, zajezdy, orderAct) 
    {
        var desc = orderdir[attribute];
        const ordered = sortByAttribute(zajezdy, attribute, desc);
        console.log(`Sorted by ${attribute} (${desc ? 'desc' : 'asc'}):`, ordered);

        orderdir[attribute] = !orderdir[attribute];
        orderAct = { hodnoceni: false, cena_osoba: false, datum_odjezdu: false };
        orderAct[attribute] = true;

        return { ordered, orderdir, orderAct };
    }

    function sortByAttribute(arr, attribute, descending = false) 
    {
        const sortOrder = descending ? -1 : 1;

        // Use localeCompare for string comparison (case-insensitive)
        const compareFunction = (a, b) => {
            const aValue = a[attribute];
            const bValue = b[attribute];
            if (typeof aValue === 'string' && typeof bValue === 'string') {
                return aValue.localeCompare(bValue) * sortOrder;
            }
            return (aValue - bValue) * sortOrder;
        };

        return arr.slice().sort(compareFunction);
    }
    
</script>