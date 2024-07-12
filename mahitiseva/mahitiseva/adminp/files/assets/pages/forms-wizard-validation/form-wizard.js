<!DOCTYPE html>
<html lang="en">

<head>
    <title>Satyam</title>
  <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">
</head>

<body> <?php include 'sidebar.php';?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Advanced DataTable</h4>
                                                    <span>Advanced initialisation of DataTables</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Basic Initialization</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Advance Initialization</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- DOM/Jquery table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>DOM/Jquery</h5>
                                                <span>Events assigned to the table can be exceptionally useful for user interaction, however you must be aware that DataTables will add and remove rows from the DOM as they are needed (i.e. when paging only the visible elements are actually available in the DOM). As such, this can lead to the odd hiccup when working with events.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- DOM/Jquery table end -->
                                        <!-- Column Rendering table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Column Rendering</h5>
                                                <span>Each column has an optional rendering control called columns.render which can be used to process the content of each cell before the data is used. columns.render has a wide array of options available to it for rendering different types of data orthogonally (ordering, searching, display etc), but it can be used very simply to manipulate the content of a cell, as shown here.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="colum-rendr" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Column Rendering table end -->
                                        <!-- Multiple Table Control Elements start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Multiple Table Control Elements</h5>
                                                <span>As is described by the basic DOM positioning example you can use the dom initialization parameter to move DataTables features around the table to where you want them.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="multi-table" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Multiple Table Control Elements end -->
                                        <!-- Complex Headers With Column Visibility table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Complex Headers With Column Visibility</h5>
                                                <span>Complex headers (using colspan / rowspan) can be used to group columns of similar information in DataTables, creating a very powerful visual effect.
                                                   In addition to the basic behaviour, DataTables can also take colspan and rowspans into account when working with hidden columns. The colspan and rowspan attributes for each cell are automatically calculated and rendered on the page for you. This allows the columns.visible option and column().visible() method to take into account rowspan / colspan cells, drawing the header correctly.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="complex-header" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">Name</th>
                                                                <th colspan="2">HR Information</th>
                                                                <th colspan="3">Contact</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Position</th>
                                                                <th>Salary</th>
                                                                <th>Office</th>
                                                                <th>Extn.</th>
                                                                <th>E-mail</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Salary</th>
                                                                <th>Office</th>
                                                                <th>Extn.</th>
                                                                <th>E-mail</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Complex Headers With Column Visibility table end -->
                                        <!-- Language File table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Language File</h5>
                                                <span>As well as being able to pass language information to DataTables through the language initialization option, you can also store the language information in a file, which DataTables can load by Ajax using the language.url option.</span>
                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="lang-file" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Language File table end -->
                                        <!-- Setting Defaults table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Setting Defaults</h5>
                                                <span>When working with DataTables over multiple pages it is often useful to set the initialization defaults to common values (for example you might want to set dom to a common value so all tables get the same layout). This can be done using the $.fn.dataTable.defaults object. This object will take all of the same parameters as the DataTables initialization object, but in this case you are setting the default for all future initializations of DataTables.</span>

                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="setting-default" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Setting Defaults table end -->
                                        <!-- Row Grouping table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Row Grouping</h5>
                                                <span>Although DataTables doesn't have row grouping built-in (picking one of the many methods available would overly limit the DataTables core), it is most certainly possible to give the look and feel of row grouping.</span>

                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="row-grouping" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row Grouping table end -->
                                        <!-- Footer Callback table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Footer Callback</h5>
                                                <span>Through the use of the header and footer callback manipulation functions provided by DataTables (headerCallback and footerCallback), it is possible to perform some powerful and useful data manipulation functions, such as summarising data in the table.</span>

                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="footer-callback" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>First name</th>
                                                                <th>Last name</th>
                                                                <th>Office</th>
                                                                <th>age</th>
                                                                <th>DOB</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="5" style="text-align:right">Total:</th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Footer Callback table end -->
                                        <!-- Custom Toolbar Elements start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Custom Toolbar Elements</h5>
                                                <span>DataTables inserts DOM elements around the table to control DataTables features, and you can make use of this mechanism as well to insert your own custom elements. In this example a div with a class of '-string toolbar' is created using dom, and jQuery then used to insert HTML into that element to create the toolbar. You could put whatever HTML you want into the toolbar!</span>

                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="custm-tool-ele" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>First name</th>
                                                                <th>Last name</th>
                                                                <th>Office</th>
                                                                <th>age</th>
                                                                <th>DOB</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="5" style="text-align:right">Total:</th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Custom Toolbar Elements end -->
                                        <!-- Row Created Callback table start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Row Created Callback</h5>
                                                <span>The following example shows how a callback function can be used to format a particular row at draw time. For each row that is generated for display, the createdRow function is called once and once only. It is passed the create row node which can then be modified.</span>

                                            </div>
                                            <div class="card-block">
                                                <div class="table-responsive dt-responsive">
                                                    <table id="row-callback" class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Tiger Nixon</td>
                                                                <td>System Architect</td>
                                                                <td>Edinburgh</td>
                                                                <td>61</td>
                                                                <td>2011/04/25</td>
                                                                <td>$320,800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>63</td>
                                                                <td>2011/07/25</td>
                                                                <td>$170,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ashton Cox</td>
                                                                <td>Junior Technical Author</td>
                                                                <td>San Francisco</td>
                                                                <td>66</td>
                                                                <td>2009/01/12</td>
                                                                <td>$86,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cedric Kelly</td>
                                                                <td>Senior Javascript Developer</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2012/03/29</td>
                                                                <td>$433,060</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Airi Satou</td>
                                                                <td>Accountant</td>
                                                                <td>Tokyo</td>
                                                                <td>33</td>
                                                                <td>2008/11/28</td>
                                                                <td>$162,700</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Brielle Williamson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>New York</td>
                                                                <td>61</td>
                                                                <td>2012/12/02</td>
                                                                <td>$372,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Herrod Chandler</td>
                                                                <td>Sales Assistant</td>
                                                                <td>San Francisco</td>
                                                                <td>59</td>
                                                                <td>2012/08/06</td>
                                                                <td>$137,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Rhona Davidson</td>
                                                                <td>Integration Specialist</td>
                                                                <td>Tokyo</td>
                                                                <td>55</td>
                                                                <td>2010/10/14</td>
                                                                <td>$327,900</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Colleen Hurst</td>
                                                                <td>Javascript Developer</td>
                                                                <td>San Francisco</td>
                                                                <td>39</td>
                                                                <td>2009/09/15</td>
                                                                <td>$205,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sonya Frost</td>
                                                                <td>Software Engineer</td>
                                                                <td>Edinburgh</td>
                                                                <td>23</td>
                                                                <td>2008/12/13</td>
                                                                <td>$103,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jena Gaines</td>
                                                                <td>Office Manager</td>
                                                                <td>London</td>
                                                                <td>30</td>
                                                                <td>2008/12/19</td>
                                                                <td>$90,560</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quinn Flynn</td>
                                                                <td>Support Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>22</td>
                                                                <td>2013/03/03</td>
                                                                <td>$342,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Charde Marshall</td>
                                                                <td>Regional Director</td>
                                                                <td>San Francisco</td>
                                                                <td>36</td>
                                                                <td>2008/10/16</td>
                                                                <td>$470,600</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Haley Kennedy</td>
                                                                <td>Senior Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>43</td>
                                                                <td>2012/12/18</td>
                                                                <td>$313,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tatyana Fitzpatrick</td>
                                                                <td>Regional Director</td>
                                                                <td>London</td>
                                                                <td>19</td>
                                                                <td>2010/03/17</td>
                                                                <td>$385,750</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Michael Silva</td>
                                                                <td>Marketing Designer</td>
                                                                <td>London</td>
                                                                <td>66</td>
                                                                <td>2012/11/27</td>
                                                                <td>$198,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Paul Byrd</td>
                                                                <td>Chief Financial Officer (CFO)</td>
                                                                <td>New York</td>
                                                                <td>64</td>
                                                                <td>2010/06/09</td>
                                                                <td>$725,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gloria Little</td>
                                                                <td>Systems Administrator</td>
                                                                <td>New York</td>
                                                                <td>59</td>
                                                                <td>2009/04/10</td>
                                                                <td>$237,500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Bradley Greer</td>
                                                                <td>Software Engineer</td>
                                                                <td>London</td>
                                                                <td>41</td>
                                                                <td>2012/10/13</td>
                                                                <td>$132,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dai Rios</td>
                                                                <td>Personnel Lead</td>
                                                                <td>Edinburgh</td>
                                                                <td>35</td>
                                                                <td>2012/09/26</td>
                                                                <td>$217,500</td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th>Salary</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row Created Callback table end -->
                                    </div>
                                    <!-- Page-body start -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
     <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>


    <!-- i18next.min.js -->
    <script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <!-- Custom js -->
   <script src="files/bower_components/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="files/bower_components/jquery.steps/js/jquery.steps.js"></script>
    <script src="files/bower_components/jquery-validation/js/jquery.validate.js"></script>
    <!-- Validation js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/form-validation/validate.js"></script>
   <!-- notification js -->
    <script type="text/javascript" src="files/assets/js/bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/notification/notification.js"></script>
  
     <!-- data-table js -->
      <script src="files/assets/pages/data-table/js/data-table-custom.js"></script>
  <script src="files/bower_components/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="files/bower_components/jquery.steps/js/jquery.steps.js"></script>
    <script src="files/bower_components/jquery-validation/js/jquery.validate.js"></script>
    <!-- Validation js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="files/assets/pages/form-validation/validate.js"></script>
    <!-- Custom js -->
    <script src="files/assets/pages/forms-wizard-validation/form-wizard.js"></script>

    <script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    
    <script src="files/assets/pages/forms-wizard-validation/form-wizard.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/vartical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files/assets/js/script.js"></script>
    <script src="files/assets/js/pcoded.min.js"></script>
    <script src="files/assets/js/vartical-layout.min.js"></script>
    <script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="files/assets/js/script.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->

