<?php
include_once("./classes/components/card.php");
include_once("./classes/dbAPI.class.php");

$db = new Database();

$submissions = $db->findSubmissionByUserId($_SESSION['UID']);

?>

<!--CONTENT START-->
<div id="content" class="container-fluid p-5">
    <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 mb-5">
        <h1 class="display-4">My Submissions</h1>
        <p class="lead">Check your paper progress here. We'll send you a notification as soon as we completed our review!</p>
        <div style="margin: auto; width: <?php echo (!Mobile::isActive()? '36rem' : '100%') ?>;">

            <?php
                if (!$submissions) {
                    echo '<div class="d-flex align-items-center justify-content-center vh-100 bg-secondary">
                            <h1 class="display-6 fw-bold text-white">No submissions</h1>
                        </div>'; 
                }
                else {
                    foreach ($submissions as $sub) {
                        $conference = $db->findConferenceById($sub->ConferenceId); 
                        
                        $review = $db->findReviewBySubmissionId($sub->SubmissionId); 
                        $reviewStatus = ($review)? $review[0]->ReviewStatus : ""; 
                        $status = ""; 
                        switch ($reviewStatus) {
                            case "Success": 
                                $status = "Accepted"; 
                            break;

                            case "Fail": 
                                $status = "Rejected"; 
                            break; 

                            default: 
                                $status = "Pending"; 
                            break; 

                        }
                        $timestamp = strtotime($sub->SubmissionTimestamp); 
                        $date = date('d/m/Y', $timestamp);
                        $time = date('H:i', $timestamp);
                        $subData = [
                            $conference[0]->ConferenceTitle,
                            $sub->SubmissionPath, 
                            $status, 
                            $date, 
                            $time,   
                            $sub->SubmissionId                         
                        ];
                        echo Card::display("submission", $subData);
                    }
                }
            ?>
            
        </div>
    </div>
</div>
<!--CONTENT END-->