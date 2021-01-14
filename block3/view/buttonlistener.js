$(document).ready(function () {
    //function to locate buttons and swap the values if states change
    //get values from db through ajax call
    $.ajax({
        type: 'POST',
        url: '../controller/ledStates.php',
        success: function (result) {
            //parse the json data
            var jsonResult = JSON.parse(result);
            var pin5State = jsonResult.pin5;
            var pin7State = jsonResult.pin7;

            //rename buttons and change values based on states
            if(pin5State == 1) {
                $('#red_state').attr("value",'1');
                $('#redbtn').val("Red Off");
                $("#redbtn").button("refresh");
                
            }
            else
            {
                $('#red_state').attr("value",'0');
                $('#redbtn').val("Red On");
                $("#redbtn").button("refresh");
            }
            if(pin7State == 1){
                $('#green_state').attr("value",'1');
                $('#greenbtn').val("Green Off");
                $("#greenbtn").button("refresh");
            }
            else
            {
                $('#green_state').attr("value",'0');
                $('#greenbtn').val("Green On");
                $("#greenbtn").button("refresh");
            }
            //var ctx = document.getElementById('tempChart').getContext('2d');
        }
    });

    //base on the state
    $('#camview').on('click', function(){
        window.open('http://193.60.168.222:1114/cgi-bin/snap.html', "Camera_View","height=500,width=500");
    });


    //****Code copied https://stackoverflow.com/questions/43043113/how-to-force-reloading-a-page-when-using-browser-back-button
    // Used in order to refresh page when user navigates back to it */
    window.addEventListener( "pageshow", function ( event ) {
        var historyTraversal = event.persisted || 
                               ( typeof window.performance != "undefined" && 
                                    window.performance.navigation.type === 2 );
        if ( historyTraversal ) {
          // Handle page restore.
          window.location.reload();
        }
      });
   
});