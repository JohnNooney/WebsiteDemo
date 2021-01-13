$(document).ready(function () {
    //for when the user clicks the login button
    $('#btnLogin').on('click', function(){
          $('#loginModal').modal('show');
    });
    //for when the user clicks on signup button
    $('#btnSignUp').on('click', function(){
          $('#loginModal').modal('hide');
          $('#signUpModal').modal('show');
    });

    //display any login messages
    if ($("#loginMessage").val()) {
        var message = $("#loginMessage").val();
        alert(message);

    }

    //display the answer modal
    $('.btnAnswer').click(function() {
        //get the question number to load into the answer modal
        //along with the datetime
        var qno = $(this).val();
        var date = new Date();
        var d = date.toISOString().slice(0, 19).replace('T', ' '); //get the current time in sql format

         $('#answerModal').modal('show');
         $('#qno').attr("value", qno);
         $('#dttmAnswer').attr("value", d)
        });

    //display the edit answer modals
    $('.btnEditAnswer').click(function() {
        //get the answer number to load associating answer field into modal
         var answerValNum = $(this).val();

        //compare the answer ano amongst the hidden input values to determin which one to fill into
        //the edit answer
        var answerVal;
        $( ".answerEdit" ).each(function( index ) {
           if(answerValNum == $(this).attr("id")) //the ano of the answer input is store in id
           {
              return answerVal = $(this).val();
           }
        });

          $('#editAnswerModal').modal('show');
          $('#anoEdit').attr("value", answerValNum);
          $('#newAnswerTxt').val(answerVal);
    });

    //display the edit question modals
    $('.btnEditQuestion').click(function() {
        //get the answer number to load associating answer field into modal
         var questionValNum = $(this).val();

        //compare the question qno amongst the hidden input values to determin which one to fill into
        //the edit question modal
        var questionVal;
        $( ".questionEdit" ).each(function( index ) {
           if(questionValNum == $(this).attr("id")) //the qno of the question input is store in id
           {
              return questionVal = $(this).val();
           }
        });

          $('#editQuestionModal').modal('show');
          $('#qnoEdit').attr("value", questionValNum);
          $('#newQuestionTxt').val(questionVal);
    });

    //used for validating the user inputs when creating an account
    // $("#signUpForm").validate({
    //     rules:{
    //         firstname: {required: true},
    //         surname: {required: true},
    //         nicname: {required: true},
    //         // at least one number, one lowercase and one uppercase letter
    //         // at least six characters that are letters, numbers or the underscore
    //         password:{
    //             required:true,
    //             minlength: 8,
    //             maxlength: 15
    //         }
    //     },
    //     error: function(label) {
    //      $(this).addClass("errorClass");
    //      $(".errorClass").css("color", "red");
    //    },
    //     messages:{
    //         firstname: {required: "Please enter your first name"},
    //         surname: {required: "Please enter your surname"},
    //         nicname: {required: "Please enter your nickname"},
    //         password:{
    //             required:"Please enter a password",
    //             minlength: "Password must have minimum of 8 characters",
    //             maxlength: "Password must have maximum of 15 characters"
    //         }
    //     },
    //     submitHandler: function(form) {
    //         form.submit();
    //       }
    // });

    //***not necessarily a login related item but
    //gets the current date and time for posting a question or answer
    function appendDttm() {
        var date = new Date();
        var d = date.toISOString().slice(0, 19).replace('T', ' '); //get the current time in sql format

        var inputQ = document.getElementById('dttmQuestion')  // Create with DOM
        inputQ.setAttribute("value", d);
    }


    //used to check if user is logged in or not, if not then prompt to sign up before
    //posting a comment
    $('#questionForm, #answerForm').submit(function(e){
        //append dttm
        appendDttm();

        //get the value of the user
        // var sessId = $('input:hidden[name=userIdtest]').val();
        // if (sessId == "null") {
        //     alert("Please Login before Posting");
        //     e.preventDefault();
        //     $('#loginModal').modal('show');
        // }
    });

    //used for deleting a question. Verifys with user that they want to delete
    $('#deleteQuestionFrom, #deleteAnswerFrom').submit(function(e){
        if (confirm('Are you sure you want to delete your post?')) {
          // confirm and do nothing
        } else {
            e.preventDefault();
          // stop delete
        }
    });

});
