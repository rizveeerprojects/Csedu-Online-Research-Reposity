<?php
	session_start();
    $_SESSION["page_name"] = "thesis_details.php";
    $key = 'unknown';

    function split_from_delemeter($string,$delim){
        $temp_array = explode($delim,$string);
        return $temp_array;
    }
    function converter($char){
        if($char=="42") return '*';
        //number
        $number_array = array('0','1','2','3','4','5','6','7','8','9');
        $map_num_array = array("48","49","50","51","52","53","54","55","56","57");
        for($i=0;$i<sizeof($map_num_array);$i=$i+1) {
            if($map_num_array[$i] == $char) {
                return $number_array[$i];
            }
        }
        //character 
        $character_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $map_character_array = array("65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90");
        for($i=0;$i<sizeof($map_character_array);$i=$i+1){
            if($map_character_array[$i] == $char) {
                return $character_array[$i];
            }
        }
        return "-1";
    }
    function convert_to_thesis_code($val){
        $temp_array = split_from_delemeter($val,' ');
        $code ='';
        for($i=0;$i<sizeof($temp_array);$i=$i+1){
            $temp = converter($temp_array[$i]);
            if($temp=="-1"){
                //unknown character return "";
                return "";
            }
            else {
                $code=$code.$temp;
            }
        }
        return $code;
    }

    if(isset($_REQUEST['key'])){
        $key = $_REQUEST['key'];
        $key = convert_to_thesis_code($key);
        $_SESSION["running_thesis_code"] = $key;
    }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Initial description -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="Jquery/jquery-3.3.1.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="media_wise_font_change.css">
    <link rel="stylesheet" href="header_futer.css">
    <link rel="stylesheet" href="form_design.css">
    <link rel="stylesheet" href="table_decoration.css">
    <link rel="stylesheet" href="button_design.css">
    <link rel="stylesheet" href="input_field_design.css">

    <title>Csedu Research Repository</title>
    <link rel="icon" type="image/png" href="logo.png">

</head>

