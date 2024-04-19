<script>

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