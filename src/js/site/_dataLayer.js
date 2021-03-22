/**
 * Track various clicks in Google Analytics
 */
$(document).ready(function() {
    //ensure all PDFs aren't being crawled by search engines
    var pdfLinks = $('a[href*="pdf"]');
    pdfLinks.attr('rel', 'nofollow');
    pdfLinks.bind("click", function() {
        dataLayer.push({
            'event': 'PDFClick',
            'clickedHREF': $(this).attr('href')
        });
    });

    $("a[href*='home.mendix.com']").bind("click", function() {
        dataLayer.push({
            'event': 'SigninClick'
        });
    });
});