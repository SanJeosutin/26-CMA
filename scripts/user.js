// similar to import function but jQuery style 
$.getScript("./scripts/toast.js");
$.getScript("./scripts/button.js");

function enableUserButtonClicks() {
    $("button").click(function (event) {
        var rawID = event.target.id;
        var tableID = "#field-".concat(rawID);

        if (rawID.includes('edit')) {
            editUserData(rawID, tableID);
        }

        if (rawID.includes('disable')) {
            disableUserData(rawID);
        }
    });
};


function editUserData(rawID, tableID) {
    let editBox = "#box-".concat(rawID);

    // create buttons inside 'editBox' element's id
    $(editBox).append(
        createButton(['accept', rawID, 'success', 'check'], rawID, tableID),
        createButton(['cancel', rawID, 'danger', 'times'], rawID, tableID),
    );
    

    // when '✓' is clicked, update the table, show message, and revert button to original state 
    $("#accept-".concat(rawID)).click(function () {
        let id = rawID.replace('edit-', '-');

        // hand the data to userHandler to process the changes
        $.post('./scripts/handlers/formHandler.php', {
            editByUser: event.target.id,
            UserId: $('#uID'.concat(id)).text().trim(),
            UserFirstName: $('#uFName'.concat(id)).val().trim(),
            UserLastName: $('#uLName'.concat(id)).val().trim(),
            UserDOB: $('#uDOB'.concat(id)).val().trim(),
            UserEmail: $('#uEmail'.concat(id)).val().trim(),
            UserPhoneNo: $('#uPhoneNo'.concat(id)).val().trim(),
            UserRole: $('#uRole'.concat(id)).text().trim(),
            UserActive: $('#uActive'.concat(id)).text().trim(),
        }, function (data) {
            $('#err_user_container').html(data);

            if (!$('#err_user').text()) {      
                var err_contents = $("#err_user_container").children();
                err_contents.remove();       
                
                $('#searchResult').html(data); 
                enableUserButtonClicks();

                userToast([
                    'Action Completed!',
                    'User with the ID of ' + id.replace('-', '') + ' was successfully changed.',
                    'success'
                ]);
            }        
        });
    });

    // when 'X' is clicked, show message, and revert back to original state
    $("#cancel-".concat(rawID)).click(function () {
        let id = rawID.replace('edit-', '-');
        userToast([
            'Action Canceled!',
            'User with the ID of ' + id.replace('-', '') + ' was <b>not</b> changed.',
            'info'
        ], rawID);

        removeButton("#accept-", rawID, tableID);
        removeButton("#cancel-", rawID, tableID);
    });
}

function disableUserData(rawID) {
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
            'User with the ID of ' + id.replace('-', '') + ' was successfully disabled.',
            'success'
        ]);

        removeButton("#accept-", rawID);
        removeButton("#cancel-", rawID);

        // hand the data to userHandler to process the changes
        $.post('./scripts/handlers/formHandler.php', {
            disableByUser: event.target.id,
            UserId: $('#uID'.concat(id)).text().trim(),
            UserFirstName: $('#uFName'.concat(id)).val().trim(),
            UserLastName: $('#uLName'.concat(id)).val().trim(),
            UserDOB: $('#uDOB'.concat(id)).val().trim(),
            UserEmail: $('#uEmail'.concat(id)).val().trim(),
            UserPhoneNo: $('#uPhoneNo'.concat(id)).val().trim(),
            UserRole: $('#uRole'.concat(id)).text().trim(),
            UserActive: $('#uActive'.concat(id)).text().trim(),
        }, function (data) {
            // bugs where input successfully submitted, button doesnt work
            $('#searchResult').html(data);
            enableUserButtonClicks();
        });

    });

    // when 'X' is clicked, show message, and revert back to original state
    $("#cancel-".concat(rawID)).click(function () {
        let id = rawID.replace('disable-', '-');
        userToast([
            'Action Canceled!',
            'User with the ID of ' + id.replace('-', '') + ' was <b>not</b> changed.',
            'info'
        ], rawID);

        removeButton("#accept-", rawID);
        removeButton("#cancel-", rawID);
    });
}

function dynamicUserSearch() {
    $('#searchUserParam').keyup(function () {
        var searchParam = $('#searchUserParam').val();
        var searchOption = $('#searchOption').val();

        $.post('./scripts/handlers/searchHandler.php', { searchByUserParam: searchParam, searchByOption: searchOption }, function (data) {
            $('div #searchResult').html(data);
            enableUserButtonClicks();
        });
    });
}
