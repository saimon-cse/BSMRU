<?php
    $linkprefix = "";
    if($navdesign!=0){
        $linkprefix = "index";
    }
    $menu = array("Home", "About", "Academics", "People", "Notices", "News and Events", "Contact");
    $menulinks = array($linkprefix."#home", $linkprefix."#about", "index", "#home", "allnotices", $linkprefix."#news-events", "#contact");
    
    //Whether the i-th item has any dropdown or not.
    ///This array must be changed when the sequence of menu is changed
    $dropdownindex = array(0, 0, 1, 1, 0, 0, 0); 
    
    /*This portion to be changed if a new drop down is added*/
    ///i-th array is the elements of i-th dropdown
    $deepdropdowns = array(
        array("Courses", "Syllabus"), //List of Academics
        array("Faculty Members", "Officers and Staff") //List of People
    );


    $deepdropdownlinks = array(
        array("courses", "assets/Files/s1.docx"), //List of Academics
        array("people", "staff") //List of People
    );

    //i-th element is the size of i-th dropdown
    $deepdropdownsize = array(2, 2);
?>