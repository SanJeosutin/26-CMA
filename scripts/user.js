// similar to import function but jQuery style 
$.getScript("./scripts/toast.js");
$.getScript("./scripts/button.js");


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
        userToast([
            'Action Completed!',
            'User with the ID of ' + id.replace('-', '') + ' was successfully changed.',
            'success'
        ]);

        removeButton("#accept-", rawID, tableID);
        removeButton("#cancel-", rawID, tableID);

        // hand the data to userHandler to process the changes
        $.post('./scripts/handlers/userHandler.php', {
            editByUser: event.target.id,
            UserId: $('#uID'.concat(id)).text(),
            UserFirstName: $('#uFName'.concat(id)).val(),
            UserLastName: $('#uLName'.concat(id)).val(),
            UserDOB: $('#uDOB'.concat(id)).val(),
            UserEmail: $('#uEmail'.concat(id)).val(),
            UserPhoneNo: $('#uPhoneNo'.concat(id)).val(),
            UserRole: $('#uRole'.concat(id)).text(),
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
    $('#searchParam').keyup(function () {
        var searchParam = $('#searchParam').val();
        var searchOption = $('#searchOption').val();

        $.post('./scripts/handlers/searchHandler.php', { searchByParam: searchParam, searchByOption: searchOption }, function (data) {
            $('#searchResult').html(data);
        });
    });
}