![An illustration showing a section of an animal cell with their subcellular structures](https://i.imgur.com/X18jIYP.png)

# Cells  
> "A WordPress starter theme for building websites like nature creates life."

*Metaphorically speaking! You won’t find anything about CRISPR-Cas9 or synthetic life here* 😅 

## What is Cells?  
Cells is a open-source WordPress starter theme designed for developers who build WordPress sites with intensive use of Gutenberg blocks and ACF fields. It enables the quick reuse and modification of blocks within the same site (*division and differentiation*) and across different sites (*cell transplantation*).  

In this theme, the basic unit is the Gutenberg blocks, the cell. Each block is self-contained in its own folder with everything needed to function:  

**block**/ (*cell membrane*)  
├── **block.json** (*DNA*)  
├── **block.php** (*nucleus*)  
├── **block.scss** (*ribosome*)  
├── **block.js** (*mitochondria*)  
├── **acf.json** (*RNA*)  

From these **cells** (blocks), we can build **tissues** (sections), **organs** (pages), and ultimately the complete **organism** (site).

## Documentation

### Installation

1. Place the theme folder inside wp-content/themes/ of your project.
2. Activate it in the Themes section of the admin (wp-admin/themes.php).

### Development

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

Ready! 🚀

Enjoy building your website as nature does: 🧬+🧬+🧬+🧬+🧬

### Theme Documentation

cells/<br>
├── acf-json/<br>
└── assets/<br>
    └── images/<br>
        └── favicon/<br>
    ├── js/<br>
    └── scss/<br>
        ├── _bootstrap-layout.scss<br>
        ├── _bootstrap-utilities.scss<br>
        ├── _bootstrap-variables-tools.scss<br>
        ├── _buttons.scss<br>
        ├── _elements.scss<br>
        ├── _forms.scss<br>
        ├── _utilities.scss<br>
        ├── _variables.scss<br>
        └── styles.scss<br>
└── blocks/<br>
    └── block-one/<br>
        ├── block-init.js<br>
        ├── block-one.js<br>
        ├── block-one.json<br>
        ├── block-one.php<br>
        ├── block-one.scss<br>
        └── group_672d417c4cdd3.json<br>
    └── etc…<br>