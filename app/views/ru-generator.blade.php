@extends('_master')

@section('title')
Random User Generator
@stop

@section('head')
{{ HTML::style('css/style.css') }}

<script type="text/javascript">
    $(document).ready(function() {
        $("#submit_btn").click(function() {
            //Set form variables to be sent via JSON
            var numUsers        = $('input[name=numUsers]').val();
            var Address         = document.getElementById("Address").checked ? 1 : 0;
            var Birthdate       = document.getElementById("Birthdate").checked ? 1 : 0;
            var Profile         = document.getElementById("Profile").checked ? 1 : 0;



            var proceed = true;

            // Quick client-side verification to make sure only number was entered in number box
            if ((numUsers > 0) && (numUsers < 100) && (numUsers != '')) {} else {
                $('input[name=numUsers]').css('border-color','red');
                proceed = false;
            }

            if(proceed)
            {
                // JSON data sent to PHP form for processing
                post_data = {'numUsers':numUsers};

                //Ajax response
                $.post('/generateRU', post_data, function(response){


                    // Load JSON data and display
                    if(response.type == 'error')
                    {
                        output = '<div class="error">'+response.text+'</div>';
                    } else {
                        output = '<div class="success">'
                        for (i = 0; i < response.text.length; i++) {
                            output += "Name: " + response.text[i].name + "<br/>";
                            if (Address == 1)
                                output += "Address: " + response.text[i].address + "<br/>";
                            if (Birthdate == 1)
                                output += "Birthdate: " + response.text[i].birthdate + "<br/>";
                            if (Profile == 1)
                                output += "Profile: " + response.text[i].profile + "<br/>";
                            output += "<br/>";
                        }
                        output += '</div>';
                    }

                    $("#result").hide().html(output).slideDown();
                }, 'json');

            }
        });

        //reset form when new options selected
        $("#passwd_form input, #passwd_form textarea").keyup(function() {
            $("#passwd_form input, #passwd_form textarea").css('border-color','');
            $("#result").slideUp();
        });

    });
</script>
@stop

@section('content')

<div class="container">

    <fieldset id="passwd_form">
        <legend>Random User Generator</legend>

        <label for="numUsers"><span>Number of Users (Max: 99)</span>
            <input name="numUsers" id="numUsers" type="number" min="0" max="99" value="3">
        </label>

        <label for="Address"><span>Address</span>
            <input name="Address" id="Address" type="checkbox"/>
        </label>

        <label for="Birthdate"><span>Birthdate</span>
            <input name="Birthdate" id="Birthdate" type="checkbox"/>
        </label>

        <label for="Profile"><span>Profile</span>
            <input name="Profile" id="Profile" type="checkbox"/>
        </label>

        <label><span>&nbsp;</span>
            <button class="submit_btn" id="submit_btn">Submit</button>
        </label>
    </fieldset>

    <fieldset id="info">
        <legend><h2>Result</h2></legend>
        <div id="result"></div>
    </fieldset>

</div>

@stop