<template>
    <div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <!-- First Basic Table strats here-->
                <b-card header="Basic table" header-tag="h4" class="bg-info-card">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>City</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Trey</td>
                                    <td>Armstrong</td>
                                    <td>Isadoreborough</td>
                                    <td>Jewelery</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Murl</td>
                                    <td>Denesik</td>
                                    <td>Alvismouth</td>
                                    <td>Tools</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Allison</td>
                                    <td>Gleason</td>
                                    <td>East Dinaton</td>
                                    <td>Electronics</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Mathilde</td>
                                    <td>Cassin</td>
                                    <td>New Royce</td>
                                    <td>Home</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Maeve</td>
                                    <td>Gutkowski</td>
                                    <td>Lake Justynport</td>
                                    <td>Tools</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Clint</td>
                                    <td>Metz</td>
                                    <td>Lake Rhianna</td>
                                    <td>Garden</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Patience</td>
                                    <td>Ferry</td>
                                    <td>Lake Veronica</td>
                                    <td>Games</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </b-card>
            </div>
            <div class="col-lg-6">
                <!-- First Basic Table strats here-->
                <b-card header="Bordered Table" header-tag="h4" class="bg-success-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Loyce</td>
                                    <td>Larson</td>
                                    <td>Industrial</td>
                                    <td><span class="label label-sm label-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Vincenzo</td>
                                    <td>Bashirian</td>
                                    <td>Baby</td>
                                    <td><span class="label label-sm label-danger">Blocked</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Winona</td>
                                    <td>Hagenes</td>
                                    <td>Health</td>
                                    <td><span class="label label-sm label-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Clark</td>
                                    <td>Ebert</td>
                                    <td>Tools</td>
                                    <td><span class="label label-sm label-success">Approved</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Waino</td>
                                    <td>Labadie</td>
                                    <td>Music</td>
                                    <td><span class="label label-sm label-warning">Suspended</span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Jackson</td>
                                    <td>Abshire</td>
                                    <td>Shoes</td>
                                    <td><span class="label label-sm label-danger">Blocked</span></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Erica</td>
                                    <td>Lehner</td>
                                    <td>Shoes</td>
                                    <td><span class="label label-sm label-warning">Suspended</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </b-card>
            </div>
        </div>
        <!-- First Basic Table Ends Here-->
        <!-- Second Data Table Starts Here-->
        <div class="row">
            <div class="col-lg-12 mb-3">
                <b-card header="Table with Action buttons" header-tag="h4" class="bg-danger-card">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ambrose Schulist</td>
                                    <td>Ambrose.Schulist@hotmail.com</td>
                                    <td>098-354-8863</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bernadette Medhurst</td>
                                    <td>Bernadette.Medhurst75@hotmail.com</td>
                                    <td>258-452-3348</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hoyt Franecki</td>
                                    <td>Hoyt.Franecki@yahoo.com</td>
                                    <td>648-323-5530</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kianna Lockman</td>
                                    <td>Kianna.Lockman@gmail.com</td>
                                    <td>551-834-3163</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sheldon Howe</td>
                                    <td>Sheldon_Howe94@yahoo.com</td>
                                    <td>704-582-5580</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Timmothy Mertz</td>
                                    <td>Timmothy72@gmail.com</td>
                                    <td>641-915-3609</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Faye Mayer</td>
                                    <td>Faye34@gmail.com</td>
                                    <td>786-093-2620</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-xs text-white"><span class="fa fa-times"></span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </b-card>
            </div>
        </div>
        <!-- second row ends here -->
        <!-- Fourth Basic Table Starts Here-->
        <div class="row">
            <div class="col-lg-12">
                <b-card header="Responsive Table" header-tag="h4" class="bg-primary-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Durgan - Sauer</td>
                                    <td>Durgan-Sauer23@yahoo.com</td>
                                    <td>032-563-1943</td>
                                    <td>Music</td>
                                    <td>44631</td>
                                </tr>
                                <tr>
                                    <td>Hickle LLC</td>
                                    <td>HickleLLC.Cremin62@hotmail.com</td>
                                    <td>158-351-5915</td>
                                    <td>Garden</td>
                                    <td>4669</td>
                                </tr>
                                <tr>
                                    <td>Padberg - Cronin</td>
                                    <td>Padberg-Cronin.Kunde10@hotmail.com</td>
                                    <td>265-460-4774</td>
                                    <td>Automotive</td>
                                    <td>10214</td>
                                </tr>
                                <tr>
                                    <td>Lakin - Cronin</td>
                                    <td>Lakin-Cronin_Batz61@hotmail.com</td>
                                    <td>443-924-7214</td>
                                    <td>Shoes</td>
                                    <td>2949</td>
                                </tr>
                                <tr>
                                    <td>Bednar - Padberg</td>
                                    <td>Bednar-Padberg22@yahoo.com</td>
                                    <td>700-808-9992</td>
                                    <td>Grocery</td>
                                    <td>48239</td>
                                </tr>
                                <tr>
                                    <td>Gibson - DuBuque</td>
                                    <td>Gibson-DuBuque_Buckridge@yahoo.com</td>
                                    <td>372-126-7393</td>
                                    <td>Sports</td>
                                    <td>11656</td>
                                </tr>
                                <tr>
                                    <td>Schroeder Inc</td>
                                    <td>SchroederInc_Grimes98@gmail.com</td>
                                    <td>379-212-1752</td>
                                    <td>Baby</td>
                                    <td>20828</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Company</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </b-card>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "simple_tables"
}
</script>
