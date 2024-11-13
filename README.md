# Cells

Theme for building sites organically.

## Installation

1. Place the theme folder inside wp-content/themes/ of your project.
2. Activate it in the Themes section of the admin (wp-admin/themes.php).

## Development

Cells uses Webpack for generating static files, so you first need to initialize a new project and create a package.json file by running the following command in the theme's root folder:

```
npm init
```

Now it's time to install Webpack and the rest of the dependencies:

```
npm install autoprefixer bootstrap css-loader css-minimizer-webpack-plugin glob normalize.css mini-css-extract-plugin postcss-loader sass sass-loader webpack webpack-cli --save-dev
```

The above command installs the following modules:

1. `autoprefixer`: A tool that automatically adds vendor-specific prefixes to CSS properties, ensuring compatibility with different browsers.
2. `bootstrap`:
3. `css-loader`: Allows Webpack to process CSS files. It converts CSS files into JavaScript modules so they can be imported and used in your application.
4. `css-minimizer-webpack-plugin`: A plugin for Webpack that minimizes CSS files, reducing their size and improving page load performance.
5. `glob`: A library that allows you to search for files and directories matching a specific pattern. It's useful for tasks like finding all files with a particular extension in a directory.
6. `mini-css-extract-plugin`: This Webpack plugin extracts CSS into separate files instead of including it in JavaScript files. This helps improve page load performance.
7. `postcss-loader`: A loader for Webpack that allows processing CSS with PostCSS, a tool for transforming styles with JavaScript plugins.
8. `sass`: A CSS preprocessor that allows writing CSS with more advanced syntax and then compiles it to standard CSS. Sass makes writing more maintainable and modular CSS easier.
9. `sass-loader`: Allows Webpack to process Sass/SCSS files and convert them into CSS. It works together with sass to compile Sass files.
10. `webpack`: A module bundler for JavaScript. It takes modules with dependencies and generates static files representing those modules.
11. `webpack-cli`: Provides a command-line interface for Webpack, allowing you to run and configure Webpack from the terminal.

Now you just need to start the watch so that Webpack detects any changes in SCSS and JS and automatically regenerates the theme's assets. To do this, run:

```
npx webpack --watch
```

Ready 🚀

Enjoy building your website!

🧬+🧬+🧬+🧬+🧬

## Theme Documentation

theme
– acf-jsons
– assets
– – images
– – js
– – – forms.js
– – – helpers.js
– – scss
– – – elements.scss
– – – uikit.scss
– – – utilities.scss
– blocks
– – block-video
– – – block-video.php
– – – block-video.scss
– – – block-video.css
– – block-otro-block
– – – block-otro-block.php
– – – block-otro-block.scss
– – – block-otro-block.css