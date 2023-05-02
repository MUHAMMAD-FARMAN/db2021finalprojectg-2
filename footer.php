<footer class="site-footer">
            2020 &copy; PICK
        </footer>
        <!-- END: Footer-->


        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center"> 
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->


        <!-- START: Template JS-->
        <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="dist/vendors/moment/moment.js"></script>
        <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="dist/js/app.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="dist/vendors/raphael/raphael.min.js"></script>
        <script src="dist/vendors/morris/morris.min.js"></script>
        <script src="dist/vendors/chartjs/Chart.min.js"></script>
        <script src="dist/vendors/starrr/starrr.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
        <script src="dist/vendors/jquery-flot/jquery.flot.pie.js"></script>        
        <script src="dist/vendors/chartjs/Chart.min.js"></script>  
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
        <script src="dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>
        <script src="dist/vendors/apexcharts/apexcharts.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="dist/js/home.script.js"></script>
        <script>function updateLabel(input) {
            var label = input.nextElementSibling;
            var labelText = label.innerHTML;
            var fileName = input.files[0].name;
            if (fileName) {
                label.innerHTML = fileName;
            } else {
                label.innerHTML = labelText;
            }
        }
        </script>
        <script>
            // searchDocumentInTable function
            function searchDocumentInTable() 
            {
                // Declare variables
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchDocument");
                filter = input.value.toUpperCase();
                table = document.getElementById("documentTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 1; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                    }       
                }
            }
        </script>
        <!-- END: Page JS-->
    </body>
    <!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Apr 2023 06:05:10 GMT -->
</html>
