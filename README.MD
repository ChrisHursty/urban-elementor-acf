# Urban Elementor ACF Theme

Urban Elementor ACF is a custom WordPress theme designed to work perfectly with the free version of Elementor and ACF Pro

## Prerequisites

- WordPress environment (Local by Flywheel, XAMPP, MAMP, etc.)
- Node.js and npm

## Installation

1. **Clone the Repository**:  
    Clone this repository into your WordPress themes directory.
    ```bash
    git clone https://github.com/ChrisHursty/urban-elementor-acf
    ```

2. **Navigate to the Theme Directory**:  
    Change to the theme directory.

3. **Install Node Modules**:  
    Install the required Node modules.
    ```bash
    npm install
    ```
4. **Setting Local for Live Reload**
    Open the `gulpfile.mjs` and update the `proxy`:
    ```bash
    browserSyncInstance.init({
        proxy: "change_to_your_local_install.local/"
    });
    ```

5. **Running the Development Environment (`gulp serve`)**:  
    Start the development environment with live reloading.
    ```bash
    gulp
    ```
    This command starts a local development server with BrowserSync and watches your SASS, JS, and PHP files for changes, automatically reloading the browser.

6. **Building for Production (`gulp build`)**:  
    To prepare your theme for a production environment, use:
    ```bash
    gulp build
    ```
    This command runs tasks for compiling SASS, minifying CSS and JS files, optimizing images, and packaging your theme into a zip file. Ensure to run this command before deploying your theme.

## Structure

- `/scss`: SCSS files for styling.
- `/css`: Compiled CSS files.
- `/js`: JavaScript files.
- `functions.php`: WordPress theme functions.
- `index.php`: Main template file.

## Contributing

Contributions to the Urban Elementor ACF theme are welcome. Please ensure you follow the existing code structure and style.

1. Fork the repository.
2. Create a new branch for your feature (`git checkout -b feature/AmazingFeature`).
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Dependencies

- <a href="https://ninjaforms.com/" target="_blank" rel="nofollow">Ninja Forms</a>
- <a href="https://elementor.com/" target="_blank" rel="nofollow">Elementor FREE</a>
- <a href="https://www.advancedcustomfields.com/pro/" target="_blank" rel="nofollow">Advanced Custom Fields PRO</a>

## Credits

- <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank" rel="nofollow">Font Awesome</a> integration (v5.15.4)
- <a href="https://owlcarousel2.github.io/OwlCarousel2/" target="_blank" rel="nofollow">Owl Carousel 2</a>
- <a href="https://dimsemenov.com/plugins/magnific-popup/" target="_blank" rel="nofollow">Magnific Popup</a>
