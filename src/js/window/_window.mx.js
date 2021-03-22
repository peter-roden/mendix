/**
 * @param {Object} mx Mendix namespace
 */
if (!window.mx) {
    //window.mx should be set in the header.php, incase any rogue inline
    //scripts try to access it
    window.mx = {};
}