// similar to import function but jQuery style 
$.getScript("./scripts/toast.js");
$.getScript("./scripts/button.js");

function editSubmissionData(rawID, tableID) {
    let editBox = "#box-".concat(rawID);

    // create buttons inside 'editBox' element's id
    $(editBox).append(
        createButton(['accept', rawID, 'success', 'check'], rawID, tableID),
        createButton(['cancel', rawID, 'danger', 'times'], rawID, tableID),
    );

    // when '✓' is clicked, update the table, show message, and revert button to original state 
    $("#accept-".concat(rawID)).click(function () {
        let id = rawID.replace('edit-', '-');
        userToast([
            'Action Completed!',
            'Submission with the ID of ' + id.replace('-', '') + ' was successfully changed.',
            'success'
        ]);

        removeButton("#accept-", rawID, tableID);
        removeButton("#cancel-", rawID, tableID);

        // hand the data to userHandler to process the changes
        $.post('./scripts/handlers/formHandler.php', {
            editBySubmission: event.target.id,
            SubmissionId: $('#sID'.concat(id)).text(),
            SubmissionFirstName: $('#sFName'.concat(id)).val(),
            SubmissionLastName: $('#sLName'.concat(id)).val(),
            SubmissionStatus: $('#sStatus'.concat(id)).text(),
            SubmissionTimestamp: $('#sTimestamp'.concat(id)).val(),
            SubmissionConferenceLocation: $('#sConLocation'.concat(id)).val(),
            SubmissionReviewBy: $('#sReviewBy'.concat(id)).val(),
            SubmissionPath: $('#sPath'.concat(id)).val(),
        }, function (data) {
            // bugs where input successfully submitted, button doesnt work
            $('#searchResult').html(data);
        });
    });

    // when 'X' is clicked, show message, and revert back to original state
    $("#cancel-".concat(rawID)).click(function () {
        let id = rawID.replace('edit-', '-');
        userToast([
            'Action Canceled!',
            'Submission with the ID of ' + id.replace('-', '') + ' was <b>not</b> changed.',
            'info'
        ], rawID);

        removeButton("#accept-", rawID, tableID);
        removeButton("#cancel-", rawID, tableID);
    });
}

function disableSubmissionData(rawID) {
    var disableBox = "#box-".concat(rawID);

    $(disableBox).append(
        createButton(['accept', rawID, 'success', 'check'], rawID),
        createButton(['cancel', rawID, 'danger', 'times'], rawID),
    );

    // when '✓' is clicked, update the table, show message, and revert button to original state 
    $("#accept-".concat(rawID)).click(function () {
        let id = rawID.replace('disable-', '-');
        userToast([
            'Action Completed!',
            'Submission with the ID of ' + id.replace('-', '') + ' was successfully disabled.',
            'success'
        ]);

        removeButton("#accept-", rawID);
        removeButton("#cancel-", rawID);

    });

    // when 'X' is clicked, show message, and revert back to original state
    $("#cancel-".concat(rawID)).click(function () {
        let id = rawID.replace('disable-', '-');
        userToast([
            'Action Canceled!',
            'Submission with the ID of ' + id.replace('-', '') + ' was <b>not</b> changed.',
            'info'
        ], rawID);

        removeButton("#accept-", rawID);
        removeButton("#cancel-", rawID);
    });
}

function dynamicSubmissionSearch() {
    $('#searchSubmissionParam').keyup(function () {
        var searchParam = $('#searchSubmissionParam').val();
        var searchOption = $('#searchOption').val();

        $.post('./scripts/handlers/searchHandler.php', { searchBySubmissionParam: searchParam, searchByOption: searchOption }, function (data) {
            $('#searchResult').html(data);

            $("button").click(function (event) {
                var rawID = event.target.id;
                var tableID = "#field-".concat(rawID);

                if (rawID.includes('edit')) {
                    editSubmissionData(rawID, tableID);
                }

                if (rawID.includes('disable')) {
                    disableSubmissionData(rawID);
                }
            });
        });
    });
}