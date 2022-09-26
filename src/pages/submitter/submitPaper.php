<?php

// include "../others/template/functions.php";
include_once("./src/template/notification.php");
require "./classes/dbAPI.class.php";

date_default_timezone_set('Australia/Melbourne');

$db = new Database();

$event = $db->findConferenceById($_GET["eventid"]); 
$eId = $event[0]->ConferenceId; 
$eTitle = $event[0]->ConferenceTitle; 
$userid = $_SESSION["UID"]; 

if ($event) {

    $err_msgs = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (in_array('.', $err_msgs) == FALSE) {
            if (isset($_FILES['SubmitPaper']['name'])) {

                $valid_exts = array("pdf", "doc", "docx"); 
                
                $file_submitted = $_FILES["SubmitPaper"]["name"]; 
                $file_ext = pathinfo($file_submitted, PATHINFO_EXTENSION);      // get file format

                $folder_path = __DIR__ . "/submissions/" . $userid;
                $filename_no_ext = $eId . "_" . $eTitle;        // Filename -> EventId_EventTitle
  				$filepath_no_ext = $folder_path . "/" . $filename_no_ext;
                $file_path = $filepath_no_ext . "." . $file_ext; 

                if (!file_exists($folder_path)) {          // create user file if it does not exist
                    mkdir($folder_path);
                }

                foreach ($valid_exts as $ext) {        // delete file submitted for related conference regardless of extension
                    if (is_file($filepath_no_ext . "." . $ext)) {
                        unlink($filepath_no_ext . "." . $ext);
                    }
                }                
            
                $filetmp = $_FILES["SubmitPaper"]["tmp_name"];
                move_uploaded_file($filetmp, $file_path);    
            
                $submissionid = $eId . "_" . $userid; 
                $timestamp = date('Y-m-d h:i:s');
                $status = "Not Reviewed"; 
                 
                if ($db->findSubmissionById($submissionid)) {

                    $db->updateSubmission(
                        $submissionid,          
                        $userid,
                        $eId, 
                        $timestamp, 
                        $filename_no_ext . "." . $file_ext, 
                        $status
                    ); 
                }
                else {
                    $db->createSubmission(
                        $submissionid,         
                        $userid,
                        $eId, 
                        $timestamp, 
                        $filename_no_ext . "." . $file_ext, 
                        $status
                    ); 
                }                
            }
        }
    }

?>
<div id="content" class="container-fluid p-5">

    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-center h-100">
        <div class="card-body">
            <h1 class="display-4">Submit Your New Finding!</h1>
            <p class="lead">We would love to see what you've come up with! So why not submit your paper here and well review it ASAP!</p>
            <div style="margin: auto; width: 36rem;">
                <br>
                <!--Start Event Register Form-->
                <form id="SubmitPaperForm" action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-2 mr-2">
                        <div class="row">
                            <!-- Submit Paper -->
                            <div class="col">
                                <div class="form-group">
                                    <input id="SubmitPaper" name="SubmitPaper" type="file" required class="form-control flex-column" accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                    <label for="SubmitPaper"> Attach a .doc, .docx, or .pdf file </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <div class="col">
                                <input class="form-check-input" type="checkbox" name="submitCheck" id="submitCheck" type="checkbox" required>
                                <label class="form-check-label" for="submitCheck">
                                    By submitting, you are agreeing to to our <a href="">Privacy Policies</a>
                                </label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="checkbox" name="uRemember" id="TermsConditions" type="checkbox" required>
                                <label class="form-check-label" for="TermsConditions">
                                    By submitting, you are agreeing to our <a href="">Terms & Conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group btn-group-lg d-grid gap-2">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!--End Register Appointment Form-->
            </div>
        </div>
    </div>
</div>

<?php
}
else {
    http_response_code(404);
    require $publicPath . './errors/404.php';
}
?>
    