<body>
    <!--The top bar-->
    <div class="top-header">
        <div></div>
        <div class="log-button">
            <button type="submit" class="btn btn-default" id="log_button">Login</button>
            <button type="submit" class="btn btn-default" id="account_button">Account</button>
        </div>
    </div>

    <!-- Name and Logo -->
    <div class="name-logo">
        <div class="logo-1">
            <image class="img-responsive" src="DU.jpg" alt="Chania" height="100" width="100"></image>
        </div>
        <div class="name">
            <h3>Department Of Computer Science and Engineering</h3>
            <h4>University of Dhaka</h4>
            <h4>Online Research Repository</h4>
        </div>
        <div class="logo-2">
            <image class="img-responsive" src="CSEDU.png" alt="Chania" height="100" width="100"></image>
        </div>
    </div>
    <!--The Down header/Menu Bar decoration-->
    <div class="menu-option-design">
        <div></div>
        <div class="menu-per-option-decoration" id="home_option">Home</div>
        <div class="menu-per-option-decoration" id="upload_option">Upload</div>
        <div class="menu-per-option-decoration" id="search_option">Search</div>
        <div class="menu-per-option-decoration" id="faq_option">FAQ</div>
        <div class="menu-per-option-decoration" id="other_option">Others</div>
        <div></div>
    </div>

    <!--The bar under Menu decoration-->
    <div class="bar-under-menu">
        <div class="bar-under-menu-main-part"></div>
    </div>


    <div class="table-design" id="thesis_code_div">
        <!-- heading decoration -->
        <div class="table-section-heading-decoration">
            <h2>Thesis Code Section</h2>
        </div>
        <!--Input Field-->
        <div class="simple-form">
            <div class="form-group">
                <input type="text" class="form-control" id="thesis_code" name="" placeholder="thesis-code">
            </div>
            <div class="form-group">
                <button type="button" id="thesis_code_submit" class="btn btn-default btn-success">Submit</button>
            </div>
        </div>
    </div>

        

    <div id="thesis_total_information">
        <!-- Things will come from server -->

    </div>

    <!--Show Section
    <div class="table-design">
        <!-- heading decoration
        <div class="table-section-heading-decoration">
            <h2>Thesis/Project Information</h2>
        </div>
        <!--Thesis basic Information part
        <div class="simple-form">
            <!--Thesis name-
            <div class="form-group">
                <label for="thesis_name">Thesis/Project Name</label>
                <input type="text" class="form-control" id="thesis_name" value="Designing An Efficient Approach For Mining Sequential Pattern" placeholder="Designing an efficient..">
            </div>
            <!--Supervisor Name
            <div class="form-group">
                <label for="supervisor_name">Supervisor Name</label>
                <select class="form-control" id="supervisor_name">
                    <option>Dr. Chowdhury Farhan Ahmed</option>
                    <option>Dr. Asif Hossain Khan</option>
                </select>
            </div>
            <!--Research Group
            <div class="form-group">
                <label for="research_group">Research Group</label>
                <input type="text" class="form-control" id="research_group" value="Data Minining" readonly>
            </div>

            <!--Year
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" value="2018" placeholder="2018">
            </div>
            <!--View
            <div class="form-group">
                <label for="general_view">General View</label>
                <select id="view" class="form-control">
                        <option>Yes</option>
                        <option>No</option>
                </select>
            </div>
        </div>

        <!-- heading decoration
        <div class="table-section-heading-decoration">
            <h2>Student Information Part</h2>
        </div>



        <div class="simple-form">
            <!--Student Information Part
            <div class="form-group">
                <label for="student">Student 1</label>
            </div>
            <div>
                <table class="table table-bordered table-responsive" style="background:white;" id="">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" class="input-field-design" name="" placeholder="name"></td>
                        </tr>
                        <tr>
                            <td>Roll</td>
                            <td><input type="text" class="input-field-design" name="" placeholder="roll"></td>
                        </tr>
                        <tr>
                            <td>Program</td>
                            <td>
                                <select class="form-control">
                                <option>BSc</option>
                                <option>MSc</option>
                                <option>Phd</option>
                                <option>Extra</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" class="input-field-design" name="" placeholder="email"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Delete Button
            <div class="form-group">
                <button type="button" class="btn btn-default btn-danger">Delete</button>
            </div>
            <!-- Update Button
    <div class="form-group">
        <button type="button" class="btn btn-default btn-success">Add New Student</button>
        <button type="button" class="btn btn-default btn-success">Update</button>
        <button type="button" class="btn btn-default btn-danger">Delete thesis</button>
    </div>



    <!--File Uploading Section
            <!-- heading decoration
            <div class="table-section-heading-decoration">
                <h2>File Section</h2>
            </div>
            <!--File Showing/Provoking option
            <div class="form-group">
                <label for="file_viewing">File Showing Option</label>
                <select class="form-control">
                            <option>Show</option>
                            <option>Hide</option>
                </select>
            </div>

            <!--File Type option
            <div class="form-group">
                <label for="file_type">File Showing Option</label>
                <select class="form-control">
                        <option>Thesis File</option>
                 </select>
            </div>

            <!--Form Input
            <div class="form-group">
                <form enctype="multipart/form-data">
                    <input type="file" name="file" id="">
                </form>
            </div>

            <!--Upload Secion
            <div class="form-group">
                <button type="button" class="btn btn-default btn-success">upload</button>
            </div>

            <!--Show Files
            <div>
                <table class="table table-bordered table-responsive" style="background:white;" id="">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>uva</td>
                            <td><a href="uva" target="_blank">View</a></td>
                            <td><a href="uva" download="uva">Download</a></td>
                            <td><button type="button" class="btn btn-default btn-danger">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
-->

    <!--The Footer Section-->
    <div class="footer">
        <!-- Space section-->
        <div></div>
        <!--Copyright Section-->
        <div class="copyright-section">
            <h6>&#169 CSEDU Research Repository</h6>
        </div>
        <!-- Empty  Section-->
        <div></div>
        <!--Contact Section-->
        <div class="contact-section">
            <a href="http://www.cse.du.ac.bd/">[Department's Website Link]</a>
            <a href="about_us.php">[Contact]</a>
            <a href="about_us.php">[Policy]</a>
        </div>
        <!-- Space section-->
        <div></div>
    </div>

    <!-- The Ending Section -->
    <div style="width:100%; background:black; color:white">
        <div class="table-section-heading-decoration">
            <h6>To get better view of this website<br>Please switch to mozilla firefox browser.<br> </h6>
        </div>
        <div style="margin-left:50%;">
        <image class="img-responsive" src="mozilla.png" alt="Chania" height="20" width="20"></image>
        </div>

    </div>
    <!--The Black Border -->
    <div style="width:100%; background:black; color:black; height:50px">
    </div>

    <script src="sql_injection.js"></script>
    <script src="header_futer.js"></script>
    <script src="thesis_code_section.js"></script>
    <script src="thesis_detail_section.js"></script>
    <script src="file_upload.js"></script>


</body>

</html>
