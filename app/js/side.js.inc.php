<script>


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