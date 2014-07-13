@extends('_master')

@section('title')
Lorem Ipsum Generator
@stop

@section('head')
    {{ HTML::style('css/style.css') }}

    <script type="text/javascript">
        $(document).ready(function() {
            $("#submit_btn").click(function() {
                //Set form variables to be sent via JSON
                var numParagraphs      = $('input[name=numParagraphs]').val();

                var proceed = true;

                // Quick client-side verification to make sure only number was entered in number box
                if ((numParagraphs > 0) && (numParagraphs < 100) && (numParagraphs != '')) {} else {
                    $('input[name=numParagraphs]').css('border-color','red');
                    proceed = false;
                }

                if(proceed)
                {
                    // JSON data sent to PHP form for processing
                    post_data = {'numParagraphs':numParagraphs};

                    //Ajax response
                    $.post('/generateLI', post_data, function(response){


                    // Load JSON data and display
                    if(response.type == 'error')
                    {
                        output = '<div class="error">'+response.text+'</div>';
                    } else {
                        output = '<div class="success">'+response.text+'</div>';
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
            <legend>Lorem Ipsum Generator</legend>

            <label for="numParagraphs"><span>Number of Paragraphs (Max: 99)</span>
                <input name="numParagraphs" id="numParagraphs" type="number" min="0" max="99" value="5">
            </label>

            <label><span>&nbsp;</span>
                <button class="submit_btn" id="submit_btn">Submit</button>
            </label>
            <br/>
            <div id="result"></div>
        </fieldset>

    </div>

@stop