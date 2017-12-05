<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="printableArea">
                <div class="card-header">
                    <h4><img src="../assets/img/vue-w_logo1.png" alt="Company logo"/></h4>
                    <span class="float-right">
            <strong> Invoice</strong>
          </span>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-6 col-md-6 invoice_address">
                            <h4>Invoice #26434/45/F1</h4> Order #346545
                            <br> Date: 16/02/2017
                        </div>
                        <div class="col-6 col-md-6 text-right invoice_address">
                            <h4><img src="../assets/img/pages/invoice_code.jpg" alt="invoice QR Code"/></h4>
                        </div>
                        <div class="col-12 col-md-6 invoice_address">
                            <h4>Billing Details:</h4>
                            <address>
                                Lewis Doe
                                <br/> 6889 Lunette Street
                                <br/> Melbourne,Austria
                                <br/> <strong>Phone:</strong>12-345-678
                                <br/> <strong>Mail Id:</strong> Rad_Champ@yahoo.com
                            </address>
                        </div>
                        <div class="col-12 col-md-6 invoice_address text-right">
                            <div class="float-right">
                                <h4>Invoice Info:</h4>
                                <address>
                                    <span class="visible-xs">#6654-45</span> Tom Percy
                                    <br/> 3946 Penn Street
                                    <br/> Ohio,USA
                                    <br/> <strong>Phone:</strong> 32-666-756
                                    <br/> <strong>Mail Id:</strong> Lucy_Maggi6@yahoo.com
                                </address>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="customtable">
                                    <thead>
                                        <tr class="bg-default">
                                            <th>#</th>
                                            <th><strong>Item Name</strong></th>
                                            <th class="text-center"><strong>Unit Cost</strong></th>
                                            <th class="text-center"><strong>Quantity</strong></th>
                                            <th class="text-right"><strong>Total</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Lorem Ipsum text</td>
                                            <td class="text-center">$1540</td>
                                            <td class="text-center">2</td>
                                            <td class="text-right">$3080</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Classical Latin literature</td>
                                            <td class="text-center">$220</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">$220</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>chunk of Lorem</td>
                                            <td class="text-center">$49</td>
                                            <td class="text-center">1</td>
                                            <td class="text-right">$49</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 text-right">
                            <div class="row">
                                <div class="col-9">
                                    <p><strong>Sub Total :</strong></p>
                                </div>
                                <div class="col-3">
                                    <p><strong>$3349</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <p><strong>Discount(12%) :</strong></p>
                                </div>
                                <div class="col-3">
                                    <p><strong>(&minus;) $402</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <p><strong>Vat(7%) :</strong></p>
                                </div>
                                <div class="col-3">
                                    <p><strong>(&plus;) $235</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <p><strong>Total :</strong></p>
                                </div>
                                <div class="col-3">
                                    <p><strong>$3182</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4><Strong>Terms and conditions:</Strong></h4>
                        <ul class="terms_conditions">
                            <li>An invoice must accompany products returned for warantty.
                            </li>
                            <li>Balance due within 10 days of invoice date,1.5% interest/month thereafter.
                            </li>
                            <li>All goods returned for replacement/credit must be saleable condition with original packaging.
                            </li>
                        </ul>
                    </div>
                    <div class="row btn-section">
                        <div class="col-lg-12 col-md-12 col-12">
                            <span class="float-right">
                <button type="button" class="btn btn-responsive button-alignment btn-success"
                        data-toggle="button">
                  <i class="fa fa-usd"></i> Pay Now
                </button>
                <button type="button" class="btn btn-responsive button-alignment btn-primary"
                        data-toggle="button">
                  <span @click="printDiv()">
                    <i class="fa fa-print"></i>Print
                  </span>
                            </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Invoice",
    mounted: function() {

    },
    destroyed: function() {

    },
    methods: {
        printDiv() {
            window.print();
        }
    }
}
</script>
<style scoped>
#printableArea {
    border: 1px solid #ccc;
}

.card-header {
    border-bottom: 1px solid #ccc;
}

.card-block {
    padding: 25px;
}

.card-header span {
    margin-top: -33px;
    font-size: 18px;
}

.invoice_address {
    margin: 10px 0;
}

.table {
    table-layout: fixed;
    border: 1px solid #ccc;
}

.table tbody > tr {
    height: 50px;
}

td,
th {
    word-wrap: break-word;
}

.terms_conditions {
    list-style: initial;
    padding-left: 25px;
}

.table thead > tr > th {
    padding: 10px 8px;
    width: 80px;
    background-color: #ccc;
}

.table thead > tr > th:nth-child(2) {
    max-width: 180px;
}

.table-responsive > .table > tbody > tr > td,
.table-responsive > .table > tfoot > tr > td {
    padding: 15px 8px;
    white-space: normal;
}

@media screen and (min-width: 768px) {
    .invoice_address {
        margin: 20px 0;
    }
}

@media print {
    .btn-section {
        display: none !important;
    }
    .table-responsive {
        display: inline-table;
        width: 100%;
    }
}
</style>
