<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<!DOCTYPE html>
<head>

<style>
    .dropdown {
        width: 237px;
        display: block;
        height: 45px;
    }

    .dropdown .box {
        position: relative;
        display: inline-block;
        text-align: centre;
        border: 2px solid #C4C4C4;
        border-radius: 7px;
        height: 36px;
        width: 100%;
    }

    .dropdown .box:hover {
        border: 2px solid #717070;
    }

    .dropdown .box .text {
        color: #4F4F4F;
        position: absolute;
        width: calc(100% - 40px);
        top: 30%;
        bottom: 25%;
        left: 15px;
        margin: 0px;
        vertical-align: middle;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 12pt;
        line-height: 12px;
        pointer-events: none;
    }

    .dropdown .box .dropdown-btn {
        position: absolute;
        top: 4px;
        width: 40px;
        height: calc(100% - 8px);
        right: 0;
        border-left: solid 2px #717070;
        border-radius: 0px;
    }

    .dropdown .box .dropdown-btn .symbol {
        position: relative;
        pointer-events: none;
        top: 4px;
        left: 5px;
        height: 20px;
        width: 24px;
    }

    .dropdown .expand {
        position: relative;
        background-color: white;
        z-index: 2;
        bottom: 5px;
        visibility:hidden;
        width: calc(100% + 2px);
        height: 200px;
        border: 1px solid #C4C4C4;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .dropdown .expand .option {
        position: relative;
        width: 100%;
        height: 30px;
        margin: 0px;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 12pt;
        font-style-color: #A3A3A3;
        line-height: 12px;
        
    }

    .dropdown .expand .option p {
        position: relative;
        margin: 0px;
        top: 6px;
        left: 6px;
    }

    .dropdown .expand .option:hover { 
        background-color: #A8E7CC;
    }
</style>
 
</head>

<body>

<?php

function createDropdown($name){
    echo "
    <div class = 'dropdown' id = '$name'>
        <div class = 'box'>
            <p class = 'text'></p>
            <div class = 'dropdown-btn'>
                <img class = 'symbol' src = 'Images/Arrow.png'>
            </div>
        </div>
        <div class = 'expand'>
        </div>
    </div>
    <script>
    document.getElementById('$name').addEventListener('click', function(){
    expand('$name');
    });
    </script>
";}
    
?>

<script>
    function populate(id, options) {
    	var dropdown = document.getElementById(id);
    	var expand = dropdown.querySelector(".expand");
    	options.forEach((option) => {
    		var expand = dropdown.querySelector(".expand");
    		var HTML = "<div class = 'option' onClick = \"select('" + id + "', '" + option + "')\"> <p> " + option + " </p> </div>";
    		expand.innerHTML += HTML;
    	});	
    }
    
    function expand(dropdown) {
        var dropdown = document.getElementById(dropdown);
        var box = dropdown.querySelector(".box");
        var expand = dropdown.querySelector(".expand");
        expand.style.visibility = "visible";
        box.style.borderRadius = "7px 7px 0px 0px";
    }
    
    function select(id, option) {
        var dropdown = document.getElementById(id);
        var box = dropdown.querySelector(".box");
        var expand = dropdown.querySelector(".expand");
        var text = box.querySelector(".text");
        text.innerHTML = option;
        expand.style.visibility = "hidden";
        box.style.borderRadius = "7px";
    }
    
    window.addEventListener("click", function(event) {
        if (!event.target.matches(".dropdown div")) {
            var dropdowns = document.querySelectorAll(".dropdown");
            dropdowns.forEach((dropdown) => {
                var box = dropdown.querySelector(".box");
                var expand = dropdown.querySelector(".expand");
                box.style.borderRadius = "7px";
                expand.style.visibility = "hidden";
            });
        }
    });
</script>
</body>
