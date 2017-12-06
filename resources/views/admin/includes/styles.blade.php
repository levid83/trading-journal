<style>
    @media only screen and (max-width: 1000px) {

        /* Force table to not be like tables anymore */
        #responsive-grid table,
        #responsive-grid thead,
        #responsive-grid tbody,
        #responsive-grid th,
        #responsive-grid td,
        #responsive-grid tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        #responsive-grid thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        #responsive-grid tr { border: 1px solid #ccc; }

        #responsive-grid td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            white-space: normal;
            text-align:left;
        }

        #responsive-grid td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            text-align:left;
            font-weight: bold;
        }

        /*
        Label the data
        */
        #responsive-grid td:before { content: attr(data-title); }
    }
</style>