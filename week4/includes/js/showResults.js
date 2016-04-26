/**
 * Created by Nomad_Mystic on 4/22/2016.
 */



$(function() {

    // modalSignUpButton set up for ajax call to PHP action file
    var modalSignUpButton= $('.modalSignUpButton');
    modalSignUpButton.on('click', function(evnt) {
        evnt.preventDefault();
        var registerForm = $('#registerForm');
        registerForm.submit();
        modalSignUpButton.attr('onclick','').unbind('click');

        $.get('includes/actions/createUser.php', function(data) {
            console.log(data);
        });
    });

    // using GET action to retrieve json_decoded response from cloudant sever
    var modalSignInButton = $('.modalSignInButton');
    modalSignInButton.on('click', function() {
        $.get('includes/actions/profile.php', function(data) {

            var parsedUsers = JSON.parse(data);

            var numberOfUsers = parsedUsers.total_rows;
            console.log(parsedUsers);
            console.log(numberOfUsers);
        });
    });

    ///user_profile/_all_docs?include_docs=true
}); // end jQuery