function ApproveApplication(docId) {
    // Your JavaScript code here
    console.log("Approving document with ID: " + docId);


    // You can also make an AJAX request to a PHP script passing the docId parameter
    // as a data parameter in the request, like this:
    /*
    $.ajax({
      url: "approve.php",
      type: "POST",
      data: { docId: docId },
      success: function(response) {
        console.log("Document approved successfully");
      },
      error: function() {
        console.error("Error approving document");
      }
    });
    */
}