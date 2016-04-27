/**
 * Created by Nomad_Mystic on 4/22/2016.
 */
$(function() {

    // DOM Element for error message and success messages
    var loginResultsMessage = $('<h2 class="loginResultsMessage"></h2>');
    var mainSectionCol = $('main > .col-xs-12');

    // modalSignUpButton set up for ajax call to PHP action file
    var modalSignUpButton= $('.modalSignUpButton');
    modalSignUpButton.on('click', function(evnt) {
        var registerForm = $('#registerForm');
        var registerModal = $('#register');

        evnt.preventDefault();
        // modalSignUpButton.attr('onclick','').unbind('click');

        // using PHP to POST user information to the cloudant.com database
        $.post('includes/actions/createUser.php', registerForm.serialize(), function(data) {
            registerModal.modal('hide');

            if (data === 'Please Fill out all input fields') {
                $('.loginResultsMessage').remove();
                loginResultsMessage.append(data);
                loginResultsMessage.addClass('bg-danger');
                mainSectionCol.prepend(loginResultsMessage);
            } else {
                $('.loginResultsMessage').remove();
                loginResultsMessage.append('Thank you for signing up');
                loginResultsMessage.addClass('bg-success');
                mainSectionCol.prepend(loginResultsMessage);
            }
        }); // post
    }); // end modalSignUpButton

    // using GET action to retrieve json_decoded response from cloudant.com sever
    var loginButton = $('.loginButton');
    var storeUserProfile = [];
    // Click event for login in the user
    loginButton.on('click', function() {
        // user input
        var usernameValue = $('#profileUsername').val();

        // for errors
        var loginErrorMessage = 'Please Enter a Username';

        // on login success message
        var successMessage = 'Click Navigation Icon to View Profile';

        // no user found message
        var noUserFound = 'No User Was Found for this Input';

        // Using jQuery to grab user information for profile.php
        $.get('includes/actions/profile.php', function(data) {
            var parsedUsers = $.parseJSON(data);
            var loginModal = $('#login');

            // Looping through the form data to see if user is in system
            for (var i=0; i < parsedUsers.rows.length; i++) {
                if (usernameValue === '') {
                    loginModal.modal('hide');
                    // Gives the user information on login status
                    $('.loginResultsMessage').remove();
                    loginResultsMessage.append(loginErrorMessage);
                    loginResultsMessage.addClass('bg-danger');
                    mainSectionCol.prepend(loginResultsMessage);
                    break;
                }
                if (usernameValue === parsedUsers.rows[i].doc.username) {
                    // storing user data in array for later click event
                    var user = parsedUsers.rows[i].doc;
                    storeUserProfile.push(user);
                    loginModal.modal('hide');

                    // Gives the user information on login status
                    $('.loginResultsMessage').remove();
                    loginResultsMessage.append(successMessage);
                    loginResultsMessage.addClass('bg-success');
                    mainSectionCol.prepend(loginResultsMessage);
                    break;
                }
            } // end for
            if (storeUserProfile.length <= 0) {
                loginModal.modal('hide');
                // Gives the user information on login status
                $('.loginResultsMessage').remove();
                loginResultsMessage.append(noUserFound);
                loginResultsMessage.addClass('bg-success');
                mainSectionCol.prepend(loginResultsMessage);
            }
        }); // end loginButton get
    }); // end loginButton

    // creates and adds form for logged in user profile
    var userButton = $('.glyphicon-user');
    userButton.on('click', createDOMProfile);

    // Creates the user profile DOM elements
    function createDOMProfile() {
        if (storeUserProfile.length > 0) {
            var profileDOMSection = $('main');
            var profileOutput = '';

            profileOutput += '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
            profileOutput += '<h2>Your Profile</h2>';
            profileOutput += '<form method="post" id="registerForm">';
            profileOutput += '  <div class="form-group">';
            profileOutput += '      <label for="username" class="label">Username:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].username + '" type="text" id="username" name="username" class="form-control">';

            profileOutput += '      <label for="firstName" class="label">First Name:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].firstName + '" type="text" id="firstName" name="firstName" class="form-control">';

            profileOutput += '      <label for="lastName" class="label">Last Name:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].lastName + '" type="text" id="lastName" name="lastName" class="form-control">';

            profileOutput += '      <label for="company" class="label">Company:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].company + '" type="text" id="company" name="company" class="form-control">';

            profileOutput += '      <label for="age" class="label">Age:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].age + '" type="number" id="age" name="age" class="form-control" min="0" max="120">';

            profileOutput += '      <label for="email" class="label">Email:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].email + '" type="email" id="email" name="email" class="form-control">';

            profileOutput += '      <label for="phone" class="label">Phone:</label>';
            profileOutput += '      <input value="' + storeUserProfile[0].phone + '" type="tel" id="phone" name="phone" class="form-control">';
            profileOutput += '  </div>';
            profileOutput += '</form>';
            profileOutput += '</div><!--end col-->';
            profileDOMSection.html(profileOutput);

        } else {
            var noUserFound = 'Please Reenter a Active Username';
            $('.loginResultsMessage').remove();
            loginResultsMessage.append(noUserFound);
            loginResultsMessage.addClass('bg-danger');
            mainSectionCol.prepend(loginResultsMessage);
        }
    }
}); // end jQuery