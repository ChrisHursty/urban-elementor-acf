jQuery(document).ready(function($) {
    var colors = ElementorGlobalSettings.global_colors;
    var fonts = ElementorGlobalSettings.global_fonts;
    
    var scssContent = '';

    if (colors) {
        $.each(colors, function(key, value) {
            scssContent += '$' + key + ': ' + value + ';\n';
        });
    }

    if (fonts) {
        $.each(fonts, function(key, value) {
            scssContent += '$' + key + ': ' + value + ';\n';
        });
    }

    // Append the generated SCSS content to a style element
    var styleElement = document.createElement('style');
    styleElement.type = 'text/scss';
    styleElement.innerHTML = scssContent;
    document.head.appendChild(styleElement);
});