</body>

</html>
  'use strict';
  $(document).ready(function() {

      // $('#date,#datejoin').bootstrapMaterialDatePicker({
      //        time: false,
      //        clearButton: true
      //    });
      //  $("#example-date-inputS").bootstrapMaterialDatePicker({
      //                time: false,
      //                clearButton: true
      //            });

      $("#basic-forms").steps({
          headerTag: "h3",
          bodyTag: "fieldset",
          transitionEffect: "slideLeft",
          autoFocus: true
      });
      $("#verticle-wizard").steps({
          headerTag: "h3",
          bodyTag: "fieldset",
          transitionEffect: "slide",
          stepsOrientation: "vertical",
          autoFocus: true
      });

      $("#design-wizard").steps({
          headerTag: "h3",
          bodyTag: "fieldset",
          transitionEffect: "slideLeft",
          autoFocus: true
      });




      var form = $("#example-advanced-form").show();

      form.steps({
          headerTag: "h3",
          bodyTag: "fieldset",
          transitionEffect: "slideLeft",
          onStepChanging: function(event, currentIndex, newIndex) {

              // Allways allow previous action even if the current form is not valid!
              if (currentIndex > newIndex) {
                  return true;
              }
              // Forbid next action on "Warning" step if the user is to young
              if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                  return false;
              }
              // Needed in some cases if the user went back (clean up)
              if (currentIndex < newIndex) {
                  // To remove error styles
                  form.find(".body:eq(" + newIndex + ") label.error").remove();
                  form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
              }
              form.validate().settings.ignore = ":disabled,:hidden";
              return form.valid();
          },
          onStepChanged: function(event, currentIndex, priorIndex) {

              // Used to skip the "Warning" step if the user is old enough.
              if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                  form.steps("next");
              }
              // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
              if (currentIndex === 2 && priorIndex === 3) {
                  form.steps("previous");
              }
          },
          onFinishing: function(event, currentIndex) {

              form.validate().settings.ignore = ":disabled";
              return form.valid();
          },
          onFinished: function(event, currentIndex) {
              alert("Submitted!");
              $('.content input[type="text"]').val('');
              $('.content input[type="email"]').val('');
              $('.content input[type="password"]').val('');
          }
      }).validate({
          errorPlacement: function errorPlacement(error, element) {

              element.before(error);
          },
          rules: {
              confirm: {
                  equalTo: "#password-2"
              }
          }
      });
  });
