module.exports = {
    pages: {
      'index': {
        entry: './src/pages/Display/main.js',
        template: 'public/index.html',
        title: 'Product List',
        chunks: [ 'chunk-vendors', 'chunk-common', 'index' ]
      },
      'add': {
        entry: './src/pages/Add/main.js',
        template: 'public/index.html',
        title: 'Add Product',
        chunks: [ 'chunk-vendors', 'chunk-common', 'add' ]
      }
    },
    // publicPath: process.env.NODE_ENV === 'production'
    // ? '/pages/'
    // : '/'
}

    