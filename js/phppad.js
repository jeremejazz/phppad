
	window.onkeydown = function(e){
  if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
    e.preventDefault();
    //your saving code
    alert('Unfortunately You cannot Save');
  }


}

	var myTextArea = document.getElementById('codearea');
var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
	    lineNumbers: true,
		  matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift",
        theme: "monokai"

});
    $("#cmbtheme").change(function(){
         var theme = $(this).val();
        myCodeMirror.setOption("theme", theme);
        
    });

    $("#padform").submit(function(){

        $("#output").load('pad.php',
                { code: $("#codearea").val() }).hide().fadeIn();

        return false;
    });

    $(".warning").click(function(){
        $(this).slideUp();
    });