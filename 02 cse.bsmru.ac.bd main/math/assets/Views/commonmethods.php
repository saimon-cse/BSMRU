<?php
    function deptName($dept_full_name){
        echo "
            <div class='container-fluid dept-name box-shadow'>
                <h2>Department of ".$dept_full_name."</h2>
            </div>
        ";
    }
    
    
    function processText($inputString) {
        // Replace opening <p> tags with <br>
        $outputString = str_replace("<p>", '<br>', $inputString);
        // Remove closing </p> tags
        $outputString = str_replace("</p>", "", $outputString);

        // Replace opening <h1> tags with <span style="font-size: 1em;">
        $outputString = preg_replace('/<h2>/', '<br><span style="font-size: 3em;">', $outputString);
        // Replace closing </h1> tags with </span>
        $outputString = preg_replace('/<\/h2>/', '</span>', $outputString);

        // Replace opening <h2> tags with <span style="font-size: 1em;">
        $outputString = preg_replace('/<h3>/', '<br><span style="font-size: 2em;">', $outputString);
        // Replace closing </h2> tags with </span>
        $outputString = preg_replace('/<\/h3>/', '</span>', $outputString);

        // Replace opening <h3> tags with <span style="font-size: 1em;">
        $outputString = preg_replace('/<h4>/', '<br><span style="font-size: 1.5em;">', $outputString);
        // Replace closing </h3> tags with </span>
        $outputString = preg_replace('/<\/h4>/', '</span>', $outputString);


        return strip_tags($outputString, '<b><i><u><strong><br><span><a>');
    }
?>


<?php
//Removes p tag also
    function processText2($inputString) {
        // Replace opening <p> tags with <br>
        $outputString = str_replace("<p>", '', $inputString);
        // Remove closing </p> tags
        $outputString = str_replace("</p>", "", $outputString);

        // Replace opening <h1> tags with <span style="font-size: 1em;">
        $outputString = preg_replace('/<h2>/', '<br><span style="font-size: 3em;">', $outputString);
        // Replace closing </h1> tags with </span>
        $outputString = preg_replace('/<\/h2>/', '</span>', $outputString);

        // Replace opening <h2> tags with <span style="font-size: 1em;">
        $outputString = preg_replace('/<h3>/', '<br><span style="font-size: 2em;">', $outputString);
        // Replace closing </h2> tags with </span>
        $outputString = preg_replace('/<\/h3>/', '</span>', $outputString);

        // Replace opening <h3> tags with <span style="font-size: 1em;">
        $outputString = preg_replace('/<h4>/', '<br><span style="font-size: 1.5em;">', $outputString);
        // Replace closing </h3> tags with </span>
        $outputString = preg_replace('/<\/h4>/', '</span>', $outputString);


        return strip_tags($outputString, '<b><i><u><strong><br><span><a>');
    }



?>