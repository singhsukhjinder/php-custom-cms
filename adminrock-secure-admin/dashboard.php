        <?php include 'header.php';?>
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <h1 class="text-center">WELCOME TO STUDYROCKS</h1>
                </div>
                <br>
                <div class="row-fluid text-center">
                    <img src="../images/logo-ad1.png" alt="STUDYROCKS" width="500">
                </div>
                <hr>
            </div>
        </div>
        <!--Footer-part-->
        <div class="row-fluid">
            <div id="footer" class="span12"> 2019 &copy; StudyRock.</div>
        </div>
        <!--end-Footer-part-->
        <script src="js/excanvas.min.js"></script> 
        <script src="js/jquery.min.js"></script> 
        <script src="js/jquery.ui.custom.js"></script> 
        <?php include 'footer.php'; ?>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/jquery.flot.min.js"></script> 
        <script src="js/jquery.flot.resize.min.js"></script> 
        <script src="js/jquery.peity.min.js"></script> 
        <script src="js/matrix.js"></script> 
        <script src="js/fullcalendar.min.js"></script> 
        <script src="js/matrix.calendar.js"></script> 
        <script src="js/matrix.chat.js"></script> 
        <script src="js/jquery.validate.js"></script> 
        <script src="js/matrix.form_validation.js"></script> 
        <script src="js/jquery.wizard.js"></script> 
        <script src="js/jquery.uniform.js"></script> 
        <script src="js/select2.min.js"></script> 
        <script src="js/matrix.popover.js"></script> 
        <script src="js/jquery.dataTables.min.js"></script> 
        <script src="js/matrix.tables.js"></script> 
        <script src="js/matrix.interface.js"></script> 
        <script type="text/javascript">
        // This function is called from the pop-up menus to transfer to
        // a different page. Ignore if the value returned is a null string:
        function goPage (newURL) {
            // if url is empty, skip the menu dividers and reset the menu selection to default
            if (newURL != "") {
            
                // if url is "-", it is this page -- reset the menu:
                if (newURL == "-" ) {
                    resetMenu();            
                } 
                // else, send page to designated URL            
                else {  
                    document.location.href = newURL;
                }
            }
        }
        // resets the menu selection upon entry to this page:
        function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
        }

    </body>
</html>
