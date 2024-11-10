const path = require('path');
const glob = require('glob');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

// Ruta de todos los archivos SCSS en las subcarpetas de "blocks"
const blockScssFiles = glob.sync('./blocks/**/*.scss');

// Crear entradas para cada archivo .scss de los bloques y el archivo global
const entries = blockScssFiles.reduce((acc, file) => {
  const relativePath = './' + path.relative(__dirname, file); // Asegura rutas relativas
  acc[relativePath.replace(/\.scss$/, '')] = file; // Elimina la extensión .scss de la entrada
  return acc;
}, {
  'dist/css/style': './assets/scss/style.scss' // Agregar entrada para el archivo principal en la carpeta dist/css
});

module.exports = {
  entry: entries,
  output: {
    path: path.resolve(__dirname), // Usa el directorio raíz del theme
    filename: '[name].dummy.js', // Genera archivos JS ficticios en la ubicación especificada en entries
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader, // Extrae el CSS a archivos separados
          'css-loader', // Transforma el CSS a módulos de JS
          {
            loader: 'postcss-loader', // Añade autoprefijos
            options: {
              postcssOptions: {
                plugins: [autoprefixer()],
              },
            },
          },
          'sass-loader' // Compila SCSS a CSS
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: (pathData) => {
        if (pathData.chunk.name === 'dist/css/style') {
          // Guardar style.scss como dist/css/style.css
          return 'dist/css/style.css';
        }
        // Guardar CSS de bloques en sus carpetas respectivas
        const relativePath = path.relative(path.resolve(__dirname, 'blocks'), pathData.chunk.name);
        return `blocks/${relativePath}.css`;
      },
    }),
  ],
  resolve: {
    extensions: ['.js', '.scss'],
    preferRelative: true,
  },
  ignoreWarnings: [
    {
      message: /Conflicting order between:/, // Ignorar advertencias sobre el orden de CSS
    },
  ],
  optimization: {
    minimize: true,
    minimizer: [
      // Otros minimizadores como TerserPlugin para JavaScript
      new CssMinimizerPlugin(),
    ],
  },
  mode: 'development', // Cambia a 'production' en producción
  watch: true, // Compila automáticamente al hacer cambios
};