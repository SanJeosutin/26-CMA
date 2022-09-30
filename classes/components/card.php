<?php
class Card
{
    public static function display($type = '', $data = array())
    {
        implode(',', $data);

        switch ($type) {
            case 'submission':
                return self::submissionCard($data[0], $data[1], $data[2], $data[3], $data[4]);

            case 'event':
                return self::eventCard($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

            case 'upcomingEvent':
                return self::upcomingEventCard($data[0], $data[1], $data[2], $data[3]);

            case 'userProfileCard':
                return self::userProfileCard($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);

            case 'displayEvent':
                return self::displayEvent($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

            case 'manageUserCard':
                return self::manageUserCard($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

            case 'manageSubmissionCard':
                return self::manageSubmissionCard($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
        }
    }

    private static function submissionCard($title, $filePath, $status, $date, $time)
    {
        return '
        <div class="card">
            <span class="badge ' . self::defineStatus($status) . ' text-dark">Submission ' . $status . '</span>
            <div class="card-body">
                <h5 class="card-title">' . $title . '</h5>
                <h6 class="card-subtitle mb-2 text-muted">Submitted at: ' . $date . ' ' . $time . '</h6>
                <a href="./viewSubmission?filepath=' . $filePath . '" class="card-link">View My Paper</a> 
            </div>
        </div>
        <br>
        ';
    }

    //! $date & $time should be merge into $timestamp
    private static function eventCard($title, $link, $date, $time, $filePath, $presenter, $status)
    {
        return '
        <div class="card">
            <span class="badge ' . self::defineStatus($status) . ' text-dark">Event ' . $status . '</span>
            <div class="card-body">
                <h5 class="card-title">' . $title . '</h5>
                <h6 class="card-subtitle mb-2 text-muted">Presented by: ' . $presenter . ' </h6>
                <div class="text-left">
                    <p class="card-text"> 
                        <strong> Event Date </strong> : ' . $date . '</a><br>
                        <strong> Event Time </strong> : ' . $time . '</a><br>
                        <strong> Meeting URL </strong> : <a href="' . $link . '">' . $link . '</a><br>
                        <strong> Paper to be presented </strong> : <a href="' . $filePath . '">' . $filePath . '</a>
                    </p>
                    <form>
                        <select class="form-select">
                            <option value="accept">Confirmed Attendance</option>
                            <option value="reschedule">Request Another Time</option>
                            <option value="reject">Cancel Attendance</option>
                        </select>
                        <br>
                        <div class="form-group btn-group-sm d-grid gap-2">
                            <button name="submitAttendance" type="submit" class="btn btn-primary" onclick="showToast()">Submit Attendance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        ';
    }

    private static function upcomingEventCard($title, $timestamp, $eventURL, $status)
    {
        return '
        <div class="card bg-gradient-light">
            <span class="badge ' . self::defineStatus($status) . ' text-dark">' . $status . '</span>
            <div class="card-body">
                <h5 class="card-title">' . $title . '</h5>
                <h6 class="card-subtitle mb-2 text-muted">Event at: ' . $timestamp . ' </h6>
                <a class="stretched-link" href="' . $eventURL . '" class="card-link">View My Event in Details</a> 
            </div>
        </div>
        <br>
        ';
    }

    private static function userProfileCard($fName, $lName, $email, $phoneNo, $dob, $password)
    {
        return '
        <div class="card bg-gradient-light">
            <fieldset id="field-edit-' . $id . '" disabled>
                <form class="form-inline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <strong>First Name</strong>
                            </div>
                            <div class="col text-secondary">
                                <input id="uFName-' . $id . '" name="uFName-' . $id . '" type="text" class="form-control" value="' . $fName . '">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <strong>Last Name</strong>
                            </div>
                            <div class="col text-secondary">
                                <input id="uLName-' . $id . '" name="uLName-' . $id . '" type="text" class="form-control" value="' . $lName . '">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <strong>Email</strong>
                            </div>
                            <div class="col text-secondary">
                                <input id="uEmail-' . $id . '" name="uEmail-' . $id . '" type="text" class="form-control" value="' . $email . '">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <strong>Phone No.</strong>
                            </div>
                            <div class="col text-secondary">
                                <input id="uPhoneNo-' . $id . '" name="uPhoneNo-' . $id . '" type="text" class="form-control" value="' . $phoneNo . '">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <strong>Date of Birth</strong>
                            </div>
                            <div class="col text-secondary">
                                <input id="uDOB-' . $id . '" name="uDOB-' . $id . '" type="text" class="form-control" value="' . $dob . '">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <strong>Password</strong>
                            </div>
                            <div class="col text-secondary">
                                ' . $password . '
                                <!-- <input id="uPass-' . $id . '" name="uPass-' . $id . '" type="text" class="form-control" value="' . $password . '">-->
                            </div>
                            
                        </div>                 
                    </div>
                    <p id="uID-' . $id . '" name="uID-' . $id . '">' . $id . '</p>
                </form>
            </fieldset>
            <div class="row">
                <div id="box-edit-' . $id . '" class="col border-end d-flex justify-content-center">
                    <button id="edit-' . $id . '" type="button" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i> EDIT
                    </button>
                </div>
            </div>
        </div>
        <br>
        ';
    }

    //? Should be changed to displayEventCard and not displayEvent
    private static function displayEvent($id, $title, $location, $date, $time, $fee, $status)
    {
        return '
        <div class="card">
            <span class="badge ' . ' text-dark">' . $title . '</span>
            <div class="card-body">
                <h5 class="card-title">Title: ' . $title . '</h5>
                <h6 class="card-subtitle mb-2 text-muted">Date: ' . $date . ' </h6>
                <h6 class="card-subtitle mb-2 text-muted">Time: ' . $time . ' </h6>
                <h6 class="card-subtitle mb-2 text-muted">Location: ' . $location . ' </h6>
                <h6 class="card-subtitle mb-2 text-muted">Registration Fee: $' . $fee . ' </h6>
                <a href="./submitPaper?eventid=' . $id . '" class="card-link">' . $status . '</a> 
            </div>
        </div>
        <br>
        ';
    }


    private static function manageUserCard($id, $fname, $lname, $dob, $email, $phoneNo, $role)
    {
        return '
        <!--DISPLAY DATA START-->
        <div class="card bg-light border-dark ml-2 mr-2 mt-1">
            <div class="badge text-dark border-bottom border-dark bg-gradient-secondary">
                <div class="row ml-1 mr-1 ">
                    <div class="col border-end m-1">
                        <p id="uID-' . $id . '" name="uID-' . $id . '">' . $id . '</p>
                    </div>
                    <div id="box-edit-' . $id . '" class="col border-end">
                        <button id="edit-' . $id . '" type="button" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i> EDIT
                        </button>
                    </div>
                    <div id="box-disable-' . $id . '" class="col border-end">
                        <button id="disable-' . $id . '" type="button" class="btn btn-sm btn-danger">
                            <i class="fa fa-minus"></i> DISABLE
                        </button>
                    </div>
                    <div class="col m-1">
                    <p id="uRole-' . $id . '" name="uRole-' . $id . '">' . $role . '</p>

                    </div>
                </div>
            </div>
            <fieldset id="field-edit-' . $id . '" disabled>
                <form class="form-inline">
                    <div class="card-body align-items-left align-text-left p-1">
                        <div class="row ml-1 mr-1">
                            <div class="col border-end border-dark">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <input id="uFName-' . $id . '" name="uFName-' . $id . '" type="text" class="form-control" value="' . $fname . '">
                                    <input id="uLName-' . $id . '" name="uLName-' . $id . '" type="text" class="form-control" value="' . $lname . '">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                    <input id="uEmail-' . $id . '" name="uEmail-' . $id . '" type="text" class="form-control" value="' . $email . '">
                                </div>
                            </div>
                        </div>
                        <div class="row ml-1 mr-1">
                            <div class="col border-end border-dark">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-mobile"></i>
                                        </div>
                                    </div>
                                    <input id="uPhoneNo-' . $id . '" name="uPhoneNo-' . $id . '" type="text" class="form-control" value="' . $phoneNo . '">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input id="uDOB-' . $id . '" name="uDOB-' . $id . '" type="text" class="form-control" value="' . $dob . '">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
        <!--DISPLAY DATA END-->
        ';
    }

    private static function manageSubmissionCard($id, $users, $status, $timestamp, $location, $reviewers, $filePath)
    {
        $card = '
        <!--DISPLAY DATA START-->
        <div class="card bg-light border-dark ml-2 mr-2 mt-1">
            <div class="badge text-dark border-bottom border-dark ' .  self::defineStatus($status) . '">
                <div class="row ml-1 mr-1 ">
                    <div class="col border-end m-1">
                        <p id="sID-' . $id . '" name="sID-' . $id . '">' . $id . '</p>
                    </div>
                    <div id="box-edit-' . $id . '" class="col border-end">
                        <button id="edit-' . $id . '" type="button" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i> EDIT
                        </button>
                    </div>
                    <div id="box-disable-' . $id . '" class="col border-end">
                        <button id="disable-' . $id . '" type="button" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> DELETE
                        </button>
                    </div>
                    <div class="col m-1">
                        <p id="sStatus-' . $id . '" name="sStatus-' . $id . '">' . $status . '</p>

                    </div>
                </div>
            </div>
            <fieldset id="field-edit-' . $id . '" disabled>
                <form class="form-inline">
                    <div class="card-body align-items-left align-text-left p-1">
                        <div class="row ml-1 mr-1">
                            <div class="col border-end border-dark">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <select class="form-select form-select-sm" id="authors-' . $id . '" aria-label="Default select">
                                    '; 
                                    //foreach($user in $users){
                                    //    $card += '<option value="' . $user->UserFirstName . ' ' . $user->UserLastName . '">' . $user->UserFirstName . ' ' . $user->UserLastName . '</option>';
                                    //}
                                    $card += '
                                        </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input id="sTimestamp-' . $id . '" name="sTimestamp-' . $id . '" type="text" class="form-control" value="' . $timestamp . '">
                                </div>
                            </div>
                        </div>
                        <div class="row ml-1 mr-1">
                            <div class="col border-end border-dark">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                    </div>
                                    <input id="sConLocation-' . $id . '" name="sConLocation-' . $id . '" type="text" class="form-control" value="' . $location . '">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-id-badge"></i>
                                        </div>
                                    </div>
                                    <select class="form-select form-select-sm" id="reviewers-' . $id . '" aria-label="Default select">
                                        <option value="' . $user->UserFirstName . ' ' . $user->UserLastName . '">' . $user->UserFirstName . ' ' . $user->UserLastName . '</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-1 mr-1">
                            <div class="col">
                                <div class="input-group input-group-sm p-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-file"></i>
                                        </div>
                                    </div>
                                    <input id="sPath-' . $id . '" name="sPath-' . $id . '" type="text" class="form-control" value="' . $filePath . '">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
        <!--DISPLAY DATA END-->';

        return $card;
    }

    private static function defineStatus($status)
    {
        switch ($status) {
            case 'Accepted':
                return 'bg-success';

            case 'Pending':
                return 'bg-warning';

            case 'Rejected':
                return 'bg-danger';
        }
    }
}
