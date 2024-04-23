<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dependent select box</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Dynamic Dependent Select Box in <br/> PHP & jQuery ajax</h1>
        </div>
        <div id="content">
            <form action="" method="">
                <label for="country">Country: </label>
                <select id="country">
                    <option value="">Select Country</option>
                </select>
                <br/><br/>
                <label for="state">State: </label>
                <select id="state">
                    <option value=""></option>
                </select>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            function loadData(type, category_id) {
                $.ajax({
                    url: "load-cs.php",
                    type: "POST",
                    data: {type: type, id: category_id},
                    success: function(data) {
                        if(type == "stateData") {
                            $("#state").html(data);
                        }else{
                            $("#country").append(data);
                        }
                    }
                });
            }

            loadData();

            $("#country").on("change", function() {
                var country = $("#country").val();
                if(country != "") {
                    loadData("stateData", country);
                }else {
                    $("#state").html("");
                }
            });
        });
    </script>
</body>
</html>